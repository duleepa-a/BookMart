<?php 

class App{

    private $controller = "Home";
    private $method = "index";
  
    private $roleAccess = [
        'admin' => [
            'AdminHome' => ['index'],
            'AdminAdvertisment' => ['index', 'addAdvertisement', 'getAllAds', 'updateAdvertisement', 'deleteAdvertisement'], 
            'AdminProfile' => ['index'],
            'AdminViewallusers' => ['index'],
            'AdminBookstoreRequests' => ['index'],
            'Admin' => ['index','bookstoreView','viewBookStore','approve','reject'],
            'AdminViewallusers' => ['index'],
            'AdminViewbuyer' => ['index'],
            'AdminViewcourier' => ['index'],
            'AdminViewseller' => ['index'],
            'AdminViewshops' => ['index'],
            'AdminBookView' => ['index'],
            'AdminSendmsg' => ['index'],
            'AdminSearchbooks' => ['index'],
            'AdminSearchorders' => ['index'],
            'AdminPendingAddView' => ['index'],
            'AdminViewContactUs' => ['index','delete','update'],
            
        ],
        'bookStore' => [
            'BookStoreController' => ['storePage', 'manageInventory'],
            'BookstoreInventory' => ['index'], 
            'BookstoreOrders' => ['index'],
            'BookstoreAds' => ['index'], 
            'BookstoreReviews' => ['index'],
            'BookstoreProfile' => ['index'],
            'BookstoreAnalytics' => ['index'],
            'Book' => ['addBook','updateBook','deleteBook'],
        ],
        'bookSeller' => [
            'BookSellerHome' => ['index','storePage', 'viewSales'],
            'BookSellerSales' => ['index'], 
            'BookSellerListings' => ['index'], 
            'BookSellerProfile' => ['index'],
            'BookSellerArticles' => ['index'],
            'BookSellerArticleDetail' => ['index'],
        ],
        'buyer' => [
            'BuyerHome' => ['index', 'viewOrders'],
            'BuyerOrders' => ['index', 'trackOrder'],
            'BuyerReview' => ['index', 'trackOrder'],
            'BuyerProfile' => ['index']  
        ],
        'courier' => [
            'CourierHome' => ['index', 'viewOrders'], 
            'CourierProfile' => ['index'],
            'CourierOrders' => ['index'],
            'CourierOrderDetails' => ['index'],
            'CourierEarns' => ['index']
        ]
    ];
    

    private $publicAccess = [
        '_404' => ['index'],
        'BookSellerRegister' => ['index'],
        'BookstoreRegister' => ['index'],
        'BookView' => ['index'],
        'BuyerRegister' => ['index'],
        'BookSellerRegister' => ['index'],
        'CourierRegister' => ['index'],
        'Login' => ['index'],
        'Register' => ['index'],
        'Home' => ['index'],
        'BookList' => ['index'],
        'BookByGenres' => ['index'],
        'Book' => ['index','getNewArrivals','search'],
        'User' => ['login','logout','registerBuyer','registerCourier','registerBookSeller','registerBookStore','checkusername','checkemail'],
        'Loading' => ['index'],
        'ContactUs' => ['index','create'],
        'Articles' => ['index'],
        'ArticleDetail' => ['index'],
        'ArticleCreation' => ['index', 'addArticle'],
        'Notifications' => ['index'],
        'MyArticles' => ['index'],
        'ArticleUpdate' => ['index', 'updateArticle', 'deleteArticle'],
        'Chat' => ['index'],
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