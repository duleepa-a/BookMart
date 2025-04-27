<?php

class AdminViewcourier extends Controller {

    public function index($id = null) {
        if(!$id) {
            $id = $_GET['id'] ?? null;
        }
        
        if(!$id) {
           redirect('adminViewcourier');
            return;
        }
        
        // Load models
        $courier = new Courier();
        $user = new UserModel();
        $courierorder = new CourierOrder();
        
        // Get buyer data
        $courierInfo = $courier->first(['user_id' => $id]);
        
        // Get email from user table
        $userInfo = $user->first(['ID' => $id]);
        
        //recent deliveries
        if ($courierInfo) {
            $deliveries = $courierorder->query("SELECT co.*, o.created_on, o.total_amount, b.title
                                                FROM courierOrder co
                                                LEFT JOIN orders o ON co.order_id = o.order_id
                                                LEFT JOIN book b ON o.book_id = b.id
                                                WHERE co.courier_id = :courier_id
                                                ORDER BY co.id DESC
                                                LIMIT 10", 
                                                [':courier_id' => $courierInfo->user_id]);
        } else {
            $deliveries = [];
        }
        
        
        $data = [
            'courier' => $courierInfo,
            'user' => $userInfo,
            'deliveries' => $deliveries
        ];
        
        $this->view('adminViewcourier', $data);
        
    }

}