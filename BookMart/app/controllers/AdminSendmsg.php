<?php

 
class AdminSendmsg extends Controller
{
    public function index() {
        $data = [];
        if(isset($_GET['email'])) {
            $data['email'] = $_GET['email'];
        }
        
        $this->view('adminSendmsg', $data);
    }

    public function send() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $subject = $_POST['subject'] ?? '';
            $message = $_POST['message'] ?? '';
    
            $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'bookmart.info.lk@gmail.com';
                $mail->Password = 'ljykrgedgggmhgzf';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
    
                $mail->setFrom('bookmart.info.lk@gmail.com', 'BookMart');
                $mail->addAddress($email);
                $mail->Subject = $subject;
                $mail->Body = $message;
    
                $mail->send();
                $_SESSION['success'] = 'Email sent successfully!';
            } catch (\PHPMailer\PHPMailer\Exception $e) {
                $_SESSION['error'] = 'Mailer Error: ' . $mail->ErrorInfo;
            }  
    
            redirect('adminSendmsg?email='.$email);
        } else {
            redirect('adminSendmsg');
        }
    }
    
    
    
}