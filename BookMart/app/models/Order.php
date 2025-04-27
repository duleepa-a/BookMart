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
            ORDER BY total_sales DESC limit 5 ";

        return $this->query($query,[':seller_id' => $sellerId]);
    }

    public function getMonthlySalesForSeller($seller_id){
        $query = "SELECT 
                    DATE_FORMAT(created_on, '%Y-%m') AS month,
                    SUM(total_amount) AS monthly_sales
                FROM $this->table
                WHERE 
                    seller_id = :seller_id
                    AND created_on >= DATE_SUB(CURDATE(), INTERVAL 5 MONTH)
                GROUP BY month
                ORDER BY month DESC";

        return $this->query($query, ['seller_id' => $seller_id]);
    }

    //ADMIN
    public function searchOrders($keyword, $limit = null, $offset = 0) {
        $query =  "SELECT o.*, b.title, b.publisher, b.price, u.full_name 
                    FROM {$this->table} o
                    LEFT JOIN book b ON o.book_id = b.id
                    LEFT JOIN buyer u ON o.buyer_id = u.user_id
                    WHERE  b.title LIKE :keyword 
                    OR b.publisher LIKE :keyword 
                    OR u.full_name LIKE :keyword";
                    
        if ($limit !== null) {
            $query .= " LIMIT $limit OFFSET $offset";
        }
        
        $data = [':keyword' => '%' . $keyword . '%'];
        return $this->query($query, $data);
    }
    
    public function countSearchResults($keyword) {
        $query = "SELECT COUNT(*) as total 
              FROM {$this->table} o
              LEFT JOIN book b ON o.book_id = b.id
              LEFT JOIN buyer u ON o.buyer_id = u.user_id
              WHERE ";
        
        $data = [':keyword' => '%' . $keyword . '%'];
        $result = $this->query($query, $data);
        return $result[0]->total ?? 0;
    }

    public function findById($orderId) {
        $query = "SELECT o.*, b.title, b.publisher, b.price, u.full_name 
                FROM {$this->table} o
                LEFT JOIN book b ON o.book_id = b.id
                LEFT JOIN buyer u ON o.buyer_id = u.user_id
                WHERE order_id = :id LIMIT 1";

        $data = [':id' => $orderId];

        $result = $this->query($query, $data);
    
        return $result ? $result[0] : null;
    }

    public function getordersByStatus($order_status, $limit = null, $offset = null) {
        $query = "SELECT o.*, b.title, b.publisher, b.price, u.full_name 
                FROM {$this->table} o
                LEFT JOIN book b ON o.book_id = b.id
                LEFT JOIN buyer u ON o.buyer_id = u.user_id
                WHERE o.order_status = :order_status";
        
        $params = [':order_status' => $order_status];
        
        if ($limit !== null) {
            $query .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        }
        
        return $this->query($query, $params);
    }

    public function adminCount($order_status = null) {
        if ($order_status) {
            $query = "SELECT COUNT(*) as total FROM {$this->table} WHERE order_status = :order_status";
            $result = $this->query($query, [':order_status' => $order_status]);
        } else {
            $query = "SELECT COUNT(*) as total FROM {$this->table}";
            $result = $this->query($query);
        }
        return $result[0]->total ?? 0;
    }

    public function findAll($limit = null, $offset = 0) {
        $query = "SELECT o.*, b.title, b.publisher, b.price, u.full_name 
        FROM {$this->table} o
        LEFT JOIN book b ON o.book_id = b.id
        LEFT JOIN buyer u ON o.buyer_id = u.user_id";
        
        if ($limit !== null) {
            $query .= " LIMIT $limit OFFSET $offset";
        }
        
        return $this->query($query);
    }

    public function delete($id) {
        $this->deleteRelatedPayments($id);
        
        // Then delete the order
        $query = "DELETE FROM {$this->table} WHERE {$this->order_column} = :id";
        return $this->query($query, ['id' => $id]);
    }
    

    protected function deleteRelatedPayments($orderId) {
        $query = "DELETE FROM payment_info WHERE order_id = :order_id";
        return $this->query($query, ['order_id' => $orderId]);
    }
}
