<?php

class ContactUs extends Controller{

    public function index(){
        $this->view('contactUs');
    }

    public function create() {
        $contactform = new Contactform;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $arr = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'message' => $_POST['message'],
                'status' => $_POST['status'],
            ];
        }
        $res = $contactform->insert($arr);

        if($res){
            $_SESSION['flash_message'] = 'Form Successfully Submitted';
        } else{
            $_SESSION['flash_message'] = 'Failed to submit! Please try again';
        }
        redirect('ContactUs');
        // $this ->view('contactUs');
    }
}