<?php
require 'Book.php';

class BookstoreController extends Controller{

    public function showProfile($seller_id){
        $storeModel = new BookStore();
        $booksellerModel = new BookSeller();
        $book = new Book();
        $advetismentsModel = new StoreAdvModel();
        $userModel = new UserModel();

        $user = $userModel->first(['ID' => $seller_id]);
        $is_store = ($user && $user->role === 'bookStore');

        if($is_store){
            $storeDetails =$storeModel ->first(['user_id' => $seller_id]); 
            $advetisments=$advetismentsModel->where(['store_id' => $seller_id, 'active_status' => 1]);
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
            'is_store' => $is_store
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
        $bookIds = array_column($books, 'id');

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

        $count= $orderModel->getOrderStatusCountsBySeller($_SESSION['user_id']);
        $orders = $orderModel->where(['seller_id' => $_SESSION['user_id']]);

        foreach ($orders as $order) {
            $user = $userModel->first(['id' => $order->buyer_id]);
            $buyer=$buyerModel->first(['user_id'=>$order->buyer_id]);
            $order->buyer_name = $user->username ?? 'Unknown';
            $order->buyer_contact = $buyer->phone_number ?? 'N/A'; 
        }

        $this->view('bookstoreOrders', ['orders' => $orders , 'count' => $count]);
    }
    
    public function myProfile(){
        $store = new BookStore;
        $data = ['user_id' => $_SESSION['user_id']];
        $s=$store->first($data);

        $storedata = ['store' => $s ];
        
        $this->view('bookstoreProfile',$storedata);
    }


    public function requestAdvertisment()
{
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

    


}