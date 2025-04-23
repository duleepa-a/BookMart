<?php

class SAdminAddAdmin extends Controller {
    public function index() {
        $userModel = new UserModel(); // fetch all admins
        $admins = $userModel->findAll(); // Assuming findAll() fetches all admins

        // Pass the admin data to the view
        $data = [
            'user' => $admins
        ];

        // Load the view with data
        $this->view('sadminaddadmin', $data);
    }
    
    
    public function addAdmin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
            $userData = [
                'username' => htmlspecialchars(trim($_POST['user_name'])),
                'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                'password' => htmlspecialchars(trim($_POST['password'])),
                'role' => 'admin',
                'active_status' => isset($_POST['status']) ? (int)$_POST['status'] : 1
            ];

            $userModel = new UserModel();

            // Check if username is already taken
            if ($userModel->isUsernameTaken($userData['username'])) {
                $_SESSION['error'] = "Username is already taken. Please choose another username.";
                $this->index();
                return;
            }

            // Check if email is already taken
            if ($userModel->isEmailTaken($userData['email'])) {
                $_SESSION['error'] = "Email is already registered. Please use another email.";
                $this->index();
                return;
            }

            $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

            if ($userModel->insert($userData)) {
                $_SESSION['success'] = 'Admin successfully added';
            } else {
                $_SESSION['error'] = 'Failed to add admin';
            }

            $this->index();
        } else {
            // If user does not exist, return error
            echo "Error: User ID does not exist in the user table";
        }
    }
    
    public function checkUsername() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newUsername = trim($_POST['username'] ?? '');
            
            if (empty($newUsername)) {
                echo json_encode(['taken' => false, 'message' => 'Username cannot be empty']);
                return;
            }
    
            $userModel = new UserModel();
            
            $isTaken = $userModel->isUsernameTaken($newUsername);
            
            echo json_encode(['taken' => $isTaken]);
        }
    }
    
    public function checkEmail() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email'] ?? '');
            
            if (empty($email)) {
                echo json_encode(['taken' => false, 'message' => 'Email cannot be empty']);
                return;
            }
    
            $userModel = new UserModel();
            
            $isTaken = $userModel->isEmailTaken($email);
            
            echo json_encode(['taken' => $isTaken]);
        }
    }
    
    public function updateAdminStatus() {
        $userId = $_POST['ID'];
        $status = $_POST['active_status'];
    
        $userModel = new UserModel(); // ← Add this line
    
        $result = $userModel->update($userId, ['active_status' => $status]);
    
        if ($result) {
            error_log("Status updated successfully for user $userId to $status");
            echo json_encode(['success' => true]);
        } else {
            error_log("Failed to update status for user $userId");
            echo json_encode(['success' => false, 'message' => 'Failed to update status']);
        }
    }
    

}