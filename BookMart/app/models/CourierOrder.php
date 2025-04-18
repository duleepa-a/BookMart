<?php

class CourierOrder {
    use Model;

    protected $table = 'courierOrder';

    protected $allowedColumns = [
        'id',
        'order_id',
        'courier_id',
        'buyer_id',
        'status',
        'pickup_location',
        'shipping_address',
        'distance',
        'timeframe'
    ];
}
