<?php

class AdminViewallusers extends Controller{

    public function index(){

        $userModel = new UserModel();
        $role = isset($_GET['role']) ? $_GET['role'] : '';

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        if (!empty($role)) {
            $users = $userModel->getUsersByRole($role, $limit, $offset);
            $totalUsers = $userModel->count($role);
        } 
        else {
            $users = $userModel->findAll($limit, $offset);
            $totalUsers = $userModel->count();
        }
        
        $totalPages = ceil($totalUsers / $limit); 
        
        $this->view('adminViewallusers', [
            'users' => $users,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'selected_role' => $role

        ]);
    }

}
