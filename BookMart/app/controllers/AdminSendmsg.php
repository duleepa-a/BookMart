<?php

class AdminSendmsg extends Controller
{
    public function index() {
        // If recipient_email is passed as GET parameter, pass it to the view
        $data = [];
        if(isset($_GET['email'])) {
            $data['email'] = $_GET['email'];
        }
        
        $this->view('adminSendmsg', $data);
    }

    public function send() {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'] ?? '';
                $subject = $_POST['subject'] ?? '';
                $message = $_POST['message'] ?? '';
                $attachmentPath = null;
    
                // Validate inputs
                if(empty($email) || empty($subject) || empty($message)) {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'Please fill all required fields'];
                    redirect('adminSendmsg');
                    return;
                }
    
                // Handle file attachment
                if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] === UPLOAD_ERR_OK) {
                    $fileTmpPath = $_FILES['attachment']['tmp_name'];
                    $fileName = basename($_FILES['attachment']['name']);
                    $uploadDir = "uploads/";
                    
                    // Create directory if it doesn't exist
                    if (!file_exists($uploadDir)) {
                        if(!mkdir($uploadDir, 0777, true)) {
                            $_SESSION['message'] = ['type' => 'error', 'text' => 'Failed to create upload directory'];
                            redirect('adminSendmsg');
                            return;
                        }
                    }
                    
                    $targetFilePath = $uploadDir . time() . "_" . $fileName;
    
                    if (!move_uploaded_file($fileTmpPath, $targetFilePath)) {
                        $_SESSION['message'] = ['type' => 'error', 'text' => 'Failed to upload attachment'];
                        redirect('adminSendmsg');
                        return;
                    }
                    
                    $attachmentPath = $targetFilePath;
                }
    
                // Verify session
                if(!isset($_SESSION['user']) || !isset($_SESSION['user']->id)) {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'You must be logged in to send messages'];
                    redirect('login');
                    return;
                }
                
                $senderId = $_SESSION['user']->id;
                
                // Look up receiver by email
                $user = new User();
                $receivers = $user->where(['email' => $email]);
                
                if(!$receivers || count($receivers) == 0) {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'User with this email not found'];
                    redirect('adminSendmsg');
                    return;
                }
                
                $receiverId = $receivers[0]->id;
    
                // Create message content
                $fullMessage = $subject . "\n\n" . $message;
                if ($attachmentPath) {
                    $fullMessage .= "\n\nAttachment: " . $attachmentPath;
                }
                
                // Save message to database
                $chat = new ChatModel();
                $result = $chat->sendMessage($senderId, $receiverId, $fullMessage);
                
                if($result) {
                    $_SESSION['message'] = ['type' => 'success', 'text' => 'Message sent successfully!'];
                    
                    // Get user type to determine redirect
                    $userType = $receivers[0]->user_type ?? '';
                    
                    switch($userType) {
                        case 'buyer':
                            redirect('AdminViewbuyer/index/' . $receiverId);
                            break;
                        case 'seller':
                            redirect('AdminViewseller/index/' . $receiverId);
                            break;
                        case 'courier':
                            redirect('AdminViewcourier/index/' . $receiverId);
                            break;
                        default:
                            redirect('AdminDashboard');
                    }
                } else {
                    $_SESSION['message'] = ['type' => 'error', 'text' => 'Failed to send message. Please try again.'];
                    redirect('adminSendmsg');
                }
            } else {
                redirect('adminSendmsg');
            }
        } catch (Exception $e) {
            // Log the error
            error_log('Message send error: ' . $e->getMessage());
            $_SESSION['message'] = ['type' => 'error', 'text' => 'An error occurred: ' . $e->getMessage()];
            redirect('adminSendmsg');
        }
    }
}