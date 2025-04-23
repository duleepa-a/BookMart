<?php

class AdminSearchorders extends Controller {
    public function index() {
        $orderModel = new Order();
        $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';
        
        // Pagination parameters
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 1; // Books per page (adjusted to 3 as per your comment)
        $offset = ($page - 1) * $limit;
        
        // Build the sort clause
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
            $sortClause = " ORDER BY b.title ASC"; // Default sorting
        }
        
        // Get orders based on search query and sorting
        if (!empty($searchQuery)) {
            // Get paginated search results
            $orders = $orderModel->searchOrders($searchQuery, $limit, $offset, $sortClause, $sort);
            // Get total count for pagination
            $totalOrders = $orderModel->countSearchResults($searchQuery, $sort);
        } else {
            // Get all orders when no search is performed
            $orders = $orderModel->findAll($limit, $offset, $sortClause);
            // Get total count for pagination
            $totalOrders = $orderModel->count();
        }
        
        $totalPages = ceil($totalOrders / $limit); // Calculate the total number of pages
        
        // Pass data to the view
        $this->view('adminSearchorders', [
            'order' => $orders,
            'searchQuery' => $searchQuery,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'sort' => $sort
        ]);
    }
}