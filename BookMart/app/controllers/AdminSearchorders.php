<?php

class AdminSearchorders extends Controller {
    public function index() {
        $orderModel = new Order();
        $sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';
        $order_status = isset($_GET['order_status']) ? $_GET['order_status'] : '';
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 9; 
        $offset = ($page - 1) * $limit;
        
        if (!empty($order_status)) {
            $orders = $orderModel->getordersByStatus($order_status, $limit, $offset);
            $totalOrders = $orderModel->count($order_status);
        } 
        else {
            $orders = $orderModel->findAll($limit, $offset);
            $totalOrders = $orderModel->count();
        }
        
        $totalPages = ceil($totalOrders / $limit);
        
        $this->view('adminSearchorders', [
            'order' => $orders,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'sort' => $sort,
            'selected_status' => $order_status
        ]);
    }
}