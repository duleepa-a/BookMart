<?php

class Book extends Controller{

    public function index(){
        $this->view('bookSellerHome');
    }

    public function getNewArrivals() {
        $bookModel = new BookModel();
        return $bookModel->findAll(); 
    }
}