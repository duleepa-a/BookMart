<?php

require 'Book.php';
require 'Articles.php';
require 'AdminHome.php';

class Home extends Controller{
    
    public function index($a = '', $b = '' , $c = ''){
        $bookController = new Book();
        $articleController = new Articles();
        $bookStoreModel =new BookStore();
        $adModel = new AdvModel();
        $order = new Order();
        $Payroll = new Payroll();
        $userModel = new UserModel();

        $newArrivals = $bookController->getNewArrivals();
        $bestSellers = $bookController->getBestSellers();
        $articles= $articleController->getNewArticles();

        $recommendBookstores=[];
        $advertisments=[];

        $advertisments = $adModel->findAll();


        if(isset($_SESSION['user_id']) && ($_SESSION['user_role'] == 'buyer' || $_SESSION['user_role'] == 'bookSeller' )){

            $recommendBookstores=$bookStoreModel->recommendBookstores($_SESSION['user_id']);
        }

        if(isset($_SESSION['user_id']) && ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'superAdmin' )){
            $adminHomeController = new AdminHome();
            $gethome = $adminHomeController->getAdminHomeData($_SESSION['user_id']);
            $adminHomeData['adminHomeData'] = $gethome;
        }
        
        $data = ['newArrivals' => $newArrivals,
                 'bestSellers' => $bestSellers,
                 'articles' => $articles,
                 'recommendBookstores' => $recommendBookstores,
                 'advertisments' => $advertisments
                ];

        if(isset($_SESSION['user_id']) && ($_SESSION['user_role'] == 'courier')){
                $ordersModel = new Order();
                $orders = $ordersModel->where(['order_status' => 'pending']);

                $filteredOrders = array_filter($orders, function($order) {
                    return is_null($order->courier_id);
                });        

               $courierModel = new Courier();
                $courierData = $courierModel->where(['user_id' => $_SESSION['user_id']]);

                if (!empty($courierData)) {
                    $courier = $courierData[0];
                    $courierLocation = $courier->address_line_1 . ', ' . $courier->address_line_2 . ', ' . $courier->city;
                } else {
                    $courierLocation = 'Colombo, Sri Lanka'; 
                } 
                $apiKey = 'AIzaSyCMW0Zg_K7LthAMmLiUjF_XsEaWcQOgqa0'; 
                $orders = $this->calculateAndSortOrdersByDistance($filteredOrders, $courierLocation, $apiKey);
        }  
        
        if(isset($_SESSION['user_id']) && ($_SESSION['user_role'] == 'bookStore')){
                $bookStoreModel = new BookStore();

                $storeData = $bookStoreModel->getHomeData($_SESSION['user_id']);
        }

        if(isset($_SESSION['user_role']) &&  isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'active' ) {
            $userRole = $_SESSION['user_role'];

            switch($userRole) {
                case 'bookStore':
                    $this->view('bookStoreHome',$storeData);
                    break;
                case 'admin':
                    $this->view('adminHome',$adminHomeData);
                    break;
                case 'superAdmin':
                    $this->view('adminHome',$adminHomeData);
                    break;
                case 'bookSeller':
                    $this->view('bookSellerHome',$data);
                    break;
                case 'courier':
                    $this->view('courierHome',['orders'=> $orders]);
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


    private function calculateAndSortOrdersByDistance($orders, $courierLocation, $apiKey) {
        $orderModel = new Order();

        foreach ($orders as &$order) {
            $pickupLocation = $order->pickup_location;
            $distance = $this->getDistanceBetweenLocations($courierLocation, $pickupLocation, $apiKey);
            if($order->estimate_distance != $distance){
                $order->estimate_distance = round($distance / 1000, 2); 
                $orderModel ->update($order->order_id,["estimate_distance" => round($distance / 1000, 2)]);
            }
        }

        usort($orders, function ($a, $b) {
            return $a->estimate_distance <=> $b->estimate_distance;
        });

        return $orders;
        
    }
    

    private function getDistanceBetweenLocations($origin, $destination, $apiKey) {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=" . urlencode($origin) . "&destinations=" . urlencode($destination) . "&key=" . $apiKey;

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if ($data['status'] === 'OK' && $data['rows'][0]['elements'][0]['status'] === 'OK') {
            return $data['rows'][0]['elements'][0]['distance']['value'];
        } else {
            return PHP_INT_MAX;
        }
    }
    
}
