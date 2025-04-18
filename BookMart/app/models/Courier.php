<?php

class Courier {
    use Model;

    protected $table = 'courier';

    protected $allowedColumns = [
        'user_id',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'nic_number',
        'license_number',
        'address_line_1',
        'address_line_2',
        'city',
        'phone_number',
        'secondary_phone_number',
        'bank',
        'branch_name',
        'account_number',
        'account_name',
        'vehicle_type',
        'vehicle_model',
        'vehicle_registration_number',
        'vehicle_registration_document',
        'photo_of_driving_license',
        'photo_nic'
    ];
}
