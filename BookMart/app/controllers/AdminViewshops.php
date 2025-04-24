<?php

class AdminViewshops extends Controller {

    public function index($id = null) {
        // Get the ID from URL parameter if not passed directly
        if(!$id) {
            $id = $_GET['id'] ?? null;
        }
        
        if(!$id) {
            // Handle error - no ID provided
            redirect('adminViewshops');
            return;
        }
        
        // Load models
        $bookstore = new BookStore();
        $user = new UserModel();
        $order = new Order();
        $review = new ReviewModel();
        
        // Get buyer data
        $bookstoreInfo = $bookstore->first(['user_id' => $id]);
        
        // Get email from user table
        $userInfo = $user->first(['ID' => $id]);
        
        // orders
        if ($bookstoreInfo) {
            $orders = $order->query(
                                    "SELECT o.*, b.title, b.genre, b.price 
                                    FROM orders o
                                    LEFT JOIN book b ON o.book_id = b.id
                                    WHERE o.seller_id = :seller_id 
                                    ORDER BY o.order_id", 
                                    [':seller_id' => $bookstoreInfo->user_id]);
        } else {
            $orders = [];
        }

        //review
        $reviews = $review->query(
                                    "SELECT r.*, b.title, bu.full_name
                                    FROM review r
                                    LEFT JOIN book b ON r.book_id = b.id
                                    LEFT JOIN buyer bu ON r.buyer_id = bu.user_id
                                    LEFT JOIN orders o ON r.order_id = o.order_id
                                    WHERE o.seller_id = :seller_id 
                                    ORDER BY r.id", 
                                    [':seller_id' => $bookstoreInfo->user_id]);
        
        // Combine data for the view
        $data = [
            'bookstore' => $bookstoreInfo,
            'user' => $userInfo,
            'orders' => $orders,
            'reviews' => $reviews
        ];
        
        $this->view('adminViewshops', $data);
    }
}