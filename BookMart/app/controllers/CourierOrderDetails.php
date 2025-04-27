<?php

require 'Map.php';

class CourierOrderDetails extends Controller{

    public function index(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];  
          

            $ordersModel = new Order();
            $orders = $ordersModel->first(['order_id' => $order_id]);

          

            $book = new BookModel();
            $book = $book ->first(['id' => $orders->book_id]); 

        }

        $mapController = new Map();

        $locationData = $mapController->getLocationData($order_id);

        $this->view('courierOrderDetails',['order'=>$orders, 'book' => $book , 'locationData' => $locationData]);
    }

    public function OrderPage(){
        
        $ordersModel = new CourierOrder();

        //all order view
        $Order = $ordersModel->where(['courier_id' =>  $_SESSION['user_id']],);

    
        //accept order view
        $acceptorders = $ordersModel->where(['status' => 'Accepted','courier_id' =>  $_SESSION['user_id']]);
        
        

        //pending order view
        $pendingorders = $ordersModel->where(['status' => 'Pending','courier_id' =>  $_SESSION['user_id']]);

        //completed order view
        $completedorders = $ordersModel->where(['status' => 'Completed','courier_id' =>  $_SESSION['user_id']]);


        $this->view('courierOrders',[
                                        'Order'=>$Order,
                                        'acceptorders'=>$acceptorders,
                                        'pendingorders'=>$pendingorders,
                                        'completedorders'=>$completedorders
                                    ]);

    }

    
    public function create() {
        $courierOrders = new CourierOrder;
        $ordersModel = new Order();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $com = [
                'order_id' => $_POST['order_id'],
                'courier_id' => $_SESSION['user_id'],
                'pickup_location' => $_POST['pickup_location'],
                'shipping_address' => $_POST['shipping_address'],
                'distance' =>$_POST['distance'],
                'timeframe' =>$_POST['timeframe'],
            ]; 
        }

        $courierOrders->insert($com);


        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];
            $randomNumber = rand(10000, 99999);

            $order = $ordersModel->first(['order_id' => $order_id]);  

            $ordersModel->update($order_id,['courier_id'=>$_SESSION['user_id'] ,'pinCode' => $randomNumber ]);

            $notificationModel = new NotificationModel();
            $notificationModel->createNotification(
                $order->buyer_id,
                'Order no '.$order->order_id.'has been accepted by a courier',
                'View order details by clicking here.',
                '/BookstoreController/orderView/' . $order_id  );
        }
        
        $orders = $ordersModel->where(['order_status' => 'pending']);
        
        $filteredOrders = array_filter($orders, function($order) {
            return is_null($order->courier_id);
        });

        $this->view('courierHome',['orders'=>$filteredOrders]);
    }

    public function update() {
        $orderModel = new Order();
        $courierOrdersModel = new CourierOrder();
        $payRoll = new Payroll();
        $notificationModel = new NotificationModel();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];

            $courierOrder_id = $courierOrdersModel->first(['order_id' => $order_id])->id;

            $courierOrdersModel->update($courierOrder_id,['status'=>'Completed']);
            $orderModel->update($order_id,['order_status'=>'completed',
                                            'completed_date' => date('Y-m-d H:i:s')
                                          ]);

            $order = $orderModel->first(['order_id' => $order_id]);
            $payRoll->addPayRoll($order_id);

            $notificationModel->createNotification(
                $order->buyer_id,
                'Order Completed!',
                'Your order has been successfully delivered. Thank you for shopping with us! We hope to see you again.',
                '/Buyer/orders/' . $order_id
            );

            $notificationModel->createNotification(
                $order->seller_id,
                'Order Delivered!',
                'The order for your book has been successfully completed and delivered to the buyer. Great job!',
                '/BookstoreController/orderView/' . $order_id 
            );
            
            
            
        }

        $Order = $courierOrdersModel->where(['courier_id' =>  $_SESSION['user_id']],);

    
        $this->OrderPage();
    }

    public function delete() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $order_id =$_POST['order_id'];

            $orders = new CourierOrder();
            $result = $orders->delete(id: $order_id,id_column: 'order_id');

        }
      
        $this->OrderPage();

    }

}
