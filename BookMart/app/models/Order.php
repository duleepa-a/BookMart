<?php

class Order {

    use Model;

    protected $table = 'orders';

    protected $allowedColumns = [
        'order_id',
        'buyer_id',
        'book_id',
        'order_status',
        'payment_status',
        'payment_method',
        'quanitity',
        'delivery_fee',
        'discount_applied',
        'total_amount',
        'shipping_address',
        'province',
        'district',
        'city',
        'order_date',
        'shipped_date',
        'canceled_date'

    ];

    public function __construct() {
        $this->order_column = 'order_id';
    }

}
