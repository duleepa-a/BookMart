<?php

class BookSellerProfile extends Controller{

    public function index(){
        $seller = new BookSeller;
        $data = ['user_id' => $_SESSION['user_id']];
        $s=$seller->first($data);

        $sellerdata = ['seller' => $s ];
        
        $this->view('bookSellerProfile',$sellerdata);
    }

}
