<?php

class AdminViewbuyer extends Controller {

    public function index($id = null) {
        // Get the ID from URL parameter if not passed directly
        if(!$id) {
            $id = $_GET['id'] ?? null;
        }
        
        if(!$id) {
            // Handle error - no ID provided
            $this->redirect('adminViewallusers');
            return;
        }
        
        // Load models
        $buyer = new BuyerModel();
        $user = new UserModel();
        $order = new Order();
        $review = new ReviewModel();
        
        // Get buyer data
        $buyerInfo = $buyer->first(['user_id' => $id]);
        
        // Get email from user table
        $userInfo = $user->first(['ID' => $id]);
        
        // New solution using findAll() with proper parameters
        if ($buyerInfo) {
            $orders = $order->query("SELECT o.*, b.title 
                                    FROM orders o
                                    LEFT JOIN book b ON o.book_id = b.id
                                    WHERE o.buyer_id = :buyer_id 
                                    ORDER BY o.order_id", 
                                    [':buyer_id' => $buyerInfo->user_id]);
        } else {
            $orders = [];
        }
        
        //review
        $reviews = $review->query("SELECT r.*, b.title 
                                    FROM review r
                                    LEFT JOIN book b ON r.book_id = b.id
                                    WHERE r.buyer_id = :buyer_id 
                                    ORDER BY r.id", 
                                    [':buyer_id' => $buyerInfo->user_id]);
        
        // Combine data for the view
        $data = [
            'buyer' => $buyerInfo,
            'user' => $userInfo,
            'orders' => $orders,
            'reviews' => $reviews
        ];
        
        $this->view('adminViewbuyer', $data);
    }
    
    /**
     * Update user status
     * This method handles AJAX requests to update a user's active_status
     */
    public function updateStatus() {
        // Check if it's an AJAX request
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get JSON data from request body
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            
            if (!$data || !isset($data->userId) || !isset($data->active_status)) {
                // Invalid request data
                http_response_code(400);
                echo json_encode(['active_status' => 'error', 'message' => 'Invalid request data']);
                return;
            }
            
            $userId = $data->userId;
            $status = $data->active_status;
            
            // Validate status
            if ($status !== 'active' && $status !== 'inactive' && $status !== 'suspended') {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Invalid status value']);
                return;
            }
            
            // Update user status in the database
            $userModel = new UserModel();
            $result = $userModel->update($userId, ['active_status' => $status]);
            
            if ($result) {
                // Success
                echo json_encode(['active_status' => 'success', 'message' => 'User status updated successfully']);
            } else {
                // Failed to update
                http_response_code(500);
                echo json_encode(['active_status' => 'error', 'message' => 'Failed to update user status']);
            }
        } else {
            // Not a POST request
            http_response_code(405);
            echo json_encode(['active_status' => 'error', 'message' => 'Method not allowed']);
        }
    }
}