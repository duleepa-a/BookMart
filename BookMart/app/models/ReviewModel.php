<?php

class ReviewModel{

    use Model;

    protected $table = 'review';

    protected $allowedColumns = [
        'buyer_id',
        'book_id',
        'order_id',
        'rating',
        'likes',
        'comment',
        'seller_rating',
        'review_date',
        'is_read'
    ];

}
