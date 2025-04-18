<?php

class CourierAllOrderDetails extends Controller{

    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];
        
        

        $ordersModel = new Order();
        $orders = $ordersModel->where(['order_id' => $order_id]);
        }

        // if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //     $buyer_id =$_POST['buyer_id'];

        // $buyerModel = new BuyerModel();
        // $buyer = $buyerModel->where(['id' => $buyer_id]);

        // }

        $this->view('courierAllOrderDetails',['orders'=>$orders]);
    }

}