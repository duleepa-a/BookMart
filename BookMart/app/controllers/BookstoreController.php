<?php
require 'Book.php';

class BookstoreController extends Controller{

    public function showProfile($seller_id){
        $storeModel = new BookStore();
        $booksellerModel = new BookSeller();
        $book = new Book();
        $advetismentsModel = new StoreAdvModel();
        $userModel = new UserModel();
        $followModel = new FollowModel();
        $is_followed = false;

        $user = $userModel->first(['ID' => $seller_id]);
        $is_store = ($user && $user->role === 'bookStore');

        if($is_store){
            $storeDetails =$storeModel ->first(['user_id' => $seller_id]); 
            $advetisments=$advetismentsModel->where(['store_id' => $seller_id, 'active_status' => 1]);
            
            if (isset($_SESSION['user_id'])) {
                $is_followed = $followModel->first([
                    'buyer_id' => $_SESSION['user_id'],
                    'bookstore_id' => $storeDetails->user_id
                ]) ? true : false;
            }
        }
        else{
            $storeDetails = $booksellerModel->first(['user_id' => $seller_id]);
            $storeDetails->email_address = $userModel->first(['ID' => $seller_id])->email;
            $storeDetails->store_name = $storeDetails->full_name;
            $advetisments =[];
        }
        $booksByStore = $book->getBooksByBookstore($seller_id);


        $data = 
        [
            'storeDetails' => $storeDetails,
            'booksByStore' => $booksByStore,
            'advetisments' => $advetisments,
            'is_store' => $is_store,
            'is_followed' => $is_followed
        ];

        $this->view('bookstoreProfilePage',$data);
    }

    public function getReviews(){
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }
    
        $reviewModel = new ReviewModel();
        $bookModel = new BookModel();
        $userModel = new UserModel();
    
        $books = $bookModel->where(['seller_id' => $_SESSION['user_id']]);
        if($books){
            $bookIds = array_column($books, 'id');
        }

        $reviews = [];
        if (!empty($bookIds)) {
            $placeholders = implode(',', array_fill(0, count($bookIds), '?'));
            $rawReviews = $reviewModel->query("SELECT * FROM review WHERE book_id IN ($placeholders)", $bookIds);
    
            // Step 3: Enrich with book title and buyer name
            foreach ($rawReviews as $review) {
                $book = $bookModel->first(['id' => $review->book_id]);
                $buyer = $userModel->first(['id' => $review->buyer_id]);
    
                $review->book_title = $book->title ?? 'Unknown';
                $review->buyer_name = $buyer->username ?? 'Anonymous';
                $reviews[] = $review;
            }
        }

        $unreadCount = 0;
        foreach ($reviews as $review) {
            if ($review->is_read == 0) {
                $unreadCount++;
            }
        }
    
        $this->view('bookstoreReviews', ['reviews' => $reviews, 'unreadcount' => $unreadCount]);
    }

    public function markAsRead($review_id)
    {
        $reviewModel = new ReviewModel();
        $reviewModel->update($review_id, ['is_read' => 1]);

        
        $this->getReviews();
    }

    public function addReply(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $reviewModel = new ReviewModel();
            
            $reply = $_POST['reply'];
            $reviewid = $_POST['review_id'];
            
            $reviewModel->update($reviewid,['reply' => $reply]);

            $this->getReviews();
        }
    }

    public function Analytics(){
        $this->view('bookstoreAnalytics');
    }

    public function inventory(){
        $bookController = new Book();
        $bookstoreId=$_SESSION['user_id'];
        $books = $bookController->getBooksByBookstore($bookstoreId);

        $data = ['inventory' => $books,
                ];
        $this->view('bookstoreInventory',$data);
    }

    public function advertisments(){

        $advModel = new StoreAdvModel();

        $advetisments = $advModel->where(['store_id' => $_SESSION['user_id']]);

        $this->view('bookstoreAds',['advertisments' => $advetisments]);
    }

    public function orders(){
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
        }

        $orderModel = new Order();
        $userModel = new UserModel();
        $buyerModel= new BuyerModel(); 
        $bookModel = new BookModel();

        $count= $orderModel->getOrderStatusCountsBySeller($_SESSION['user_id']);
        $orders = $orderModel->where(['seller_id' => $_SESSION['user_id']]);

        if($orders){
            foreach ($orders as $order) {
                $user = $userModel->first(['id' => $order->buyer_id]);
                $buyer=$buyerModel->first(['user_id'=>$order->buyer_id]);
                $order->buyer_name = $user->username ?? 'Unknown';
                $order->buyer_contact = $buyer->phone_number ?? 'N/A';
                $order->book = $bookModel->first(['id' => $order->book_id]);  
            }
        }

        $this->view('bookstoreOrders', ['orders' => $orders , 'count' => $count]);
    }

    public function orderView($orderId){

        $orderModel = new Order();
        $buyerModel = new BuyerModel();
        $courierModel = new Courier();
        $bookModel = new  BookModel();

        $order = $orderModel->first(['order_id' => $orderId]);
        $buyer = $buyerModel->first(['user_id' => $order->buyer_id]);
        $courier = $courierModel->first(['user_id' => $order->courier_id]);
        $book = $bookModel->first(['id' => $order->book_id]);

        $data =[
               'order' => $order,
               'book' => $book,
               'buyer' => $buyer,
               'courier' => $courier 
        ];

        $this->view('bookstoreOrderView',$data);        
    }
    
    public function confirmPickup(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents("php://input"), true);

            $orderId = $data['order_id'] ?? null;
            $pickupCode = trim($data['pickup_code'] ?? '');

            if (!$orderId || !$pickupCode) {
                echo json_encode(['success' => false, 'message' => 'Missing order ID or pickup code.']);
                return;
            }

            $orderModel = new Order();
            $courierOrderModel = new CourierOrder();
            $order = $orderModel->first(['order_id' => $orderId]);

            if (!$order) {
                echo json_encode(['success' => false, 'message' => 'Order not found.']);
                return;
            }

            if ($order->pinCode != $pickupCode) {
                echo json_encode(['success' => false, 'message' => 'Incorrect pickup code.']);
                return;
            }

            $courierDetails = $courierOrderModel->first([ 'order_id' => $orderId ,  
                                        'courier_id' => $order->courier_id
                                    ]);
            $courierOrderModel->update($courierDetails->id,['status' => 'Pending']);

            $orderModel->update($orderId, [
                'order_status' => 'shipping',
                'shipped_date' => date('Y-m-d H:i:s')
            ]);

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
        }
    }


    public function myProfile(){
        $storeModel = new BookStore;
        $userModel = new UserModel();
        $data = ['user_id' => $_SESSION['user_id']];
        
        $store=$storeModel->first($data);
        $store->email = $userModel->first(['ID' => $_SESSION['user_id']])->email;

        $storedata = ['store' => $store];
        
        $this->view('bookstoreProfile',$storedata);
    }


    public function requestAdvertisment(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $advModel = new StoreAdvModel();

            $title = htmlspecialchars(trim($_POST['title']));
            $start_date = $_POST['start_date'] ?? null;
            $end_date = $_POST['end_date'] ?? null;
            $image = $_FILES['image'];

            if (empty($title) || empty($image['name'])) {
                echo "Title and image are required.";
                return;
            }

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

            if (!in_array($extension, $allowedExtensions)) {
                echo "Invalid image file type.";
                return;
            }

            $uniqueName = uniqid('adv_', true) . '.' . $extension;
            $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\Images\store_advertisments';
            $uploadPath = $uploadDir . '\\' . $uniqueName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
                echo "Image upload failed.";
                $this->orders();
                return;
            }

            $imagePath = $uniqueName;

            $data = [
                'title' => $title,
                'image_path' => $imagePath,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'store_id' => $_SESSION['user_id'] ?? null, 
            ];

            if ($advModel->insert($data)) {
                $this->advertisments();
            } else {
                echo "Failed to submit advertisement.";
            }
        } else {
            echo "Invalid request method.";
        }
    }

    public function deleteAdvertisment(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adId = $_POST['ad_id'];

            $storeAddModel = new StoreAdvModel();

            $storeAddModel->delete($adId);

            $this->advertisments();
        }
    }

    public function updateStoreDetails(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $storeName = $_POST['store-name'] ?? '';
            $phoneNumber = $_POST['phone-number'] ?? '';
            $streetAddress = $_POST['street-address'] ?? '';
            $city = $_POST['city'] ?? '';
            $district = $_POST['district'] ?? '';
            $province = $_POST['province'] ?? '';

            $errors = [];

            if (empty($storeName)) $errors['store-name'] = "Store name is required.";
            if (!preg_match('/^\d{10}$/', $phoneNumber)) $errors['phone-number'] = "Invalid phone number.";
            if (empty($streetAddress)) $errors['street-address'] = "Street address is required.";
            if (empty($city)) $errors['city'] = "City is required.";
            if (empty($district)) $errors['district'] = "District is required.";
            if (empty($province)) $errors['province'] = "Province is required.";

            if (empty($errors)) {
                $storeModel = new BookStore();

                $userId = $storeModel->first(['user_id' => $_SESSION['user_id']])->id ?? null;

                if ($userId) {
                    $storeModel->update($userId, [
                        'store_name' => $storeName,
                        'phone_number' => $phoneNumber,
                        'street_address' => $streetAddress,
                        'city' => $city,
                        'district' => $district,
                        'province' => $province,
                    ]);

                    $this->myProfile(); 
                } else {
                    $_SESSION['error'] = "You must be logged in to update your store.";
                    redirect('login');
                }
            } else {
                $_SESSION['form_errors'] = $errors;
                $this->myProfile();  
            }
        }
    }

    public function updateOwnerDetails(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ownerName = $_POST['owner-name'] ?? '';
            $ownerEmail = $_POST['email-owner'] ?? '';
            $ownerPhone = $_POST['phone-number-owner'] ?? '';
            $ownerNIC = $_POST['NIC-owner'] ?? '';
            
            $managerName = $_POST['manager-name'] ?? '';
            $managerEmail = $_POST['email-manager'] ?? '';
            $managerPhone = $_POST['phone-number-manager'] ?? '';
            $managerNIC = $_POST['NIC-manager'] ?? '';

            $errors = [];

            if (empty($ownerName)) $errors['owner-name'] = "Owner name is required.";
            if (!filter_var($ownerEmail, FILTER_VALIDATE_EMAIL)) $errors['email-owner'] = "Invalid owner email address.";
            if (!preg_match('/^\d{10}$/', $ownerPhone)) $errors['phone-number-owner'] = "Invalid owner phone number.";
            if (!preg_match('/^\d{9}[vVxX]|\d{12}$/', $ownerNIC)) $errors['NIC-owner'] = "Invalid NIC for owner.";

            if (empty($managerName)) $errors['manager-name'] = "Manager name is required.";
            if (!filter_var($managerEmail, FILTER_VALIDATE_EMAIL)) $errors['email-manager'] = "Invalid manager email address.";
            if (!preg_match('/^\d{10}$/', $managerPhone)) $errors['phone-number-manager'] = "Invalid manager phone number.";
            if (!preg_match('/^\d{9}[vVxX]|\d{12}$/', $managerNIC)) $errors['NIC-manager'] = "Invalid NIC for manager.";

            if (empty($errors)) {
                $storeModel = new BookStore();
                $userId = $storeModel->first(['user_id' => $_SESSION['user_id']])->id ?? null;

                if ($userId) {
                    $storeModel->update($userId, [
                        'owner_name' => $ownerName,
                        'owner_email' => $ownerEmail,
                        'owner_phone_number' => $ownerPhone,
                        'owner_nic' => $ownerNIC,
                        'manager_name' => $managerName,
                        'manager_email' => $managerEmail,
                        'manager_phone_number' => $managerPhone,
                        'manager_nic' => $managerNIC,
                    ]);

                    $this->myProfile(); // Redirect to profile view
                } else {
                    $_SESSION['error'] = "You must be logged in to update owner details.";
                    redirect('login');
                }
            } else {
                $_SESSION['form_errors'] = $errors;
                $this->myProfile(); 
            }
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
                $storeModel = new BookStore();
                $userId = $_SESSION['user_id'] ?? null;

                if ($userId) {
                    $store = $storeModel->first(['user_id' => $userId]);

                    if ($store) {
                        $storeModel->update($store->id, [
                            'bank' => $bank,
                            'branch_name' => $branchName,
                            'account_number' => $accountNumber,
                            'account_name' => $accountName,
                        ]);

                        $this->myProfile(); 
                    } else {
                        $_SESSION['error'] = "Store not found.";
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

            $bookstoreModel = new BookStore();
            $store=$bookstoreModel->first(['user_id' => $_SESSION['user_id']]);

            $bookstoreModel->update($store->id,['profile_picture' => $imagePath]);
            
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

    public function coupons(){

        $coupons = [
            (object)[
                'id' => 1,
                'code' => 'BCSD',
                'discount' => 15.0,
                'start_date' => '2025-04-18 20:46:00',
                'end_date' => '2025-05-18 20:46:00'
            ],
            (object)[
                'id' => 2,
                'code' => 'WELCOME',
                'discount' => 10.0,
                'start_date' => '2025-04-20 00:00:00',
                'end_date' => '2025-06-01 23:59:59'
            ],
            (object)[
                'id' => 3,
                'code' => 'BOOKMART50',
                'discount' => 50.0,
                'start_date' => '2025-04-25 12:00:00',
                'end_date' => '2025-04-30 23:59:59'
            ]
        ];

        $this->view('bookstoreCoupons',['coupons' => $coupons]);
    }

    public function payRolls(){
        $payrollModel = new Payroll();

        $payrolls = $payrollModel->where(['payee_id' => $_SESSION['user_id'] , 
                                           'settlement_status' => 'paid'	
                                        ]);

        $this->view('bookstorePayrolls',[ 'payrolls' => $payrolls ]);
    }

}