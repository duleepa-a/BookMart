<?php

require 'Book.php';
require 'Articles.php';


class Home extends Controller{
    
    public function index($a = '', $b = '' , $c = ''){
        $bookController = new Book();
        $articleController = new Articles();
        $bookStoreModel =new BookStore();
        $adModel = new AdvModel();

        $newArrivals = $bookController->getNewArrivals();
        $bestSellers = $bookController->getBestSellers();
        $articles= $articleController->getNewArticles();

        $recommendBookstores=[];
        $advertisments=[];

        $advertisments = $adModel->findAll();


        if(isset($_SESSION['user_id']) && ($_SESSION['user_role'] == 'buyer' || $_SESSION['user_role'] == 'bookSeller' )){

            $recommendBookstores=$bookStoreModel->recommendBookstores($_SESSION['user_id']);
        }
        
        $data = ['newArrivals' => $newArrivals,
                 'bestSellers' => $bestSellers,
                 'articles' => $articles,
                 'recommendBookstores' => $recommendBookstores,
                 'advertisments' => $advertisments
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
