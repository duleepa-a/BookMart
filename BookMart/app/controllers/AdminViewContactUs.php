<?php

class adminViewContactUs extends Controller{

    public function index(){

        $contactform = new Contactform;
        // $contactform = $contactform->findAll();
        $contactform = $contactform->where(['status' => 0]);


        $markedcontact = new Contactform;
        $markedcontact =$markedcontact->where(['status' => 1]);

        $this->view('adminViewContactUs',['contactform'=>$contactform,'markedcontact'=>$markedcontact]);
        // break;
        
    }

    public function delete() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $contactform_id =$_POST['contactform_id'];

            $contactform = new Contactform;

            $result = $contactform->delete($contactform_id,'id');
            // $this->view('adminViewContactUs');
            // redirect(adminViewContactUs);
        }
        // $contactform = $contactform->findAll();
        $contactform = new Contactform;
        // $contactform = $contactform->findAll();
        $contactform = $contactform->where(['status' => 0]);


        $markedcontact = new Contactform;
        $markedcontact =$markedcontact->where(['status' => 1]);

        $this->view('adminViewContactUs',['contactform'=>$contactform,'markedcontact'=>$markedcontact]);

    }

    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $contactform_id =$_POST['contactform_id'];

            $contactform = new Contactform;

            $result = $contactform->update($contactform_id,['status'=>1],'id');
            
        }

        $contactform = new Contactform;
        // $contactform = $contactform->findAll();
        $contactform = $contactform->where(['status' => 0]);


        $markedcontact = new Contactform;
        $markedcontact =$markedcontact->where(['status' => 1]);

        $this->view('adminViewContactUs',['contactform'=>$contactform,'markedcontact'=>$markedcontact]);

    }

}