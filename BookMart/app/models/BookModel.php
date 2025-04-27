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
        'created_at',
        'status'
    ];

    public function searchBooks($keyword) {
        $query = "SELECT * FROM book WHERE (title LIKE :keyword OR author LIKE :keyword) AND status = 'available'";
        $data = [':keyword' => '%' . $keyword . '%'];
    
        return $this->query($query, $data);
    }

    public function recommendBooks($bookId){

        $currentBook = $this->first(['id' => $bookId]);
        if (!$currentBook) return [];

        $this->limit = 7 ;
        $recommendedIds = [$bookId];
    
        $recommended = $this->where(
                                    [
                                        'genre' => $currentBook->genre,
                                        'status' => 'available'
                                    ],
                                    [
                                        'id' => $currentBook->id
                                    ] 
                                );
        
        if($recommended){
            foreach ($recommended as $book) {
                if (!in_array($book->id, $recommendedIds)) {
                    $recommendedIds[] = $book->id;
                }
            }
        }

        if (count($recommended) < 7) {
            $this->limit = max(0,7 - count($recommended));
            $moreFromSeller = $this->where(
                [
                    'seller_id' => $currentBook->seller_id,
                    'status' => 'available'
                ],
                [
                    'id' => $currentBook->id
                ] 
            );

            if($moreFromSeller){

                foreach ($moreFromSeller as $book) {
                    if (count($recommended) >= 7) break;
                    if (!in_array($book->id, $recommendedIds)) {
                        $recommended[] = $book;
                        $recommendedIds[] = $book->id;
                    }
                }

            }

        }

        if (count($recommended) < 7) {
            $orderModel = new Order();
            $orderModel->setLimit(max(0,7 - count($recommended)));

            $topSelling = $orderModel->where([],['book_id' => $bookId]);


            if($topSelling){
                foreach ($topSelling as $order) {
                    if (count($recommended) >= 7) break;
                    if (!in_array($order->book_id, $recommendedIds)) {
                        $book = $this->first(['id' => $order->book_id , 'status' => 'available']);
                        if($book){
                            $recommended[] = $book;
                            $recommendedIds[] = $book->id;
                        }
                    }
                }
            }
        }

        return $recommended;
    }


    public function adminsearchBooks($keyword, $limit = null, $offset = 0, $sortClause = "", $searchField = ""){
        $query = "SELECT * FROM book WHERE status = 'available' AND ";
        
        if (!empty($searchField) && in_array($searchField, ['title', 'author', 'publisher'])) {
            $query .= "$searchField LIKE :keyword";
        } else {
            $query .= "title LIKE :keyword OR author LIKE :keyword OR ISBN LIKE :keyword";
        }
        
        if (!empty($sortClause)) {
            $query .= $sortClause;
        } else {
            $query .= " ORDER BY title ASC"; 
        }
        
        if ($limit !== null) {
            $query .= " LIMIT $limit OFFSET $offset";
        }
        
        $data = [':keyword' => '%' . $keyword . '%'];
        return $this->query($query, $data);
    }
    
    public function countSearchResults($keyword, $searchField = ""){
        $query = "SELECT COUNT(*) as total FROM book WHERE status = 'available' AND ";
        
        if (!empty($searchField) && in_array($searchField, ['title', 'author', 'publisher'])) {
            $query .= "$searchField LIKE :keyword";
        } else {
            $query .= "title LIKE :keyword OR author LIKE :keyword OR ISBN LIKE :keyword";
        }
        
        $data = [':keyword' => '%' . $keyword . '%'];
        $result = $this->query($query, $data);
        return $result[0]->total ?? 0;
    }

    public function findById($bookId) {
        $query = "SELECT * FROM book WHERE status = 'available' AND  id = :id LIMIT 1";
        $data = [':id' => $bookId];

        $result = $this->query($query, $data);
    
        return $result ? $result[0] : null;
    }

    public function adminFindAllBooks($limit = null, $offset = 0, $sortClause = "") {
        $query = "SELECT * FROM {$this->table} WHERE status = 'available'";
     
        if (!empty($sortClause)) {
            $query .= $sortClause;
        } else {
            $query .= " ORDER BY title ASC"; 
        }
        
        if ($limit !== null) {
            $query .= " LIMIT $limit OFFSET $offset";
        }
        
        return $this->query($query);
    }

    public function count() {
        $query = "SELECT COUNT(*) as total FROM {$this->table}  WHERE status = 'available'";
        $result = $this->query($query);
        return $result[0]->total ?? 0;
    }
}
