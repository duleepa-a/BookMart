<?php

class ReviewLike {

    use Model;

    protected $table = 'review_like';

    protected $allowedColumns = [
        'user_id',
        'review_id'
    ];
}
