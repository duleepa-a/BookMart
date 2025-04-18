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
        'bank',
        'branch_name',
        'account_number',
        'account_name',
        'status',
        'followers',
        'rating',
        'profile_picture',
        'evidence_doc'
    ];

    public function findById($id) {
        $query = "SELECT * FROM bookstore WHERE id = :id";
        return $this->getRow($query, ['id' => $id]);
    }

    public function recommendBookstores($userId) {
        $sql = "SELECT bs.id, bs.store_name, bs.followers,bs.profile_picture,bs.user_id
                FROM bookstore bs
                WHERE bs.user_id NOT IN (
                    SELECT f.bookstore_id FROM follows f WHERE f.buyer_id = :userId
                ) AND bs.status = 'approved'
                ORDER BY bs.followers DESC
                LIMIT 5";
        return $this->query($sql, [':userId' => $userId]);
    }
    
}
