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

    public function searchBooks($keyword) {
        $query = "SELECT * FROM book WHERE title LIKE :keyword OR author LIKE :keyword";
        $data = [':keyword' => '%' . $keyword . '%'];
    
        return $this->query($query, $data);
    }
}
