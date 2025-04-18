<?php

class CourierAcceptedOrderDetails extends Controller{

    public function index(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];
        
        

        $ordersModel = new Orders();
        $orders = $ordersModel->where(['order_id' => $order_id]);
        }

        $this->view('courierAcceptedOrderDetails',['orders'=>$orders]);
    }

    public function update() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];

            $orders = new CourierOrder();
            $result = $orders->update($order_id,['status'=>'Pending'],'order_id');

            $orderOne = new Orders();
            $res = $orderOne->update($order_id,['order_status'=>'shipping'],'order_id');

        }
        // $this->view('courierOrders');
        // //redirect('courierOrder');

        $orders = new CourierOrder();
        $Order = $orders->where(['courier_id' =>  $_SESSION['user_id']],);

    
    //accept order view
        $ordersModel = new CourierOrder();
        $acceptorders = $ordersModel->where(['status' => 'Accepted','courier_id' =>  $_SESSION['user_id']]);
        
        

    //pending order view
        $ordersModel = new CourierOrder();
        $pendingorders = $ordersModel->where(['status' => 'Pending','courier_id' =>  $_SESSION['user_id']]);

    //completed order view
        $ordersModel = new CourierOrder();
        $completedorders = $ordersModel->where(['status' => 'Completed','courier_id' =>  $_SESSION['user_id']]);


        $this->view('courierOrders',['Order'=>$Order,'acceptorders'=>$acceptorders,'pendingorders'=>$pendingorders,'completedorders'=>$completedorders]);


    }

}
