<?php

class AdminSearchorders extends Controller {
    public function index() {
        $orderModel = new Order();
        $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5; 
        $offset = ($page - 1) * $limit;
        

        $sortClause = "";
        if ($sort) {
            switch ($sort) {
                case 'title':
                    $sortClause = " ORDER BY b.title ASC";
                    break;
                case 'name':
                    $sortClause = " ORDER BY u.full_name ASC";
                    break;
                case 'store':
                    $sortClause = " ORDER BY b.publisher ASC";
                    break;
                case 'status':
                    $sortClause = " ORDER BY o.order_status ASC";
                    break;
                default:
                    $sortClause = " ORDER BY b.title ASC";
            }
        } else {
            $sortClause = " ORDER BY b.title ASC";
        }
        
  
        if (!empty($searchQuery)) {
            $orders = $orderModel->searchOrders($searchQuery, $limit, $offset, $sortClause, $sort);
            $totalOrders = $orderModel->countSearchResults($searchQuery, $sort);
        } else {
            $orders = $orderModel->findAll($limit, $offset, $sortClause);
            $totalOrders = $orderModel->count();
        }
        
        $totalPages = ceil($totalOrders / $limit);
        
        $this->view('adminSearchorders', [
            'order' => $orders,
            'searchQuery' => $searchQuery,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'sort' => $sort
        ]);
    }
}