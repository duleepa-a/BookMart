<?php

class CouponModel {
    use Model;

    protected $table = 'coupon';

    protected $allowedColumns = [
        'id',
        'coupon_code',
        'store_id',
        'discount_percentage',
        'start_time',
        'end_time',
        'is_active'
    ];

    public function getCouponValid($code, $store_id){
        
        $query = "SELECT * FROM $this->table 
                WHERE coupon_code = :code 
                AND store_id = :store_id 
                AND is_active = 1 
                AND start_time <= NOW() 
                AND end_time >= NOW() 
                LIMIT 1";

        $params = [
            'code' => $code,
            'store_id' => $store_id,
        ];

        $result = $this->query($query, $params);

        return $result ? $result[0] : false;
    }



}