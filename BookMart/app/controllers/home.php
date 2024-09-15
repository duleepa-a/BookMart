<?php

class Home extends Controller{

    public function index($a = '', $b = '' , $c = ''){
        if(isset($_SESSION['user_role'])) {
            $userRole = $_SESSION['user_role'];

            switch($userRole) {
                case 'admin':
                    $this->view('admin/home');
                    break;
                case 'bookstore':
                    $this->view('bookstore/home');
                    break;
                case 'bookseller':
                    $this->view('bookseller/home');
                    break;
                case 'courier':
                    $this->view('courier/home');
                    break;
                case 'bookbuyer':
                    $this->view('bookbuyer/home');
                    break;
                default:
                    $this->view('home'); 
            }
        } else {
            $this->view('home');
        }
    }
    
}
