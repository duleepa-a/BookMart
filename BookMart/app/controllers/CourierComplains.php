<?php

class CourierComplains extends Controller {

    public function index() {
        $this->view('courierComplains');
    }

    public function create() {
        $complains = new CourierComplain;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $com = [
                'order_id' => $_POST['order_id'],
                'complain' => $_POST['message'],
                'status' => $_POST['status'],
            ]; 
        }
        $res = $complains->insert($com);

        $this->view('courierComplains');
    }

}
