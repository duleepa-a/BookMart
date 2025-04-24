<?php

class AdminViewbuyer extends Controller {

    public function index($id = null) {
        if(!$id) {
            $id = $_GET['id'] ?? null;
        }
        
        if(!$id) {
            redirect('adminViewallusers');
            return;
        }
        
        // Load models
        $buyer = new BuyerModel();
        $user = new UserModel();
        $order = new Order();
        $review = new ReviewModel();
        
   
        $buyerInfo = $buyer->first(['user_id' => $id]);
        $userInfo = $user->first(['ID' => $id]);
        
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
        
        $reviews = $review->query("SELECT r.*, b.title 
                                    FROM review r
                                    LEFT JOIN book b ON r.book_id = b.id
                                    WHERE r.buyer_id = :buyer_id 
                                    ORDER BY r.id", 
                                    [':buyer_id' => $buyerInfo->user_id]);

        $data = [
            'buyer' => $buyerInfo,
            'user' => $userInfo,
            'orders' => $orders,
            'reviews' => $reviews
        ];
        
        $this->view('adminViewbuyer', $data);
    }
 
    public function updateStatus() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $json = file_get_contents('php://input');
            $data = json_decode($json);
            
            if (!$data || !isset($data->userId) || !isset($data->active_status)) {
                http_response_code(400);
                echo json_encode(['active_status' => 'error', 'message' => 'Invalid request data']);
                return;
            }
            
            $userId = $data->userId;
            $status = $data->active_status;
            
     
            if ($status !== 'active' && $status !== 'inactive' && $status !== 'deleted') {
                http_response_code(400);
                echo json_encode(['status' => 'error', 'message' => 'Invalid status value']);
                return;
            }
            
            $userModel = new UserModel();
            $userModel->update($userId, ['active_status' => $status]);
          
            echo json_encode(['active_status' => 'success', 'message' => 'User status updated successfully']);
          
        } else {
            // Not a POST request
            http_response_code(405);
            echo json_encode(['active_status' => 'error', 'message' => 'Method not allowed']);
        }
    }
}