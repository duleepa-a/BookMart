<?php

class AdminOrderView extends Controller {
    public function index() {
        if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
            die('Order ID is required');
        }
    
        $order_id = $_GET['order_id'];
    
        // Load the model
        $orderModel = new Order();
        $order = $orderModel->findById($order_id);
    
        // Check if the order exists
        if (!$order) {
            die('Order not found');
        }
    
        // Pass the order data to the view
        $this->view('adminOrderView', ['order' => $order]);
    }
    
    // Add this method for book listing with pagination
    public function list($page = 1) {
        $page = max(1, (int)$page);
        $perPage = 11; // 11 books per page
        $offset = ($page - 1) * $perPage;
        
        $orderModel = new Order();
        $orders = $orderModel->findAll($perPage, $offset);
        $totalOrders = $orderModel->count();
        $totalPages = ceil($totalOrders / $perPage);
        
        $this->view('adminorders', [
            'orders' => $orders,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'perPage' => $perPage
        ]);
    }
    
    // Add this method for searching with pagination
    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $page = max(1, (int)($_GET['page'] ?? 1));
        $perPage = 11; // 11 books per page
        $offset = ($page - 1) * $perPage;
        
        $orderModel = new Order();
        $orders = $orderModel->searchOrders($keyword, $perPage, $offset);
        $totalOrders = $orderModel->countSearchResults($keyword);
        $totalPages = ceil($totalOrders / $perPage);
        
        $this->view('adminSearchResults', [
            'orders' => $orders,
            'keyword' => $keyword,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'perPage' => $perPage
        ]);
    }

    public function orderdetails() {
        $orderModel = new Order();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ensure book_id exists in the request
            if (!isset($_POST['order_id']) || empty($_POST['order_id'])) {
                die('Order ID is required');
            }

            $order_id = $_POST['order_id'];
            
            // Sanitize and validate input
            $orderData = [
                'id' => (int)$order_id,
                'title' => trim($_POST['book_Title'] ?? ''),
                'customer_name' => trim($_POST['full_name'] ?? ''),
                'publisher' => trim($_POST['publisher'] ?? ''),
                'quantity' => trim($_POST['quantity'] ?? ''),
                'price' => filter_var(trim($_POST['Price'] ?? 0), FILTER_VALIDATE_FLOAT),
                'discount_applied' => filter_var(trim($_POST['discount_applied'] ?? 0), FILTER_VALIDATE_FLOAT),
                'delivery_fee' => filter_var(trim($_POST['delivery_fee'] ?? 0), FILTER_VALIDATE_FLOAT),
                'total_amount' => filter_var(trim($_POST['total_amount'] ?? 0), FILTER_VALIDATE_FLOAT),
                'shipping_address'=> trim($_POST['shipping_address'] ?? ''),
                'province'=> trim($_POST['province'] ?? ''),
                'district'=> trim($_POST['district'] ?? ''),
                'city'=> trim($_POST['city'] ?? ''),
                'created_on'=> trim($_POST['created_on'] ?? ''),
                'shipped_date'=> trim($_POST['shipped_date'] ?? ''),
                'completed_date'=> trim($_POST['completed_date'] ?? ''),
                'canceled_date'=> trim($_POST['canceled_date'] ?? '')
            ];

            // Make sure Price is valid
            if ($orderData['price'] === false) {
                die('Invalid Price');
            }

            if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === 0) {
                $uploadDir = 'assets/Images/books/';
                // Create directory if it doesn't exist
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $filename = time() . '_' . basename($_FILES['cover_image']['name']);
                $targetFile = $uploadDir . $filename;
                
                if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $targetFile)) {
                    $orderData['cover_image'] = $targetFile;
                   
                }
            }
        }
        // If not POST or update failed, redirect back to index
        redirect('AdminSearchorders');
    }
    
    public function deleteOrder() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $orderModel = new Order();
            if (isset($_POST['order_id']) && !empty($_POST['order_id'])) {
                $id = $_POST['order_id'];
                
                try {
                    $orderModel->delete($id);
                    // Optional: Add success message
                    // $_SESSION['success_message'] = "Order deleted successfully";
                } catch (PDOException $e) {
                    // Handle database errors or constraint failures
                    // Log the error for administrators
                    error_log("Error deleting order ID {$id}: " . $e->getMessage());
                    
                    // Optional: Add error message for the user
                    // $_SESSION['error_message'] = "Unable to delete order. Please contact support.";
                }
            }
        }
        redirect('AdminSearchorders');
    }
}