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
    
    public function getUserAuctions($id = null, $limit = 1) {
        $query = "SELECT auction.*, book.title, book.author, book.cover_image AS image, book.description, book.book_condition, user.username AS seller_name 
                  FROM auction
                  JOIN book ON auction.book_id = book.id
                  JOIN user ON auction.seller_id = user.ID
                  WHERE auction.seller_id = :id
                  ORDER BY auction.end_time ASC
                  LIMIT $limit";
        $params = ['id' => $id];
        return $this->query($query, $params);
    } 

    public function getParticipatingAuctions($id = null, $limit = 1) {
        $query = "SELECT auction.*, book.title, book.author, book.cover_image AS image, book.description, book.book_condition, user.username AS seller_name 
                  FROM auction
                  JOIN book ON auction.book_id = book.id
                  JOIN user ON auction.seller_id = user.ID
                  WHERE auction.current_bidder_id = :id OR auction.winner_user_id = :id
                  ORDER BY auction.end_time ASC
                  LIMIT $limit";
        $params = ['id' => $id];
        return $this->query($query, $params);
    } 

    public function getAuctionWithBook($id) {
        $query = "SELECT auction.*, book.title, book.author, book.cover_image AS image, book.description, book.book_condition, bookseller.full_name AS seller_name, bookseller.rating AS seller_rating, bookseller.profile_picture AS seller_image
                  FROM auction
                  JOIN book ON auction.book_id = book.id
                  JOIN bookseller ON auction.seller_id = bookseller.user_id
                  WHERE auction.id = :id";
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
            $bookModel = new BookModel();
            $bookModel->update($data['book_id'], ['status' => 'auction']);
        }
        return $result;
    }

    public function updateAuction($data) {
        $auctionData = [];

        if (array_key_exists('current_price', $data)) {
            $auctionData['current_price'] = $data['current_price'];
        }

        if (array_key_exists('previous_bid', $data)) {
            $auctionData['previous_bid'] = $data['previous_bid'];
        }

        if (array_key_exists('current_bidder_id', $data)) {
            $auctionData['current_bidder_id'] = $data['current_bidder_id'];
        }

        if (array_key_exists('winner_user_id', $data)) {
            $auctionData['winner_user_id'] = $data['winner_user_id'];
        }

        if (array_key_exists('is_closed', $data)) {
            $auctionData['is_closed'] = $data['is_closed'];
        }

        $result = $this->update($data['id'], $auctionData);
        
        return $result;

    }

    public function deleteAuction($auctionId) {
        return $this->delete($auctionId);
    }
}
