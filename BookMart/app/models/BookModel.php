<?php

class BookModel {

    use Model;

    protected $table = 'book';

    protected $allowedColumns = [
        'id',
        'seller_id',
        'title',
        'ISBN',
        'author',
        'genre',
        'publisher',
        'cover_image',
        'price',
        'discount',
        'quantity',
        'book_condition',
        'language',
        'description',
        'created_at'
    ];
}
