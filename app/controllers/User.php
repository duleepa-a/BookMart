<?php

class User extends Controller {
    
        private $userModel;
    
        public function __construct() {
            $this->userModel = new UserModel; 
        }

        public function login() {
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
    
                    if($_SESSION['user_status'] === 'active'){
                        redirect('Home');
                    }
                    else{
                        redirect('unauthorized');
                    }
                    
                    exit();
                } else {
                   
                    echo "Invalid username or password.";
                    redirect('unauthorized');
                }
            }
            
            $this->view('user/login'); 
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
                    'payment_method' => htmlspecialchars(trim($_POST['payment-method'])) 
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
                    'payment_method' => htmlspecialchars(trim($_POST['payment-method'])) // optional
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
            echo("registerCourier");
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo("registerCourier post in");
        
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
                    'vehicle_type' => htmlspecialchars(trim($_POST['vehical-type'])),
                    'vehicle_model' => htmlspecialchars(trim($_POST['vehical-model'])),
                    'vehicle_registration_number' => htmlspecialchars(trim($_POST['vehical-registration-number'])),
                ];
        
            
                if ($this->userModel->validate($userData)) {
                    echo("validate done");
            
                    $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);
        
                    if ($this->userModel->registerCourier($userData, $courierData)) {
                        echo "Registration successful!";
                        redirect('login');
                    } else {
                        echo "Something went wrong!";
                    }
                } else {
                    echo("validate not done");
                    $this->view('courierRegister', $userData);
                }
            } else {
                echo("registerCourier else");
                $this->view('courierRegister');
            }
        }

        public function registerBookStore() {
            echo("registerBoookStore");
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
        
    }