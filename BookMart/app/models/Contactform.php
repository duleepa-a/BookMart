<?php

class Contactform {
    use Model;

    protected $table = 'contactform';

    protected $allowedColumns = [
        'id',
        'name',
        'email',
        'message',
        'status'
    ];
}
