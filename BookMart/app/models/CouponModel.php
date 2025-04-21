<?php

class CouponModel {
    use Model;

    protected $table = 'coupon';

    protected $allowedColumns = [
        'coupon_id',
        'coupon_code',
        'store_id',
        'discount_percentage',
        'start_time',
        'end_time',
        'is_active'
    ];
}