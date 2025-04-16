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
    
    
    
    
}
