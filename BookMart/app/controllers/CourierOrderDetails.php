<?php

class CourierOrderDetails extends Controller{

    public function index(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];
        
        

        $ordersModel = new Orders();
        $orders = $ordersModel->where(['order_id' => $order_id]);
        }

        // $buyerID =$orders[0]->buyer_id;
        // // echo $buyerID;

        // $buyerModel = new BuyerModel();
        // $buyer =$buyerModel->where(['id'=> $buyerID]);


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $buyer_id =$_POST['buyer_id'];

        $buyer = new BuyerModel();
        $buyer = $buyer->where(['id' => $buyer_id]);

        }

        $this->view('courierOrderDetails',['orders'=>$orders,'buyer'=>$buyer]);
    }

    
    public function create() {
        $orders = new CourierOrder;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $com = [
                'order_id' => $_POST['order_id'],
                'courier_id' => $_SESSION['user_id'],
                'pickup_location' => $_POST['pickup_location'],
                'shipping_address' => $_POST['shipping_address'],
                'distance' =>$_POST['distance'],
                'timeframe' =>$_POST['timeframe']
            ]; 
        }
        $res = $orders->insert($com);

        // $ordersModel = new Orders();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];

            $contactform = new Orders();
            $result = $contactform->update($order_id,['order_status'=>'accept'],'order_id');
            
        }

        $ordersModel = new Orders();
        $orders = $ordersModel->where(['order_status' => 'pending']);

        $this->view('courierHome',['orders'=>$orders]);
    }

}
