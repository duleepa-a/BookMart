<?php

class BookSellerController extends Controller{

    public function index(){
        $this->view('bookSellerHome');
    }

    public function orders() {
        $buyerModel = new BookSeller();
        $buyerId = $buyerModel->first(['user_id' => $_SESSION['user_id']])->id;
    
        $orderModel = new Order();
        $orderModel->setLimit(50);
        $orders = $orderModel->where(['buyer_id' => $_SESSION['user_id']]);
    
        $bookModel = new BookModel(); 
        $userModel = new UserModel();     
        $groupedOrders = [];
    
        foreach ($orders as $order) {
            $status = $order->order_status;
    
            // Fetch book details
            $book = $bookModel->first(['id' => $order->book_id]);
            
            if ($book) {
                $order->book_title = $book->title;
                $order->book_author = $book->author;
                $order->cover_image = $book->cover_image;
                $order->seller_id = $book->seller_id;
    
                // Fetch seller's username
                $seller = $userModel->first(['id' => $book->seller_id]);
                $order->seller_username = $seller ? $seller->username : "Unknown Seller";
            } else {
                $order->book_title = "Unknown Book";
                $order->seller_id = null;
                $order->seller_username = "Unknown Seller";
            }
    
            // Group orders by status
            if (!isset($groupedOrders[$status])) {
                $groupedOrders[$status] = [];
            }
            $groupedOrders[$status][] = $order;
        }
        foreach ($orders as $order) {
            $status = 'all';
    
            // Fetch book details
            $book = $bookModel->first(['id' => $order->book_id]);
            
            if ($book) {
                $order->book_title = $book->title;
                $order->book_author = $book->author;
                $order->cover_image = $book->cover_image;
                $order->seller_id = $book->seller_id;
    
                // Fetch seller's username
                $seller = $userModel->first(['id' => $book->seller_id]);
                $order->seller_username = $seller ? $seller->username : "Unknown Seller";
            } else {
                $order->book_title = "Unknown Book";
                $order->seller_id = null;
                $order->seller_username = "Unknown Seller";
            }
    
            // Group orders by status
            if (!isset($groupedOrders[$status])) {
                $groupedOrders[$status] = [];
            }
            $groupedOrders[$status][] = $order;
        }
    
        $this->view('buyerOrders', ['groupedOrders' => $groupedOrders]);
    }
    

    public function trackOrder($orderId){
        $orderModel = new Order();
        $courierModel = new Courier();
        $userModel =  new UserModel();

        $order = $orderModel->first(['order_id' => $orderId]);
        $courier = "";
        $order->seller_username = $userModel->first(['ID' => $order->seller_id])->username;

        if($order->courier_id){
            $courier = $courierModel->first(['user_id' => $order->courier_id]);
        }

        $this->view('buyerTrackOrder',[ 'order' => $order,
                                        'courier' => $courier
                                      ]);
    }

    public function myProfile(){
        $bookSellerModel = new BookSeller();
        $userModel = new UserModel();
        $data = ['user_id' => $_SESSION['user_id']];
        
        $bookSeller=$bookSellerModel->first($data);
        $user = $userModel->first(['ID' => $_SESSION['user_id']]);
        $bookSeller->email = $user->email;
        $bookSeller->username = $user->username;

        $bookSellerData = ['bookSeller' => $bookSeller];
        $this->view('bookSellerProfile',$bookSellerData);
    }

    public function register(){
        $this->view('bookSellerRegister');
    }

    public function addReview(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $order_id = $_POST['order_id'];
            $seller_name = $_POST['seller_username'];
            $book_id = $_POST['book_id'];
            $buyer_id = $_SESSION['user_id'];

            $bookModel = new BookModel();
            $orderModel = new Order();
            

            $book= $bookModel->first(['id' => $book_id]);
            $order=$orderModel->first(['order_id' => $order_id]);
            
            $data = [
                'buyer_id' => $buyer_id,
                'book' => $book,
                'order' => $order,
                'book_id' => $book_id,
                'order_id' => $order_id,
                'seller_username' => $seller_name
            ];

        }
        $this->view('bookReviewAdd',$data);
    }

    public function submitReview(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $data = [
                'order_id' => htmlspecialchars($_POST['order_id']),
                'book_id' => htmlspecialchars($_POST['book_id']),
                'comment' => htmlspecialchars($_POST['review_text']),
                'rating' => isset($_POST['rating']) ? htmlspecialchars($_POST['rating']) : null,
                'seller_rating' => isset($_POST['seller_rating']) ? htmlspecialchars($_POST['seller_rating']) : null,
                'buyer_id' => htmlspecialchars($_POST['buyer_id']),
                'seller_id' => htmlspecialchars($_POST['seller_id'])
            ];

            $reviewModel = new ReviewModel();
            $orderModel = new Order();
            $sellerModel = new BookStore();
            $userModel = new UserModel();
            
            if($userModel->first(['ID' => $_POST['seller_id'] ])->role == 'bookSeller'){
                $sellerModel = new BookSeller();
            }

            $seller=$sellerModel->first(['user_id' => $_POST['seller_id']]);

            $reviewModel->insert($data);

            $rating= $reviewModel->getAverageRating($seller->user_id);
            
            $sellerModel->update($seller->id,['rating' => $rating]);
            $orderModel->update($_POST['order_id'],['order_status' => 'reviewed']);

            $this->reviews();
        }
    }   

    public function reviews() {
        $buyerModel = new BookSeller();
        $buyerId = $_SESSION['user_id'];
    
        $orderModel = new Order();
        $orderModel->setLimit(50);
        $completedOrders = $orderModel->where([
            'buyer_id' => $buyerId,
            'order_status' => 'completed'
        ]);

        $reviewedOrders = $orderModel->where([
            'buyer_id' => $buyerId,
            'order_status' => 'reviewed'
        ]);

        if (!is_array($reviewedOrders)) {
            $reviewedOrders = [];
        }

        if (!is_array($completedOrders)) {
            $completedOrders = [];
        }
    
        $reviewModel = new ReviewModel();
        $userModel = new UserModel();
        $bookModel = new BookModel();
    
        $unreviewedOrders = [];
    
        foreach ($completedOrders as $order) {
            $review = $reviewModel->first([
                'buyer_id' =>  $_SESSION['user_id'],
                'order_id' => $order->order_id
            ]);
    
            if (!$review) {
                $book = $bookModel->first(['id' => $order->book_id]);
            
                if ($book) {
                    $order->book_title = $book->title;
                    $order->book_author = $book->author;
                    $order->cover_image = $book->cover_image;
                    $order->seller_id = $book->seller_id;
                    $order->condition = $book->book_condition;
        
                    $seller = $userModel->first(['id' => $book->seller_id]);
                    $order->seller_username = $seller ? $seller->username : "Unknown Seller";
                } else {
                    $order->book_title = "Unknown Book";
                    $order->seller_id = null;
                    $order->seller_username = "Unknown Seller";
                }
                $unreviewedOrders[] = $order;
            }
        }

        $history = [];

        foreach ($reviewedOrders as $order) {
            $review = $reviewModel->first([
                'buyer_id' =>  $_SESSION['user_id'],
                'order_id' => $order->order_id
            ]);
    
            if ($review) {
                $book = $bookModel->first(['id' => $order->book_id]);
                $order->review = $review;
                if ($book) {
                    $order->book_title = $book->title;
                    $order->book_author = $book->author;
                    $order->cover_image = $book->cover_image;
                    $order->seller_id = $book->seller_id;
                    $order->condition = $book->book_condition;
                    $seller = $userModel->first(['id' => $book->seller_id]);
                    $order->seller_username = $seller ? $seller->username : "Unknown Seller";
                } else {
                    $order->book_title = "Unknown Book";
                    $order->seller_id = null;
                    $order->seller_username = "Unknown Seller";
                }
                $history[] = $order;
            }
        }
    
        $this->view('buyerReview', ['orders' => $unreviewedOrders ,'history' => $history]);
    }
    
    public function updatePersonalDetails() {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
            return;
        }
    
        $bookSellerModel = new BookSeller();
        $userId = $bookSellerModel->first(['user_id' => $_SESSION['user_id']])->id;
    
        $data = [
            'full_name' => trim($_POST['full-name'] ?? ''),
            'gender' => $_POST['gender'] ?? null,
            'dob' => $_POST['dob'] ?? null,
            'phone_number' => trim($_POST['phone-number'] ?? ''),
            'street_address' => trim($_POST['street-address'] ?? ''),
            'city' => $_POST['city'] ?? null,
            'district' => $_POST['district'] ?? null,
            'province' => $_POST['province'] ?? null,
        ];
    
    
        $bookSellerModel->update($userId, $data);
    
        $_SESSION['success'] = "Your personal details have been updated successfully!";

        $this->myProfile();
    }

    public function uploadProfilePicture(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
            $image = $_FILES['profile_picture'];

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

            if (!in_array($extension, $allowedExtensions)) {
                echo "Invalid image file type.";
                $_SESSION['error'] ='Invalid image file type.';
                return;
            }

            $uniqueName = uniqid('adv_', true) . '.' . $extension;
            $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\Images\bookstore-profile-pics';
            $uploadPath = $uploadDir . '\\' . $uniqueName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
                $_SESSION['error'] ='File upload failed';
                echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
            }

            $imagePath = $uniqueName;
            $targetPath = '\assets\Images\bookstore-profile-pics'. '\\' . $imagePath;

            $bookSellerModel = new BookSeller();
            $seller=$bookSellerModel->first(['user_id' => $_SESSION['user_id']]);

            $bookSellerModel->update($seller->id,['profile_picture' => $imagePath]);
            
            $_SESSION['success'] ='profile picture uploaded successfully';
            echo json_encode([
                'status' => 'success',
                'imageUrl' => ROOT  . $targetPath
            ]);
           
        } else {
            $_SESSION['error'] ='Invalid request';
            echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
        }
    }

    public function updateBankDetails(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bank = $_POST['bank'] ?? '';
            $branchName = $_POST['branch-name'] ?? '';
            $accountNumber = $_POST['account-number'] ?? '';
            $accountName = $_POST['account-name'] ?? '';

            $errors = [];

            if (empty($bank)) $errors['bank'] = "Bank is required.";
            if (empty($branchName)) $errors['branch-name'] = "Branch name is required.";
            if (!preg_match('/^\d{6,20}$/', $accountNumber)) $errors['account-number'] = "Invalid account number.";
            if (empty($accountName)) $errors['account-name'] = "Account holder name is required.";

            if (empty($errors)) {
                $sellerModel = new BookSeller();
                $userId = $_SESSION['user_id'] ?? null;

                if ($userId) {
                    $seller = $sellerModel->first(['user_id' => $userId]);

                    if ($seller) {
                        $sellerModel->update($seller->id, [
                            'bank' => $bank,
                            'branch_name' => $branchName,
                            'account_number' => $accountNumber,
                            'account_name' => $accountName,
                        ]);

                        $this->myProfile(); 
                    } else {
                        $_SESSION['error'] = "Seller not found.";
                        redirect('login');
                    }
                } else {
                    $_SESSION['error'] = "You must be logged in.";
                    redirect('login');
                }
            } else {
                $_SESSION['form_errors'] = $errors;
                $this->myProfile(); 
            }
        }
    }

    public function updateLoginDetails() {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
            return;
        }
    
        $userId = $_SESSION['user_id'];
        $newUsername = trim($_POST['username'] ?? '');
    
        if (empty($newUsername)) {
            $_SESSION['error'] = "Username cannot be empty.";
            $this->myProfile();
            return;
        }

        $userModel = new UserModel();
      
    
        if ($userModel->isUsernameTaken($newUsername)) {
            $_SESSION['error'] = "This username is already taken.";
            $this->myProfile();
            return;
        }
    
        $userModel->update($userId, ['username' => $newUsername]);
    
        $_SESSION['success'] = "Username updated successfully!";
        $this->myProfile();
    }
    

}
