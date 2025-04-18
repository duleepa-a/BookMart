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
        $buyerModel = new BuyerModel;
        $userModel = new UserModel();
        $data = ['user_id' => $_SESSION['user_id']];
        
        $buyer=$buyerModel->first($data);
        $user = $userModel->first(['ID' => $_SESSION['user_id']]);
        $buyer->email = $user->email;
        $buyer->username = $user->username;

        $buyerData = ['buyer' => $buyer];
        $this->view('buyerProfile',$buyerData);
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
                'buyer_id' => htmlspecialchars($_POST['buyer_id']),
                'seller_id' => htmlspecialchars($_POST['seller_id'])
            ];

            $reviewModel = new ReviewModel();
            $orderModel = new Order();
            $sellerModel = new BookStore();
            $userModel = new UserModel();
            
            if($userModel->first(['ID' => $_POST['seller_id'] ])->role == 'bookSeller'){
                $sellerModel = new BookSeller();
            }

            $seller=$sellerModel->first(['user_id' => $_POST['seller_id']]);

            $reviewModel->insert($data);

            $rating= $reviewModel->getAverageRating($seller->user_id);
            
            $sellerModel->update($seller->id,['rating' => $rating]);
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
    
    public function updatePersonalDetails() {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
            return;
        }
    
        $buyerModel = new BuyerModel();
        $userId = $buyerModel->first(['ID' => $_SESSION['user_id']])->id;
    
        $data = [
            'full_name' => trim($_POST['full-name'] ?? ''),
            'gender' => $_POST['gender'] ?? null,
            'dob' => $_POST['dob'] ?? null,
            'phone_number' => trim($_POST['phone-number'] ?? ''),
            'street_address' => trim($_POST['street-address'] ?? ''),
            'city' => $_POST['city'] ?? null,
            'district' => $_POST['district'] ?? null,
            'province' => $_POST['province'] ?? null,
        ];
    
    
        $buyerModel->update($userId, $data);
    
        $_SESSION['success'] = "Your personal details have been updated successfully!";

        $this->myProfile();
    }

    public function updateLoginDetails() {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
            return;
        }
    
        $userId = $_SESSION['user_id'];
        $newUsername = trim($_POST['username'] ?? '');
    
        if (empty($newUsername)) {
            $_SESSION['error'] = "Username cannot be empty.";
            $this->myProfile();
            return;
        }

        $userModel = new UserModel();
      
    
        if ($userModel->isUsernameTaken($newUsername)) {
            $_SESSION['error'] = "This username is already taken.";
            $this->myProfile();
            return;
        }
    
        $userModel->update($userId, ['username' => $newUsername]);
    
        $_SESSION['success'] = "Username updated successfully!";
        $this->myProfile();
    }
    

}
