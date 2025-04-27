<?php

class AdvModel {

    use Model;

    protected $table = 'admin_add';

    protected $allowedColumns = [
        'id',
        'Advertisement_Title',
        'Advertisement_Description',
        'Advertisement_Type',
        'cover_image',
        'Price',
        'Submitted_On',
        'active_status',
        'Start_date',
        'End_date'
    ];
    
    public function updateExpiredAds(){
        $today = date('Y-m-d');

        $query = "
            UPDATE $this->table
            SET active_status = 0
            WHERE End_date < :today AND active_status = 1
        ";

        $this->query($query, [':today' => $today]);
    }
    
}
