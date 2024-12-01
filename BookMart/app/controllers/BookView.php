<?php

class BookView extends Controller{

    public function index($id = 'hello'){
        $bookm = new BookModel();
        $book = $bookm->first(['id' => $id]);
        $rec = $bookm->findAll();

        $sellerm = new UserModel;

        $seller= $sellerm->first(['id' => $book->seller_id]);
        $data = 
        [
            'book' => $book,
            'seller' => $seller,
            'recommended'=>$rec,
                
        ]; 
        
        $this->view('bookView',$data);
    }

}
