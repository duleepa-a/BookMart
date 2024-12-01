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

}