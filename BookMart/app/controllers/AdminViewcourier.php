<?php

class AdminViewcourier extends Controller {

    public function index($id = null) {
        // Get the ID from URL parameter if not passed directly
        if(!$id) {
            $id = $_GET['id'] ?? null;
        }
        
        if(!$id) {
            // Handle error - no ID provided
            $this->redirect('adminViewcourier');
            return;
        }
        
        // Load models
        $courier = new Courier();
        $user = new UserModel();
        $order = new Order();
      //  $review = new Review();
        
        // Get buyer data
        $courierInfo = $courier->first(['user_id' => $id]);
        
        // Get email from user table
        $userInfo = $user->first(['ID' => $id]);
        
        
        //   $reviews = $review->where(['buyer_id' => $id]);
        
        // Combine data for the view
        $data = [
            'courier' => $courierInfo,
            'user' => $userInfo,
          //  'orders' => $orders,
          //  'reviews' => $reviews
        ];
        
        $this->view('adminViewcourier', $data);
        
    }

    public function delete() {
        // Check if it's a POST request
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            $userId = $data['user_id'] ?? null; // This line might be the issue
            
            if (!$userId) {
                return json_encode(['status' => 'error', 'message' => 'No user ID provided']);
            }
            
            // Load courier model
            $courier = new Courier();
            $user = new UserModel();
            
            // Delete user from courier table
            $courier_deleted = $courier->delete(['user_id' => $id]);
            
            // Delete from user table 
            $user_deleted = $user->delete(['ID' => $id]);
            
            if($courier_deleted && $user_deleted) {
                echo json_encode(['status' => 'success', 'message' => 'User deleted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete user']);
            }
            
            return;
        }
        
        $this->redirect('admin/couriers');
    }
}