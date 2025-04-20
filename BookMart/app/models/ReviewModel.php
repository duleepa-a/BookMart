<?php

class ReviewModel{

    use Model;

    protected $table = 'review';

    protected $allowedColumns = [
        'buyer_id',
        'book_id',
        'order_id',
        'seller_id',
        'rating',
        'likes',
        'comment',
        'reply',
        'seller_rating',
        'review_date',
        'is_read'
    ];

    public function getAverageRating($seller_id) {
        $query = "SELECT AVG(seller_rating) as avg_rating FROM $this->table WHERE seller_id = :seller_id";
        $result = $this->query($query, ['seller_id' => $seller_id]);
        return $result ? round($result[0]->avg_rating, 1) : null;
    }
    
}
