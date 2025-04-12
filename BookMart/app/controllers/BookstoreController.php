<?php
require 'Book.php';

class BookstoreController extends Controller{

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
        $this->view('bookstoreAds');
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


}