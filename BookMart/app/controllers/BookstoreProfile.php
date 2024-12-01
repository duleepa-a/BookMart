<?php

class BookstoreProfile extends Controller{

    public function index(){
        $store = new BookStore;
        $data = ['user_id' => $_SESSION['user_id']];
        $s=$store->first($data);

        $storedata = ['store' => $s ];
        
        $this->view('bookstoreProfile',$storedata);
    }

}