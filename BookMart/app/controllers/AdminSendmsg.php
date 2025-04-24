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
                $mail->Username = 'duleepa24@gmail.com';
                $mail->Password = 'dnbzkaydjffxlrkx';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
    
                $mail->setFrom('duleepa24@gmail.com', 'BookMart');
                $mail->addAddress($email);
                $mail->Subject = $subject;
                $mail->Body = $message;
    
                $mail->send();
                $_SESSION['message'] = 'Email sent successfully!';
            } catch (\PHPMailer\PHPMailer\Exception $e) {
                $_SESSION['message'] = 'Mailer Error: ' . $mail->ErrorInfo;
            }
    
            redirect('adminSendmsg');
        } else {
            redirect('adminSendmsg');
        }
    }
    
    
    
}