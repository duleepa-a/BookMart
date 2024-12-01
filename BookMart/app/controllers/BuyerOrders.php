<?php

class BuyerOrders extends Controller{

    public function index(){
        $this->view('buyerOrders');
    }

    public function trackOrder(){
        $this->view('buyerTrackOrder');
    }
}
