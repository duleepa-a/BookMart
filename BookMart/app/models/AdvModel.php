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
        'Start_date',
        'End_date'
    ];
    
    
    
    
}
