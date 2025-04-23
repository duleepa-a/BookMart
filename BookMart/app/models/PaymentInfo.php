<?php

class PaymentInfo {

    use Model;

    protected $table = 'payment_info';

    protected $allowedColumns = [
        'order_id',
        'ad_id',
        'transaction_id',
        'payment_amount',
        'payment_gateway',
        'payment_date',
        'type'
    ];

    public function __construct() {
        $this->order_column = 'payment_id';
    }

    public function findAll($limit = null, $offset = 0, $sortClause = "") {
        $query = "SELECT 
                    pi.*,
                    b.title,
                    bu.full_name AS buyer_name,
                    COALESCE(bs.store_name, bsl.full_name) AS seller_name
                  FROM {$this->table} pi
                  LEFT JOIN orders o ON pi.order_id = o.order_id
                  LEFT JOIN book b ON o.book_id = b.id
                  LEFT JOIN buyer bu ON o.buyer_id = bu.user_id
                  LEFT JOIN bookstore bs ON o.seller_id = bs.user_id 
                  LEFT JOIN bookseller bsl ON o.seller_id = bsl.user_id ";
        
        // Add pagination
        if ($limit !== null) {
            $query .= " LIMIT $limit OFFSET $offset";
        }
        
        return $this->query($query);
    }

    public function count() {
        $query = "SELECT COUNT(*) as total FROM {$this->table}";
        $result = $this->query($query);
        return $result[0]->total ?? 0;
    }
}
