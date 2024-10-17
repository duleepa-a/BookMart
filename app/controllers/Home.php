<?php

require 'Book.php';

class Home extends Controller{
    
    public function index($a = '', $b = '' , $c = ''){
        $bookController = new Book();
        $newArrivals = $bookController->getNewArrivals();
        $bestSellers = $bookController->getBestSellers();
        $data = ['newArrivals' => $newArrivals,
                 'bestSellers' => $bestSellers
                ];

        if(isset($_SESSION['user_role']) &&  isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'active' ) {
            $userRole = $_SESSION['user_role'];

            switch($userRole) {
                case 'bookStore':
                    $this->view('bookStoreHome');
                    break;
                case 'admin':
                    $this->view('adminHome');
                    break;
                case 'bookSeller':
                    $this->view('bookSellerHome',$data);
                    break;
                case 'courier':
                    $this->view('courierHome');
                    break;
                case 'buyer':
                    $this->view('buyerHome',$data);
                    break;
                default:
                    $this->view('home',$data); 
            }
        } else {
            $this->view('home',$data);
        }
    }
    
}
