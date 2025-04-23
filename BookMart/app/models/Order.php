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


    //ADMIN
    public function searchOrders($keyword, $limit = null, $offset = 0, $sortClause = "", $searchField = "") {
        // Start with basic query
        $query =  "SELECT o.*, b.title, b.publisher, b.price, u.full_name 
                    FROM {$this->table} o
                    LEFT JOIN book b ON o.book_id = b.id
                    LEFT JOIN buyer u ON o.buyer_id = u.user_id
                    WHERE ";
                    
        // If a specific search field is specified, only search in that field
        if (!empty($searchField)) {
            switch($searchField) {
                case 'title':
                    $query .= "b.title LIKE :keyword";
                    break;
                case 'name':
                    $query .= "u.full_name LIKE :keyword";
                    break;
                case 'store':
                    $query .= "b.publisher LIKE :keyword";
                    break;
                case 'status':
                    $query .= "o.order_status LIKE :keyword";
                    break;
                default:
                    $query .= "o.order_id LIKE :keyword";
            }  
        } else {
            // Otherwise use the default search across multiple fields
            $query .= "b.title LIKE :keyword OR u.full_name LIKE :keyword OR b.publisher LIKE :keyword";
        }
        
        // Apply sort clause if provided
        if (!empty($sortClause)) {
            $query .= $sortClause;
        } else {
            $query .= " ORDER BY b.title ASC"; // Default sorting
        }
        
        // Add pagination
        if ($limit !== null) {
            $query .= " LIMIT $limit OFFSET $offset";
        }
        
        $data = [':keyword' => '%' . $keyword . '%'];
        return $this->query($query, $data);
    }
    
    public function countSearchResults($keyword, $searchField = "") {
        $query = "SELECT COUNT(*) as total 
              FROM {$this->table} o
              LEFT JOIN book b ON o.book_id = b.id
              LEFT JOIN buyer u ON o.buyer_id = u.user_id
              WHERE ";
        
        if (!empty($searchField)) {
            switch($searchField) {
                case 'title':
                    $query .= "b.title LIKE :keyword";
                    break;
                case 'name':
                    $query .= "u.full_name LIKE :keyword";
                    break;
                case 'store':
                    $query .= "b.publisher LIKE :keyword";
                    break;
                case 'status':
                    $query .= "o.order_status LIKE :keyword";
                    break;
                default:
                    $query .= "o.order_id LIKE :keyword";
            }
        } else {
            // Otherwise use the default search across multiple fields
            $query .= "b.title LIKE :keyword OR u.full_name LIKE :keyword OR b.publisher LIKE :keyword";
        }
        
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

    public function findAll($limit = null, $offset = 0, $sortClause = "") {
        $query = "SELECT o.*, b.title, b.publisher, b.price, u.full_name 
        FROM {$this->table} o
        LEFT JOIN book b ON o.book_id = b.id
        LEFT JOIN buyer u ON o.buyer_id = u.user_id";
        
        // Apply sort clause if provided
        if (!empty($sortClause)) {
            $query .= $sortClause;
        } else {
            $query .= " ORDER BY b.title ASC"; // Default sorting
        }
        
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

   

    public function delete($id) {
        // First delete related payment records
        $this->deleteRelatedPayments($id);
        
        // Then delete the order
        $query = "DELETE FROM {$this->table} WHERE {$this->order_column} = :id";
        return $this->query($query, ['id' => $id]);
    }
    
    // Add this new method to delete related payment records
    protected function deleteRelatedPayments($orderId) {
        $query = "DELETE FROM payment_info WHERE order_id = :order_id";
        return $this->query($query, ['order_id' => $orderId]);
    }
}
