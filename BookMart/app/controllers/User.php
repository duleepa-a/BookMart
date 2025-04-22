<?php

require 'BookstoreController.php';
require 'Buyer.php';
require 'BookSellerController.php';

class User extends Controller {
    
        private $userModel;
    
        public function __construct() {
            $this->userModel = new UserModel; 
        }

        public function login() {

            $error = null;
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];
    
                
                $user = $this->userModel->findUserByUsernameOrEmail($username); 
    
                if ($user && password_verify($password, $user->password)) {
                    
                    
                   
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                
                    $_SESSION['user_id'] = $user->ID;   
                    $_SESSION['username'] = $user->username; 
                    $_SESSION['user_role'] = $user->role;
                    $_SESSION['user_status'] = $user->active_status;

                    if($_SESSION['user_role'] == 'buyer'){
                        $buyerModel = new BuyerModel();
                        $_SESSION['full_name'] = $buyerModel->first(['user_id' => $user->ID])->full_name;
                    }
    
                    if($_SESSION['user_status'] === 'active'){
                        redirect('Home');
                    }
                    else{
                        redirect('unauthorized');
                    }
                    
                    exit();
                } else {
                    $error = "Invalid username or password.";
                }
            }
            
            $this->view('login', ['error' => $error]);
        }

        public function logout() {
            if (!isset($_SESSION['user_id'])) {
                http_response_code(401); 
                echo json_encode(['status' => 'error', 'message' => 'Not logged in']);
                return;
            }
        
            $_SESSION = array();
            session_destroy();
        
            
            http_response_code(200); 
            echo json_encode(['status' => 'success', 'message' => 'Logged out successfully']);
        }
    
        public function registerBuyer() {
            echo("registerBuyer");
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo("registerBuyer post in");
                $userData = [
                    'username' => htmlspecialchars(trim($_POST['username'])),
                    'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                    'password' => htmlspecialchars(trim($_POST['password'])),
                    'role' => 'buyer' 
                ];
        
                $buyerData = [
                    'full_name' => htmlspecialchars(trim($_POST['full-name'])),
                    'gender' => htmlspecialchars(trim($_POST['gender'])),
                    'dob' => htmlspecialchars(trim($_POST['dob'])),
                    'phone_number' => htmlspecialchars(trim($_POST['phone-number'])),
                    'street_address' => htmlspecialchars(trim($_POST['street-address'])),
                    'city' => htmlspecialchars(trim($_POST['city'])),
                    'district' => htmlspecialchars(trim($_POST['district'])),
                    'province' => htmlspecialchars(trim($_POST['province'])),
                    'bank' => htmlspecialchars(trim($_POST['bank'])),
                    'branch_name' => htmlspecialchars(trim($_POST['branch-name'])),
                    'account_number' => htmlspecialchars(trim($_POST['account-number'])),
                    'account_name' => htmlspecialchars(trim($_POST['account-name'])), 
                ];
        
              
                if ($this->userModel->validate($userData)) {
                    echo("validate done");
                    
                    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        
                    if ($this->userModel->registerBuyer($userData, $buyerData)) {
                        echo "Registration successful!";
                        redirect('login');
                    } else {
                        echo "Something went wrong!";
                    }
                } else {
                    echo("validate not done");
                   
                    $this->view('buyerRegister', $userData);
                }
            } else {
                echo("registerBuyer else");
                $this->view('buyerRegister');
            }
        }

        public function registerBookSeller() {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
               
                $userData = [
                    'username' => htmlspecialchars(trim($_POST['username'])),
                    'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                    'password' => htmlspecialchars(trim($_POST['password'])),
                    'role' => 'bookSeller' 
                ];
        
                $buyerData = [
                    'full_name' => htmlspecialchars(trim($_POST['full-name'])),
                    'gender' => htmlspecialchars(trim($_POST['gender'])),
                    'dob' => htmlspecialchars(trim($_POST['dob'])),
                    'phone_number' => htmlspecialchars(trim($_POST['phone-number'])),
                    'street_address' => htmlspecialchars(trim($_POST['street-address'])),
                    'city' => htmlspecialchars(trim($_POST['city'])),
                    'district' => htmlspecialchars(trim($_POST['district'])),
                    'province' => htmlspecialchars(trim($_POST['province'])),
                    'bank' => htmlspecialchars(trim($_POST['bank'])),
                    'branch_name' => htmlspecialchars(trim($_POST['branch-name'])),
                    'account_number' => htmlspecialchars(trim($_POST['account-number'])),
                    'account_name' => htmlspecialchars(trim($_POST['account-name'])),
                ];
        
              
                if ($this->userModel->validate($userData)) {
                    echo("validate done");
                    
                    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        
                  
                    if ($this->userModel->registerBookSeller($userData, $buyerData)) {
                        echo "Registration successful!";
                        redirect('login');
                    } else {
                        echo "Something went wrong!";
                    }
                } else {
                    echo("validate not done");
                   
                    $this->view('bookSellerRegister', $userData);
                }
            } else {
                echo("registerBuyer else");
                $this->view('bookSellerRegister');
            }
        }

        public function registerCourier() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
                $userData = [
                    'username' => htmlspecialchars(trim($_POST['username'])),
                    'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                    'password' => htmlspecialchars(trim($_POST['password'])),
                    'role' => 'courier'
                ];
        
                $courierData = [
                    'first_name' => htmlspecialchars(trim($_POST['firstname'])),
                    'last_name' => htmlspecialchars(trim($_POST['lastname'])),
                    'dob' => htmlspecialchars(trim($_POST['dob'])),
                    'gender' => htmlspecialchars(trim($_POST['gender'])),
                    'nic_number' => htmlspecialchars(trim($_POST['nic'])),
                    'license_number' => htmlspecialchars(trim($_POST['license'])),
                    'address_line_1' => htmlspecialchars(trim($_POST['address'])),
                    'address_line_2' => htmlspecialchars(trim($_POST['address-line-2'])),
                    'city' => htmlspecialchars(trim($_POST['city'])),
                    'phone_number' => htmlspecialchars(trim($_POST['phone-number'])),
                    'secondary_phone_number' => htmlspecialchars(trim($_POST['secondary-number'])),
                    'bank' => htmlspecialchars(trim($_POST['bank'])),
                    'branch_name' => htmlspecialchars(trim($_POST['branch-name'])),
                    'account_number' => htmlspecialchars(trim($_POST['account-number'])),
                    'account_name' => htmlspecialchars(trim($_POST['account-name'])),
                    'vehicle_type' => htmlspecialchars(trim($_POST['vehicle-type'])),
                    'vehicle_model' => htmlspecialchars(trim($_POST['vehicle-model'])),
                    'vehicle_registration_number' => htmlspecialchars(trim($_POST['vehicle-registration-number']))
                ];
        
                $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\uploads\courier_docs';
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
        
                $uploads = [
                    'vehicle-registration-document' => 'vehicle_registration_document',
                    'photo-of-driving-license' => 'photo_of_driving_license',
                    'photo-nic' => 'photo_nic'
                ];
        
                foreach ($uploads as $inputName => $fieldName) {
                    if (isset($_FILES[$inputName]) && $_FILES[$inputName]['error'] === UPLOAD_ERR_OK) {
                        $tmpName = $_FILES[$inputName]['tmp_name'];
                        $originalName = basename($_FILES[$inputName]['name']);
                        $newName = uniqid() . '_' . $originalName;
                        $targetPath = $uploadDir .'\\'.$newName;
        
                        if (move_uploaded_file($tmpName, $targetPath)) {
                            $courierData[$fieldName] = $newName;
                        } else {
                            $courierData[$fieldName] = null;
                            echo "Failed to upload $inputName";
                        }
                    } else {
                        $courierData[$fieldName] = null;
                    }
                }
        
                if ($this->userModel->validate($userData)) {
                    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        
                    if ($this->userModel->registerCourier($userData, $courierData)) {
                        redirect('login');
                    } else {
                        echo "Something went wrong during registration!";
                    }
                } else {
                    $this->view('courierRegister', $userData);
                }
        
            } else {
                $this->view('courierRegister');
            }
        }        

        public function registerBookStore() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $userData = [
                    'username' => htmlspecialchars(trim($_POST['store-name'])),
                    'email' => filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL),
                    'password' => htmlspecialchars(trim($_POST['password'])),
                    'role' => 'bookStore',
                    'active_status' =>'inactive'
                ];
                $storeData = [
                    'store_name' => htmlspecialchars(trim($_POST['store-name'])),
                    'phone_number' => htmlspecialchars(trim($_POST['phone-number'])),
                    'street_address' => htmlspecialchars(trim($_POST['street-address'])),
                    'city' => htmlspecialchars(trim($_POST['city'])),
                    'district' => htmlspecialchars(trim($_POST['district'])),
                    'province' => htmlspecialchars(trim($_POST['province'])),
                    'owner_name' => htmlspecialchars(trim($_POST['owner-name'])),
                    'owner_email' => filter_var(trim($_POST['email-owner']), FILTER_SANITIZE_EMAIL),
                    'owner_phone_number' => htmlspecialchars(trim($_POST['phone-number-owner'])),
                    'owner_nic' => htmlspecialchars(trim($_POST['NIC-owner'])),
                    'manager_name' => htmlspecialchars(trim($_POST['manager-name'])),
                    'manager_email' => filter_var(trim($_POST['email-manager']), FILTER_SANITIZE_EMAIL),
                    'manager_phone_number' => htmlspecialchars(trim($_POST['phone-number-manager'])),
                    'manager_nic' => htmlspecialchars(trim($_POST['NIC-manager'])),
                    'business_reg_no' => htmlspecialchars(trim($_POST['business-reg-NO']))
                ];

                if (isset($_FILES['evidence-docs']) && $_FILES['evidence-docs']['error'] == 0) {
                    $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\uploads\evidence_docs';
                    $fileTmp = $_FILES['evidence-docs']['tmp_name'];
                    $originalName = basename($_FILES['evidence-docs']['name']);
                    $uniqueName = uniqid() . "_" . $originalName;
                    $destination = $uploadDir .'\\' .$uniqueName;
                    
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $allowedExtensions = ['pdf', 'png', 'jpg', 'jpeg'];
                    $allowedMimeTypes = ['application/pdf', 'image/png', 'image/jpeg'];

                    $fileType = mime_content_type($fileTmp);
                    $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

                    if (!in_array($fileExt, $allowedExtensions) || !in_array($fileType, $allowedMimeTypes)) {
                        echo "Invalid file type. Only PDF, PNG, JPG, and JPEG are allowed.";
                        return;
                    }
            
                    if (move_uploaded_file($fileTmp, $destination)) {
                        $storeData['evidence_doc'] = $uniqueName; 
                    } else {
                        echo "Failed to upload file.";
                        return;
                    }
                } else {
                    echo "Evidence document is required.";
                    return;
                }
        
                if ($this->userModel->validate($userData)) {
                   
                    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        
                  
                    if ($this->userModel->registerBookStore($userData, $storeData)) {
                        echo "Bookstore registration successful!";
                        redirect('login'); 
                    } else {
                        echo "Something went wrong during the registration process!";
                    }
                } else {
                    echo("not validated");
                    $this->view('bookstoreRegister', $storeData);
                }
            } else {
                echo("not pOSt");
                $this->view('bookstoreRegister');
            }
        }
        
        public function checkusername() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = htmlspecialchars(trim($_POST['username']));
                $isTaken = $this->userModel->isUsernameTaken($username);    
                header('Content-Type: application/json');
                echo json_encode(['taken' => $isTaken]);
            } 
            else{
                header('HTTP/1.1 405 Method Not Allowed');
                echo json_encode(['error' => 'Method Not Allowed']);
            }
        }
        

        public function checkemail() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get the email from the POST request, sanitize it
                $email = htmlspecialchars(trim($_POST['email']));
        
                // Check if the email is already taken using the userModel
                $isTaken = $this->userModel->isEmailTaken($email);
        
                // Send the JSON response
                header('Content-Type: application/json');
                echo json_encode(['taken' => $isTaken]);
            } else {
                // Return an error for invalid HTTP method
                header('HTTP/1.1 405 Method Not Allowed');
                echo json_encode(['error' => 'Method Not Allowed']);
            }
        }


        public function like(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $review_id = $_POST['id'];
                $user_id = $_SESSION['user_id'];
        
                if (!$user_id) {
                    echo json_encode(['success' => false, 'error' => 'Login required']);
                    return;
                }
    
                $reviewlikeModel = new ReviewLike();
                $reviewModel = new ReviewModel();
                
                $review = $reviewModel->first(['id' => $review_id]); 
                if (!$review) {
                    echo json_encode(['success' => false, 'error' => 'Review not found']);
                    return;
                }                
                $likes = $review->likes;

                // Check if user already liked
                $likeExists = $reviewlikeModel->first(['user_id' => $user_id,'review_id' => $review_id]); 
                
                if ($likeExists) {
                    // Unlike it
                    $reviewlikeModel->delete($likeExists->id);

                    $likes = $likes - 1;
                    if($likes <= 0){
                        $likes = 0;
                    }
                    
                    $reviewModel->update($review->id,['likes' => $likes]);
        
                    echo json_encode(['success' => true, 'likes' => $likes, 'liked' => false]);
                } else {
                    // Like it
                    $reviewlikeModel->insert(['user_id' => $user_id,'review_id' => $review_id]);
        
                    $likes = $likes+1;
        
                    $reviewModel->update($review->id,['likes' => $likes]);
        
                    echo json_encode(['success' => true, 'likes' => $likes, 'liked' => true]);
                }
            }
        }

        public function changePassword(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $currentPassword = $_POST['current-password'] ?? '';
                $newPassword = $_POST['password'] ?? '';
                $confirmPassword = $_POST['confirm-password'] ?? '';

                $bookstore = new BookstoreController();
                $buyer = new Buyer();
                $bookSeller = new BookSellerController();

                $userRole = $_SESSION['user_role'];

                if ($newPassword !== $confirmPassword) {
                    $_SESSION['error'] = "New passwords do not match.";
                    if($userRole =='bookStore'){
                        $bookstore->myProfile();
                    }
                    else if($userRole == 'buyer'){
                        $buyer->myProfile();
                    }
                    else if($userRole == 'bookSeller'){
                        $bookSeller->myProfile();
                    }
                }


                $userId = $_SESSION['user_id'];
                $userModel = new UserModel();

    
                $user = $userModel->first(['ID' => $userId]);

                if ($user && password_verify($currentPassword, $user->password)) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

              
                    $userModel->update($userId,['password'=> $hashedPassword]);

                    $_SESSION['success'] = "Password changed successfully.";
                    if($userRole =='bookStore'){
                        $bookstore->myProfile();
                    }
                    else if($userRole == 'buyer'){
                        $buyer->myProfile();
                    }
                    else if($userRole == 'bookSeller'){
                        $bookSeller->myProfile();
                    }
                    
                } else {
                    $_SESSION['error'] = "Current password is incorrect.";
                    if($userRole =='bookStore'){
                        $bookstore->myProfile();
                    }
                    else if($userRole == 'buyer'){
                        $buyer->myProfile();
                    }
                    else if($userRole == 'bookSeller'){
                        $bookSeller->myProfile();
                    }
                }
            }
        }

        public function toggleFollow($storeId) {
            if (!isset($_SESSION['user_id'])) {
                echo json_encode(['status' => 'unauthorized']);
                return;
            }
        
            $buyerId = $_SESSION['user_id'];
            $followModel = new FollowModel();
            $followRecord= $followModel->first(['buyer_id' => $buyerId, 'bookstore_id' => $storeId]);

            if ($followRecord) {
                $followModel->delete($followRecord->id);
                $this->updateFollowerCount($storeId, -1);
                echo json_encode(['status' => 'unfollowed']);
            } else {
                $followModel->insert(['buyer_id' => $buyerId, 'bookstore_id' => $storeId]);
                $this->updateFollowerCount($storeId, 1);
                echo json_encode(['status' => 'followed']);
            }
        }
        
        private function updateFollowerCount($storeId, $delta) {
            $storeModel = new BookStore();
            $store = $storeModel->first(['user_id' => $storeId]);
        
            if ($store) {
                $newCount = max(0, $store->followers + $delta);
                $storeModel->update($store->id, ['followers' => $newCount]);
            }
        }
        
    }