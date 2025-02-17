<?php
require 'Book.php';

class BookSellerListings extends Controller{

    public function index(){
        $bookController = new Book();
        $bookstoreId=$_SESSION['user_id'];
        $books = $bookController->getBooksByBookstore($bookstoreId);

        $data = ['inventory' => $books,
                ];
        $this->view('bookSellerListings',$data);
    }

    public function deleteBook(){
        $bookModel = new BookModel();
        $id = $_POST['book_id'];
        
        $bookModel->delete($id);
        redirect('bookSellerListings');
        
    }

}