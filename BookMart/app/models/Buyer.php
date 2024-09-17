<?php

class Buyer {

    use Model;

    protected $table = 'buyer';

    protected $allowedColumns = [
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
