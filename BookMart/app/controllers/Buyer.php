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
        $orders = $orderModel->where(['buyer_id' => $_SESSION['user_id']]);
    
        $bookModel = new BookModel(); 
        $userModel = new UserModel();     
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

    public function addReview(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $order_id = $_POST['order_id'];
            $seller_name = $_POST['seller_username'];
            $book_id = $_POST['book_id'];
            $buyer_id = $_SESSION['user_id'];

            $bookModel = new BookModel();
            $orderModel = new Order();
            

            $book= $bookModel->first(['id' => $book_id]);
            $order=$orderModel->first(['order_id' => $order_id]);
            
            $data = [
                'buyer_id' => $buyer_id,
                'book' => $book,
                'order' => $order,
                'book_id' => $book_id,
                'order_id' => $order_id,
                'seller_username' => $seller_name
            ];

        }
        $this->view('bookReviewAdd',$data);
    }

    public function submitReview(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                'order_id' => htmlspecialchars($_POST['order_id']),
                'book_id' => htmlspecialchars($_POST['book_id']),
                'comment' => htmlspecialchars($_POST['review_text']),
                'rating' => isset($_POST['rating']) ? htmlspecialchars($_POST['rating']) : null,
                'seller_rating' => isset($_POST['seller_rating']) ? htmlspecialchars($_POST['seller_rating']) : null,
                'buyer_id' => htmlspecialchars($_POST['buyer_id'])
            ];

            $reviewModel = new ReviewModel();
            $orderModel = new Order();

            $reviewModel->insert($data);
            $orderModel->update($_POST['order_id'],['order_status' => 'reviewed']);

            $this->reviews();
        }
    }   

    public function reviews() {
        $buyerModel = new BuyerModel();
        $buyerId = $_SESSION['user_id'];
    
        $orderModel = new Order();
        $orderModel->setLimit(50);
        $completedOrders = $orderModel->where([
            'buyer_id' => $buyerId,
            'order_status' => 'completed'
        ]);

        $reviewedOrders = $orderModel->where([
            'buyer_id' => $buyerId,
            'order_status' => 'reviewed'
        ]);

        if (!is_array($reviewedOrders)) {
            $reviewedOrders = [];
        }

        if (!is_array($completedOrders)) {
            $completedOrders = [];
        }
    
        $reviewModel = new ReviewModel();
        $userModel = new UserModel();
        $bookModel = new BookModel();
    
        $unreviewedOrders = [];
    
        foreach ($completedOrders as $order) {
            $review = $reviewModel->first([
                'buyer_id' =>  $_SESSION['user_id'],
                'order_id' => $order->order_id
            ]);
    
            if (!$review) {
                $book = $bookModel->first(['id' => $order->book_id]);
            
                if ($book) {
                    $order->book_title = $book->title;
                    $order->book_author = $book->author;
                    $order->cover_image = $book->cover_image;
                    $order->seller_id = $book->seller_id;
                    $order->condition = $book->book_condition;
        
                    $seller = $userModel->first(['id' => $book->seller_id]);
                    $order->seller_username = $seller ? $seller->username : "Unknown Seller";
                } else {
                    $order->book_title = "Unknown Book";
                    $order->seller_id = null;
                    $order->seller_username = "Unknown Seller";
                }
                $unreviewedOrders[] = $order;
            }
        }

        $history = [];

        foreach ($reviewedOrders as $order) {
            $review = $reviewModel->first([
                'buyer_id' =>  $_SESSION['user_id'],
                'order_id' => $order->order_id
            ]);
    
            if ($review) {
                $book = $bookModel->first(['id' => $order->book_id]);
                $order->review = $review;
                if ($book) {
                    $order->book_title = $book->title;
                    $order->book_author = $book->author;
                    $order->cover_image = $book->cover_image;
                    $order->seller_id = $book->seller_id;
                    $order->condition = $book->book_condition;
                    $seller = $userModel->first(['id' => $book->seller_id]);
                    $order->seller_username = $seller ? $seller->username : "Unknown Seller";
                } else {
                    $order->book_title = "Unknown Book";
                    $order->seller_id = null;
                    $order->seller_username = "Unknown Seller";
                }
                $history[] = $order;
            }
        }
    
        $this->view('buyerReview', ['orders' => $unreviewedOrders ,'history' => $history]);
    }
    

}
