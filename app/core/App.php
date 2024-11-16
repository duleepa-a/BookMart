<?php 

class App{

    private $controller = "Home";
    private $method = "index";
  
    private $roleAccess = [
        'admin' => [
            'AdminAdvertisment' => ['index', 'manageUsers', 'viewReports'], 
            'AdminProfile' => ['index'],
            'AdminBookstoreRequests' => ['index'],
            'Admin' => ['index','bookstoreView','viewBookStore','approve','reject']
            
        ],
        'bookStore' => [
            'BookStoreController' => ['storePage', 'manageInventory'],
            'AdminProfile' => ['index'], 
            'BookStoreController' => ['index']
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
            'BuyerHome' => ['index', 'viewOrders'] 
        ],
        'courier' => [
            'CourierHome' => ['index', 'viewOrders'] 
        ]
    ];
    

    private $publicAccess = [
        '-404' => ['index'],
        'BookSellerRegister' => ['index'],
        'BookstoreRegister' => ['index'],
        'BookView' => ['index'],
        'BuyerRegister' => ['index'],
        'BookSellerRegister' => ['index'],
        'CourierRegister' => ['index'],
        'Login' => ['index'],
        'Register' => ['index'],
        'Home' => ['index'],
        'Book' => ['index'],['getNewArrivals'],
        'User' => ['login','logout','registerBuyer','registerCourier','registerBookSeller','registerBookStore'],

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
            header("Location: /unauthorized");
            exit();
        }
    }
    
}

?>