<?php

class FollowModel {

    use Model;

    protected $table = 'follows';

    protected $allowedColumns = [
        'buyer_id',
        'bookstore_id'
    ];
}
