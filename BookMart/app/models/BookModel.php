<?php
require 'Order.php';

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

    public function recommendBooks($bookId){

        $currentBook = $this->first(['id' => $bookId]);
        if (!$currentBook) return [];

        $this->limit = 7 ;
        $recommendedIds = [$bookId];
    
        $recommended = $this->where(
                                    [
                                        'genre' => $currentBook->genre
                                    ],
                                    [
                                        'id' => $currentBook->id
                                    ] 
                                );

        
        foreach ($recommended as $book) {
            if (!in_array($book->id, $recommendedIds)) {
                $recommendedIds[] = $book->id;
            }
        }
        

        if (count($recommended) < 7) {
            $this->limit = max(0,7 - count($recommended));
            $moreFromSeller = $this->where(
                [
                    'seller_id' => $currentBook->seller_id
                ],
                [
                    'id' => $currentBook->id
                ] 
            );

            foreach ($moreFromSeller as $book) {
                if (count($recommended) >= 7) break;
                if (!in_array($book->id, $recommendedIds)) {
                    $recommended[] = $book;
                    $recommendedIds[] = $book->id;
                }
            }

        }

        if (count($recommended) < 7) {
            $orderModel = new Order();
            $orderModel->setLimit(max(0,7 - count($recommended)));

            $topSelling = $orderModel->where([],['book_id' => $bookId]);

            foreach ($topSelling as $order) {
                if (count($recommended) >= 7) break;
                if (!in_array($order->book_id, $recommendedIds)) {
                    $book = $this->first(['id' => $order->book_id]);
                    $recommended[] = $book;
                    $recommendedIds[] = $book->id;
                }
            }
        }

        return $recommended;
    }
}
