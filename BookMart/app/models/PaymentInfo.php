<?php

class PaymentInfo {

    use Model;

    protected $table = 'payment_info';

    protected $allowedColumns = [
        'order_id',
        'ad_id',
        'transaction_id',
        'payment_amount',
        'payment_gateway',
        'payment_date',
        'type'
    ];

    public function __construct() {
        $this->order_column = 'payment_id';
    }
}
