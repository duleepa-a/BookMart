<?php

class AdminHome extends Controller{

    public function index(){
        $this->view('adminHome');
    }

    public function getAdminHomeData($user_id) {
        $bookModel = new BookModel();
        $orderModel = new Order();
        $userModel = new UserModel();
        $payroll = new payroll();
        $storeAdvModel = new StoreAdvModel();
        $advModel = new AdvModel();
    
        // Total books with 'available' status
        $bookData = $bookModel->query("SELECT SUM(quantity) AS total_book FROM book WHERE status = 'available'");
        $totalBooks = $bookData[0]->total_book ?? 0;
    
        //Monthly Revenue
        $systemfeeData = $payroll->query("SELECT SUM(system_fee) AS total_fee FROM payroll WHERE settlement_status = 'paid'");
        $approvedAddData = $storeAdvModel->query("SELECT SUM(payment_amount) AS total_price FROM store_add WHERE active_status = 1");
        $adminAddData = $advModel->query("SELECT SUM(Price) AS total_adminaddprice FROM admin_add ");

        $totalSystemFee = $systemfeeData[0]->total_fee ?? 0;
        $totalApprovedAdd = $approvedAddData[0]->total_price ?? 0;
        $totalAdminAdd = $adminAddData[0]->total_adminaddprice ?? 0;

        $totalRevenues = $totalSystemFee + $totalApprovedAdd + $totalAdminAdd;

        // Total orders
        $orderData = $orderModel->query("SELECT COUNT(order_id) AS total_order FROM orders");
        $totalOrders = $orderData[0]->total_order ?? 0;
    
        // Total users excluding admins
        $userData = $userModel->query("SELECT COUNT(id) AS total_user FROM user WHERE role NOT IN ('admin', 'superAdmin')");
        $totalUsers = $userData[0]->total_user ?? 0;
    

        //pie chart (users)
        $roleData = $userModel->query("
            SELECT role, COUNT(*) AS count 
            FROM user 
            WHERE role IN ('buyer', 'bookSeller', 'bookStore', 'courier')
            GROUP BY role
        ");

        $roles = [
            'buyer' => 0,
            'bookSeller' => 0,
            'bookStore' => 0,
            'courier' => 0
        ];

        foreach ($roleData as $row) {
            $role = $row->role;
            if (isset($roles[$role])) {
                $roles[$role] = (int)$row->count;
            }
        }

        // Orders by Month - last 6 months
        $monthlyOrdersData = $orderModel->query("
            SELECT DATE_FORMAT(created_on, '%b') AS month, COUNT(*) AS order_count
            FROM orders
            WHERE created_on >= DATE_SUB(CURDATE(), INTERVAL 6 MONTH)
            GROUP BY MONTH(created_on)
            ORDER BY MIN(created_on)
        ");

        $monthlyOrders = [
            'months' => [],
            'counts' => []
        ];

        foreach ($monthlyOrdersData as $row) {
            $monthlyOrders['months'][] = $row->month;
            $monthlyOrders['counts'][] = (int)$row->order_count;
        }



        return [
            'totalBooks' => $totalBooks,
            'revenue' => $totalRevenues,
            'orders' => $totalOrders,
            'users' => $totalUsers,
            'roleCounts' => $roles,
            'sales' => $monthlyOrders,
            'systemFeeRevenue' => $totalSystemFee,
            'approvedAdsRevenue' => $totalApprovedAdd,
            'adminAdsRevenue' => $totalAdminAdd
    
        ];
    }
    



}

