<?php

class AuctionModel {
    use Model;

    protected $table = 'auction';

    protected $allowedColumns = [
        'book_id',
        'seller_id',
        'starting_price',
        'current_price',
        'buy_now_price',
        'start_time',
        'end_time',
        'is_closed',
        'created_at',
        'previous_bid',
        'current_bidder_id',
        'winner_user_id',
    ];

    public function getActiveAuctions($limit = 1) {
        $query = "SELECT auction.*, book.title, book.author, book.cover_image AS image, book.description, book.book_condition, user.username AS seller_name 
                  FROM auction
                  JOIN book ON auction.book_id = book.id
                  JOIN user ON auction.seller_id = user.ID
                  WHERE auction.is_closed = 0
                  ORDER BY auction.end_time ASC
                  LIMIT $limit";
        return $this->query($query);
    }    

    public function getAuctionWithBook($id) {
        $query = "SELECT a.*, b.title, b.author, b.cover_image AS image, b.description, b.book_condition, u.username AS seller_name
                  FROM auction a
                  JOIN book b ON a.book_id = b.id
                  JOIN user u ON a.seller_id = u.ID
                  WHERE a.id = :id";
        return $this->query($query, ['id' => $id])[0] ?? null;
    }

    public function createAuction($data) {
        $auctionData = [
            'book_id' => $data['book_id'],
            'seller_id' => $data['seller_id'],
            'starting_price' => $data['starting_price'],
            'current_price' => $data['starting_price'], 
            'buy_now_price' => $data['buy_now_price'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
        ];
        
        $result = $this->insert($auctionData);
        if ($result) {
            $query = "UPDATE listings SET status = 'auction' WHERE book_id = :book_id";
            $params = ['book_id' => $data['book_id']];
            $this->query($query, $params); 
        }
        return $result;
    }

    public function updateAuctionBid($data) {
        $auctionData = [
            'current_price' => $data['current_price'],
            'previous_bid' => $data['previous_bid'],
            'current_bidder_id' => $data['current_bidder_id'],
        ];
        
        return $this->update($data['id'], $auctionData);

    }

    public function closeAuction($auctionId, $winnerId = null) {
        $data = ['is_closed' => 1];
        if ($winnerId !== null) {
            $data['winner_user_id'] = $winnerId;
        }
        return $this->update($auctionId, $data);
    }
}
