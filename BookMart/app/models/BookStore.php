<?php

class BookStore {

    use Model;

    protected $table = 'bookstore';

    protected $allowedColumns = [
        'user_id',
        'store_name',
        'phone_number',
        'street_address',
        'city',
        'district',
        'province',
        'owner_name',
        'owner_email',
        'owner_phone_number',
        'owner_nic',
        'manager_name',
        'manager_email',
        'manager_phone_number',
        'manager_nic',
        'business_reg_no',
        'status' 
    ];

    public function findById($id) {
        $query = "SELECT * FROM bookstore WHERE id = :id";
        return $this->getRow($query, ['id' => $id]);
    }
}
