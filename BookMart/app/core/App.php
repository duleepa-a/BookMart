<?php 

class App{

    private $controller = "Home";
    private $method = "index";
  
    private $roleAccess = [
        'admin' => [
            'AdminHome' => ['index'],
            'AdminAdvertisment' => ['index', 'addAdvertisement', 'getAllAds', 'updateAdvertisement', 'deleteAdvertisement','handleAdDecision'], 
            'AdminProfile' => ['__construct', 'model', 'index', 'updateUsername', 'changePassword'],
            'AdminViewallusers' => ['index'],
            'AdminBookstoreRequests' => ['index'],
            'Admin' => ['index','bookstoreView','viewBookStore','approve','reject','downloadEvidenceDoc','downloadCourierDoc','viewCourier','payRolls','markAsResolve','addRefund','updateRefundStatus','deleteRefundRequest' ,'downloadRefundEvdience','settleAllPayrolls'],
            'AdminViewbuyer' => ['index', 'updateStatus'],
            'AdminViewcourier' => ['index', 'delete'],
            'AdminViewseller' => ['index'],
            'AdminViewshops' => ['index'],
            'AdminBookView' => ['index', 'list', 'search', 'bookdetails', 'deleteBook'],
            'AdminOrderView' => ['index', 'list', 'search', 'orderdetails', 'deleteOrder'],
            'AdminSendmsg' => ['index', 'send'],
            'AdminSearchbooks' => ['index'],
            'AdminSearchorders' => ['index'],
            'AdminPendingAddView' => ['index'],
            'AdminViewContactUs' => ['index','delete','update'],
            'User' => ['changePassword'],
            'AdminViewCourierComplains' => ['index','delete','update'],
            'AdminPaymentInfo' => ['index'],
        ],

        'superAdmin' => [
            'AdminHome' => ['index'],
            'AdminAdvertisment' => ['index', 'addAdvertisement', 'getAllAds', 'updateAdvertisement', 'deleteAdvertisement','handleAdDecision'], 
            'AdminProfile' => ['__construct', 'model', 'index', 'updateUsername', 'changePassword'],
            'AdminViewallusers' => ['index'],
            'AdminBookstoreRequests' => ['index'],
            'Admin' => ['index','bookstoreView','viewBookStore','approve','reject','downloadEvidenceDoc','downloadCourierDoc','viewCourier','payRolls','markAsResolve','addRefund','updateRefundStatus','deleteRefundRequest' ,'downloadRefundEvdience','settleAllPayrolls'],
            'AdminViewbuyer' => ['index', 'updateStatus'],
            'AdminViewcourier' => ['index', 'delete'],
            'AdminViewseller' => ['index'],
            'AdminViewshops' => ['index'],
            'AdminBookView' => ['index', 'list', 'search', 'bookdetails', 'deleteBook'],
            'AdminOrderView' => ['index', 'list', 'search', 'orderdetails', 'deleteOrder'],
            'AdminSendmsg' => ['index', 'send'],
            'AdminSearchbooks' => ['index'],
            'AdminSearchorders' => ['index'],
            'AdminPendingAddView' => ['index'],
            'AdminViewContactUs' => ['index','delete','update'],
            'User' => ['changePassword'],
            'AdminViewCourierComplains' => ['index','delete','update'],
            'AdminPaymentInfo' => ['index'],
            'AdminSystemStat' => ['index', 'getAll', 'updateStat'],
            'SAdminAddAdmin' => ['index', 'addAdmin', 'checkUsername', 'checkEmail', 'updateAdminStatus'],
        ],

        'bookStore' => [
            'BookstoreController' => ['getReviews', 'Analytics','inventory','advertisments','orders','orderView','confirmPickup','myProfile','markAsRead','addReply','requestAdvertisment','updateStoreDetails','updateOwnerDetails','uploadProfilePicture','deleteAdvertisment','updateBankDetails' ,'coupons','payRolls', 'addCoupon', 'updateCoupon', 'deleteCoupon'],
            'Book' => ['addBook','updateBook','deleteBook'],
            'User' => ['like','changePassword'],
            'Payment' => ['payAd','adSuccess','adCancel'],
            'Notifications' => ['index','deleteNotification','markAsRead'],
        ],
        'bookSeller' => [
            'BookSellerHome' => ['index','storePage', 'viewSales'],
            'BookSellerController' => ['index', 'listings', 'addBook', 'updateBook', 'deleteBook', 'orders','trackOrder','register','reviews','addReview','submitReview','myProfile','updateLoginDetails','updatePersonalDetails', 'updateBankDetails', 'uploadProfilePicture'],
            'Articles' => ['index', 'create', 'addArticle', 'detail', 'update', 'updateArticle', 'deleteArticle'],
            'Auctions' => ['index', 'details', 'createAuction', 'updateBid', 'buyNow', 'completeAuction', 'cancelAuction', 'withdraw'],
            'Buyer' => ['refundRequest','addRefundRequest','deleteReview'],
            'User' => ['like','changePassword','toggleFollow','updateFollowerCount'],
            'Payment' => ['index','checkOut','process','success','cancel','cartView'],
            'Notifications' => ['index','deleteNotification','markAsRead'],
        ],
        'buyer' => [
            'BuyerHome' => ['index', 'viewOrders'],
            'Articles' => ['index', 'create', 'addArticle', 'detail', 'update', 'updateArticle', 'deleteArticle'],
            'Auctions' => ['index', 'details', 'createAuction', 'updateBid', 'buyNow', 'completeAuction', 'cancelAuction', 'withdraw'],
            'Buyer' => ['index', 'orders','trackOrder','register','reviews','addReview','submitReview','myProfile','updateLoginDetails','updatePersonalDetails','refundRequest','addRefundRequest','deleteReview'],
            'User' => ['like','changePassword','toggleFollow','updateFollowerCount'],
            'Payment' => ['index','checkOut','process','success','cancel','cartView','addToCart','cartCheckout','cartSuccess','increase','decrease','deleteSelected','clear','removeBook','deleteSelected'],
            'Notifications' => ['index','deleteNotification','markAsRead'],
        ],
        'courier' => [
            'CourierProfile' => ['index','updatePersonalDetails','updateBankDetails','updateVehicalDetails'],
            'CourierOrderDetails' => ['index','create','update','delete','OrderPage'],
            'CourierEarns' => ['index'],
            'CourierComplains' => ['index','create'],
            'Map' =>['index'],
            'BookstoreController' => ['payRolls'],
            'Notifications' => ['index','deleteNotification','markAsRead'],
        ]
    ];
    

    private $publicAccess = [
        '_404' => ['index'],
        'BookSellerRegister' => ['index'],
        'BookstoreRegister' => ['index'],
        'BookstoreController' => ['showProfile'],
        'BookView' => ['index'],
        'Buyer' => ['register'],
        'CourierRegister' => ['index'],
        'Login' => ['index'],
        'Register' => ['index'],
        'Home' => ['index'],
        'BookList' => ['index'],
        'BookByGenres' => ['index'],
        'Payment' => ['checkOut'],
        'Book' => ['index','getNewArrivals','search'],
        'User' => ['login','logout','registerBuyer','registerCourier','registerBookSeller','registerBookStore','checkusername','checkemail','termsConditions'],
        'Loading' => ['index'],
        'ContactUs' => ['index','create'],
        'Articles' => ['index', 'create', 'addArticle', 'detail', 'update', 'updateArticle', 'deleteArticle', 'myArticles'],
        'Notifications' => ['index'],
        'ArticleUpdate' => ['index', 'updateArticle', 'deleteArticle'],
        'Chat' => ['index','chatbox','fetchMessages','send'],
    ];

    private function splitURL() {
        $URL = $_GET['url'] ?? 'Home';
        $URL = explode("/", trim($URL, "/"));
        return $URL;
    }

    private function checkAccess($controller, $method) {
       
        if (isset($_SESSION['user_role']) &&  isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'active' ) {
            $role = $_SESSION['user_role'];
            
            return isset($this->roleAccess[$role][$controller]) &&
                   in_array($method, $this->roleAccess[$role][$controller]);
        }
        return false; 
    }

    private function isPublic($controller, $method) {
        return isset($this->publicAccess[$controller]) && in_array($method, $this->publicAccess[$controller]);
    }

    public function loadController() {
        $URL = $this->splitURL();
    
        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";
        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]); // Controller class naming convention
            unset($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }
        $controller = new $this->controller;
    
        if (!empty($URL[1])) {
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                unset($URL[1]);
            }
        }
    
        // Check if the controller and method are public
        if ($this->isPublic($this->controller, $this->method) || $this->checkAccess($this->controller, $this->method)) {
            call_user_func_array([$controller, $this->method], $URL);
        } else {
            // Redirect to unauthorized access page or show an error
            redirect('unauthorized');
            exit();
        }
    }
    
}

?>