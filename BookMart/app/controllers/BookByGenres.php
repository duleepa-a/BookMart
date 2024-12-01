<?php

require 'Book.php';

class BookByGenres extends Controller{

    public function index($genre){
        $bookController = new Book();
        $books = $bookController->getBooksByGenre($genre);

        $data = [   'results' => $books,
                    'genre'=>$genre
                ];
        $this->view('bookByGenres',$data);
    }

}
