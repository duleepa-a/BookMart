<?php

class BidModel {
    use Model;

    protected $table = 'bid';

    protected $allowedColumns = [
        'auction_id',
        'user_id',
        'bid_amount',
        'bid_time'
    ];

    public function getLatestBid($auctionId) {
        $query = "SELECT * FROM {$this->table}
                  WHERE auction_id = :auction_id
                  ORDER BY bid_amount DESC, bid_time ASC
                  LIMIT 1";
        return $this->query($query, ['auction_id' => $auctionId])[0] ?? null;
    }

    public function getBidsForAuction($auctionId) {
        $query = "SELECT * FROM {$this->table}
                  WHERE auction_id = :auction_id
                  ORDER BY bid_time DESC";
        return $this->query($query, ['auction_id' => $auctionId]);
    }

    public function placeBid($data) {
        return $this->insert($data);
    }
}
