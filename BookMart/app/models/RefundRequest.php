<?php

class RefundRequest {

    use Model;

    protected $table = 'refund_requests';

    protected $allowedColumns = [
        'id',
        'order_id',
        'buyer_id',
        'email',
        'phone',
        'reason',
        'evidence',
        'bank_name',
        'branch_name',
        'account_number',
        'account_name',
        'status',
        'created_at'
    ];
}
