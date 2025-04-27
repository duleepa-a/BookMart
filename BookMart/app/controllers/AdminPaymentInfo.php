<?php

class AdminPaymentInfo extends Controller {
    public function index() {
        // Check if user is logged in and has admin privileges
        if (!isset($_SESSION['user_role']) || ($_SESSION['user_role'] != 'admin' && $_SESSION['user_role'] != 'superAdmin')) {
            redirect('Login');
        }
        
        $paymentInfoModel = new PaymentInfo();
        // $systemStatsModel = new SystemStats();

        // Pagination parameters
        $limit = 10; // Changed from 1 to 10 for better usability
        $totalpayments = $paymentInfoModel->count();
        $totalPages = ceil($totalpayments / $limit);

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        if ($page > $totalPages && $totalPages > 0) $page = $totalPages;

        $offset = ($page - 1) * $limit;

        // Get payment data with all necessary joins
        $payment = $paymentInfoModel->findAll($limit, $offset);
        
        // Get system stats
        // $stat = $systemStatsModel->getAll();
        
        // Pass data to the view - simplified variables for direct access
        $this->view('adminPaymentInfo', [
            'payment' => $payment,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            // 'stat' => $stat
        ]);
    }
    
    // API endpoint to get system stats
    public function getSystemStats() {
        // Check if user is logged in and has admin privileges
        if (!isset($_SESSION['user_role']) || ($_SESSION['user_role'] != 'admin' && $_SESSION['user_role'] != 'superAdmin')) {
            $this->json(['success' => false, 'message' => 'Unauthorized access']);
            return;
        }
        
        $systemStatsModel = new SystemStats();
        $stats = $systemStatsModel->getFirst();
        
        if ($stats) {
            $this->json(['success' => true, 'stats' => $stats]);
        } else {
            $this->json(['success' => false, 'message' => 'No system stats found']);
        }
    }
    
    // API endpoint to update system stats
    public function updateSystemStats() {
        // Check if user is logged in and has superAdmin privileges
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 'superAdmin') {
            $this->json(['success' => false, 'message' => 'Unauthorized access']);
            return;
        }
        
        // Validate input
        if (!isset($_POST['systemfee_book']) || !isset($_POST['systemfee_add']) || !isset($_POST['deliveryfee'])) {
            $this->json(['success' => false, 'message' => 'Missing required fields']);
            return;
        }
        
        $systemfee_book = floatval($_POST['systemfee_book']);
        $systemfee_add = floatval($_POST['systemfee_add']);
        $deliveryfee = floatval($_POST['deliveryfee']);
        $email = $_POST['system_email'];
        
        // Validate values
        if ($systemfee_book < 0 || $systemfee_add < 0 || $deliveryfee < 0) {
            $this->json(['success' => false, 'message' => 'Values cannot be negative']);
            return;
        }
        
        $systemStatsModel = new SystemStats();
        $result = $systemStatsModel->updateStats($systemfee_book, $systemfee_add, $deliveryfee,$email);
        
        if ($result) {
            $this->json(['success' => true]);
        } else {
            $this->json(['success' => false, 'message' => 'Failed to update system stats']);
        }
    }
    
    // Helper method to return JSON response
    private function json($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}