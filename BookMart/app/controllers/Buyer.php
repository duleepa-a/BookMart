<?php

class Buyer extends Controller{

    public function index(){
        $this->view('buyerHome');
    }
    public function orders() {
        $buyerModel = new BuyerModel();
        $buyerId = $buyerModel->first(['user_id' => $_SESSION['user_id']])->id;
    
        $orderModel = new Order();
        $orderModel->setLimit(50);
        $orders = $orderModel->where(['buyer_id' => $buyerId]);
    
        $bookModel = new BookModel(); // Assuming there's a Book model
        $userModel = new UserModel(); // Assuming there's a User model for sellers
    
        $groupedOrders = [];
    
        foreach ($orders as $order) {
            $status = $order->order_status;
    
            // Fetch book details
            $book = $bookModel->first(['id' => $order->book_id]);
            
            if ($book) {
                $order->book_title = $book->title;
                $order->book_author = $book->author;
                $order->cover_image = $book->cover_image;
                $order->seller_id = $book->seller_id;
    
                // Fetch seller's username
                $seller = $userModel->first(['id' => $book->seller_id]);
                $order->seller_username = $seller ? $seller->username : "Unknown Seller";
            } else {
                $order->book_title = "Unknown Book";
                $order->seller_id = null;
                $order->seller_username = "Unknown Seller";
            }
    
            // Group orders by status
            if (!isset($groupedOrders[$status])) {
                $groupedOrders[$status] = [];
            }
            $groupedOrders[$status][] = $order;
        }
        foreach ($orders as $order) {
            $status = 'all';
    
            // Fetch book details
            $book = $bookModel->first(['id' => $order->book_id]);
            
            if ($book) {
                $order->book_title = $book->title;
                $order->book_author = $book->author;
                $order->cover_image = $book->cover_image;
                $order->seller_id = $book->seller_id;
    
                // Fetch seller's username
                $seller = $userModel->first(['id' => $book->seller_id]);
                $order->seller_username = $seller ? $seller->username : "Unknown Seller";
            } else {
                $order->book_title = "Unknown Book";
                $order->seller_id = null;
                $order->seller_username = "Unknown Seller";
            }
    
            // Group orders by status
            if (!isset($groupedOrders[$status])) {
                $groupedOrders[$status] = [];
            }
            $groupedOrders[$status][] = $order;
        }
    
        $this->view('buyerOrders', ['groupedOrders' => $groupedOrders]);
    }
    

    public function trackOrder($orderId){
        $this->view('buyerTrackOrder');
    }
    public function myProfile(){
        $this->view('buyerProfile');
    }

    public function register(){
        $this->view('buyerRegister');
    }

    public function reviews(){
        $this->view('buyerReview');
    }

}
