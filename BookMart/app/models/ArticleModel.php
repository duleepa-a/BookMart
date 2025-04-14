<?php

class ArticleModel {

    use Model;

    protected $table = 'article';

    protected $allowedColumns = [
        'id',
        'seller_id',
        'title',
        'author',
        'content',
        'created_at'
    ];

    public function __construct() {
        $this->order_column = 'ID';
    }

}