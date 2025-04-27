<?php

class StoreAdvModel {

    use Model;

    protected $table = 'store_add';

    protected $allowedColumns = [
        'id',
        'store_id',
        'image_path',
        'title',
        'status',
        'posted_date',
        'start_date',
        'end_date',
        'active_status',
        'payment_amount'
    ];
    
    
    public function updateExpiredAds(){
        $today = date('Y-m-d');

        $query = "
            UPDATE $this->table
            SET active_status = 0
            WHERE end_date < :today AND active_status = 1
        ";

        $this->query($query, [':today' => $today]);
    }

}
