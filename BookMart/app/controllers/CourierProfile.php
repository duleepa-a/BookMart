<?php

class CourierProfile extends Controller{

    public function index(){

        $courierData = new Courier();
        $courierD = $courierData->where(['user_id' =>  $_SESSION['user_id']]);

         //**** */
        if (!empty($courierD)) {
            $courier = $courierD[0];
            $user_id = $courier->user_id ;
        }

        $courierModel = new UserModel();
        $courier = $courierModel->where(['ID' => $user_id]);
        // echo '<pre>';
        // print_r($courierD);
        // echo '</pre>';
        $this->view('courierProfile',  ['courierD' =>$courierD,'courier'=>$courier]);
    }

}
