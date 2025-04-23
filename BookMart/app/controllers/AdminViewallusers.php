<?php

class AdminViewallusers extends Controller{

    public function index(){

        $userModel = new UserModel();
        $role = isset($_GET['role']) ? $_GET['role'] : '';

        // Pagination parameters
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 3; // users per page (adjusted to 3 as per your comment)
        $offset = ($page - 1) * $limit;

        if (!empty($role)) {
            // Filter by role only
            $users = $userModel->getUsersByRole($role, $limit, $offset);
            $totalUsers = $userModel->count($role);
        } 
        else {
            // Get all users
            $users = $userModel->findAll($limit, $offset);
            $totalUsers = $userModel->count();
        }
        
        $totalPages = ceil($totalUsers / $limit); // Calculate the total number of pages
        
        // Pass data to the view
        $this->view('adminViewallusers', [
            'users' => $users,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'selected_role' => $role

        ]);
    }

}
