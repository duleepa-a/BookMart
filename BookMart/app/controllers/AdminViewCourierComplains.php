<?php

class AdminViewCourierComplains extends Controller{

    public function index(){

        $complains = new CourierComplain;
        $Complainsnew = $complains->where(['status' => 0]);


        $markedcomplains = new CourierComplain;
        $markedcomplainsnew =$markedcomplains->where(['status' => 1]);

        $this->view('adminViewCourierComplains',['complains'=>$Complainsnew,'markedcomplains'=>$markedcomplainsnew]);
        

        
    }


    public function delete() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $complain_id =$_POST['complain_id'];

            $complains = new CourierComplain;
            $result = $complains->delete($complain_id,'id');

        }
        $complains = new CourierComplain;
        $complains = $complains->where(['status' => 0]);


        $markedcomplains = new CourierComplain;
        $markedcomplains =$markedcomplains->where(['status' => 1]);

        redirect('adminViewCourierComplains');

        $this->view('adminViewCourierComplains',['contactform'=>$complains,'markedcontact'=>$markedcomplains]);

    }

    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $complain_id =$_POST['complain_id'];

            $complains = new CourierComplain;
            $result = $complains->update($complain_id,['status'=>1],'id');
            
        }

        $complains = new CourierComplain;
        $complains = $complains->where(['status' => 0]);


        $markedcomplains = new CourierComplain;
        $markedcomplains =$markedcomplains->where(['status' => 1]);

        redirect('adminViewCourierComplains');

        $this->view('adminViewCourierComplains',['contactform'=>$complains,'markedcontact'=>$markedcomplains]);

    }
}
