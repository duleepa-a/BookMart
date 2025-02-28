<?php

class BuyerModel {

    use Model;

    protected $table = 'buyer';

    protected $allowedColumns = [
        'id',
        'user_id',
        'full_name',
        'gender',
        'dob',
        'phone_number',
        'street_address',
        'city',
        'district',
        'province',
        'payment_method'
    ];
}
