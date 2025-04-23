<?php

class BookStore {

    use Model;

    protected $table = 'bookstore';

    protected $allowedColumns = [
        'user_id',
        'store_name',
        'phone_number',
        'street_address',
        'city',
        'district',
        'province',
        'owner_name',
        'owner_email',
        'owner_phone_number',
        'owner_nic',
        'manager_name',
        'manager_email',
        'manager_phone_number',
        'manager_nic',
        'business_reg_no',
        'bank',
        'branch_name',
        'account_number',
        'account_name',
        'status',
        'followers',
        'rating',
        'profile_picture',
        'evidence_doc'
    ];

    public function findById($id){
        $query = "SELECT * FROM bookstore WHERE id = :id";
        return $this->getRow($query, ['id' => $id]);
    }

    public function recommendBookstores($userId){
        $sql = "SELECT bs.id, bs.store_name, bs.followers,bs.profile_picture,bs.user_id
                FROM bookstore bs
                WHERE bs.user_id NOT IN (
                    SELECT f.bookstore_id FROM follows f WHERE f.buyer_id = :userId
                ) AND bs.status = 'approved'
                ORDER BY bs.followers DESC
                LIMIT 5";
        return $this->query($sql, [':userId' => $userId]);
    }

    public function bookSalesByGenres($storeId,$genre){
        $query = "SELECT COUNT(*) AS total_orders FROM orders o JOIN book b ON o.book_id = b.id WHERE o.seller_id = :seller_id
                   AND LOWER(b.genre) = LOWER(:genre)";

        return $this->query($query,[':seller_id' => $storeId , ':genre' => $genre]);

    }

    public function inventoryCountByGenres($storeId,$genre){
        $query = "SELECT COUNT(*) AS total_books FROM  book b WHERE b.seller_id = :seller_id
                   AND LOWER(b.genre) = LOWER(:genre)";

        return $this->query($query,[':seller_id' => $storeId , ':genre' => $genre]);

    }
    
    public function getHomeData($user_id){
        $store = $this->first(['user_id' =>  $user_id]);   
        
        $lowStockSql = "SELECT * FROM book WHERE seller_id =:user_id AND quantity <= 20 AND status = 'available' ORDER BY quantity ASC;";
        $lowStockbooks = $this->query($lowStockSql,[':user_id' => $user_id]);

        $summarySql = "
                            SELECT
                                (SELECT SUM(net_amount) FROM payroll WHERE payee_id = :id) AS revenue,
                                (SELECT COUNT(*) FROM book WHERE seller_id = :id) AS inventory_count,
                                (SELECT COUNT(*) FROM follows WHERE bookstore_id = :id) AS followers_count,
                                (SELECT COUNT(*) FROM review WHERE seller_id = :id) AS reviews_count,
                                (SELECT COUNT(*) FROM orders WHERE seller_id = :id) AS orders_count;
                        ";
        $summary = $this->query($summarySql, [':id' =>$user_id]);

        $genres = ['romance', 'fiction', 'horror', 'education', 'History'];

        $genreSales = [];

        foreach ($genres as $genre) {
            $result = $this->bookSalesByGenres($user_id, $genre);
            $genreSales[$genre] = $result[0]->total_orders ?? 0;
        }
        
        if(!$store->rating){
            $query = "SELECT AVG(seller_rating) as avg_rating FROM review WHERE seller_id = :id";
            $summary[0]->rating = $this->query($query,[ ':id' => $user_id])[0]->avg_rating;
        }
        else{
            $summary[0]->rating = $store->rating;
        }

        $genres = ['romance', 'fiction', 'horror', 'education', 'history','novel' , 'sci-fi'];

        $genreCount = [];

        foreach ($genres as $genre) {
            $result = $this->inventoryCountByGenres($user_id, $genre);
            $genreCount[$genre] = $result[0]->total_books ?? 0;
        }


        $data = [
            'lowStockBooks' => $lowStockbooks,
            'summary' => $summary[0],
            'genreSales' => $genreSales,
            'genreCount' => $genreCount
        ];

        return $data;
    }
}
