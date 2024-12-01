<?php
require 'Book.php';

class BookstoreInventory extends Controller{

    public function index(){
        $bookController = new Book();
        $bookstoreId=$_SESSION['user_id'];
        $books = $bookController->getBooksByBookstore($bookstoreId);

        $data = ['inventory' => $books,
                ];
        $this->view('bookstoreInventory',$data);
    }

}
