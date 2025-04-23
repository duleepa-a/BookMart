<?php

class Order {

    use Model;

    protected $table = 'orders';

    protected $allowedColumns = [
        'order_id',
        'buyer_id',
        'book_id',
        'seller_id',
        'order_status',
        'payment_status',
        'payment_method',
        'quanitity',
        'delivery_fee',
        'discount_applied',
        'total_amount',
        'pickup_location',
        'shipping_address',
        'province',
        'district',
        'city',
        'created_on',
        'order_date',
        'pinCode',
        'shipped_date',
        'completed_date',
        'canceled_date',
        'estimate_distance',
        'courier_id'

    ];

    public function __construct() {
        $this->order_column = 'order_id';
    }

    public function getOrderStatusCountsBySeller($sellerId){

        $query = "
            SELECT
                CASE
                    WHEN order_status IN ('completed', 'reviewed') THEN 'completed'
                    ELSE order_status
                END AS status_group,
                COUNT(*) AS count
            FROM orders
            WHERE seller_id = :seller_id
            GROUP BY status_group
        ";

        $result = $this->query($query, ['seller_id' => $sellerId]);

        $counts = [
            'pending' => 0,
            'shipping' => 0,
            'canceled' => 0,
            'completed' => 0,
        ];

        if($result){
            foreach ($result as $row) {
                $counts[$row->status_group] = $row->count;
            }
        }
        return $counts;
    }

    public function getSalesByGenre($sellerId) {
        $query = "SELECT LOWER(b.genre) AS genre, COUNT(*) AS total_orders
            FROM orders o
            JOIN book b ON o.book_id = b.id
            WHERE o.seller_id = :seller_id
            GROUP BY LOWER(b.genre)";
    
        $results = $this->query($query, ['seller_id' => $sellerId]);
    
        $salesByGenre = [];
        if ($results) {
            foreach ($results as $row) {
                $salesByGenre[ucfirst($row->genre)] = $row->total_orders;
            }
        }
    
        return $salesByGenre;
    }
    
    public function getTopSellingBooks($sellerId) {
        $query = "SELECT 
                b.title, 
                b.author, 
                SUM(o.quanitity) AS total_sales
            FROM orders o
            JOIN book b ON o.book_id = b.id
            WHERE o.seller_id = :seller_id
            GROUP BY o.book_id
            ORDER BY total_sales DESC ";

        $this->query($query,[':seller_id' => $sellerId]);
    }

}
