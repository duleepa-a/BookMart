<?php

class AdminProfile extends Controller {
    private $userModel;

    public function __construct() {
        if (!isset($_SESSION['user_id']) || 
            !isset($_SESSION['user_role']) || 
            ($_SESSION['user_role'] !== 'admin' && $_SESSION['user_role'] !== 'superAdmin')) {
            redirect('login');
        }

        $this->userModel = $this->model('UserModel');
    }

    public function model($model) {
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }

    public function index() {
        $admin_id = $_SESSION['user_id'] ?? null;

        if (!$admin_id) {
            redirect('login');
        }

        $userData = $this->userModel->getUserById($admin_id);

        $data = [
            'user' => $userData
        ];

        $this->view('adminProfile', $data);
    }

    public function updateUsername() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminId = $_SESSION['user_id']; 
            $username = trim($_POST['username']);
    
            $errors = [];
            if (empty($username)) {
                $errors[] = 'Username is required.';
            }
    
            if ($this->userModel->isUsernameTaken($username)) {
                $currentUser = $this->userModel->getUserById($adminId);
                if (!$currentUser || $currentUser->username !== $username) {
                    $errors[] = 'Username already taken.';
                }
            }
    
            if (!empty($errors)) {
                $_SESSION['error_message'] = implode('<br>', $errors);
                redirect('adminProfile');
                return;
            }

            $this->userModel->update($adminId, ['username' => $username]);
            
        
            $_SESSION['success_message'] = 'Username updated successfully!';
                
            
            redirect('adminProfile');
        } else {
            redirect('adminProfile');
        }
    }
    
    public function changePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adminId = $_SESSION['user_id'];
            $current = $_POST['current_password'];
            $new = $_POST['new_password'];
            $confirm = $_POST['confirm_password'];
    
            $errors = [];
            
            if (empty($current)) {
                $errors[] = 'Current password is required.';
            }
            
            if (empty($new)) {
                
                $errors[] = 'New password is required.';
            } 
            elseif(strlen($new) < 8 || !preg_match('/[A-Z]/', $new) || !preg_match('/[a-z]/', $new) || !preg_match('/[0-9]/', $new)){

                $errors[] = 'Password must be at least 8 characters and contain uppercase, lowercase, and numbers.';
            }
            
            if ($new !== $confirm) {
                $errors[] = 'New password and confirm password do not match.';
            }
            
            $user = $this->userModel->getUserById($adminId);
            if (!$user || !password_verify($current, $user->password)) {
                $errors[] = 'Current password is incorrect.';
            }
            
            if (!empty($errors)) {
                $_SESSION['error_message'] = implode('<br>', $errors);
                redirect('adminProfile');
                return;
            }
            
            $hashedPassword = password_hash($new, PASSWORD_DEFAULT);
            
            $result = $this->userModel->update($adminId, ['password' => $hashedPassword]);
            
            if ($result) {
                $_SESSION['error_message'] = 'Failed to change password.';
            } else {
                $_SESSION['success_message'] = 'Password changed successfully!';
            }
            
            redirect('adminProfile');
        } else {
            redirect('adminProfile');
        }
    }
}
?>