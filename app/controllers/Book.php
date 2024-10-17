<?php

class Book extends Controller{

    public function index(){
        $this->view('bookSellerHome');
    }

    public function getNewArrivals() {
        $bookModel = new BookModel();
        return $bookModel->findAll(); 
    }

    public function getBestSellers() {
        $bookModel = new BookModel();
        $bookModel->setLimit(50);
        $books= $bookModel->findAll();

        $groupedBooks = [];

        foreach ($books as $book) {
            $genre = $book->genre;
            if (!isset($groupedBooks[$genre])) {
                $groupedBooks[$genre] = [];
            }
            $groupedBooks[$genre][] = $book;
        }
        
        return $groupedBooks;
    }
}