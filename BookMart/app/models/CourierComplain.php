<?php

class CourierComplain {
    use Model;

    protected $table = 'courierComplains';

    protected $allowedColumns = [
        'id',
        'order_id',
        'complain',
        'status'
    ];
}
