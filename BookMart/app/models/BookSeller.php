<?php

class BookSeller {

    use Model;

    protected $table = 'bookseller';

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
        'payment_method',
        'rating'
    ];
}
