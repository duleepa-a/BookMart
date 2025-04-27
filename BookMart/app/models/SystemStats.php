<?php

class SystemStats {
    use Model;
    
    protected $table = 'system_stats';
    protected $allowedColumns = [
        'systemfee_book',
        'systemfee_add',
        'deliveryfee',
        'system_email',
        'updated_at'
    ];
    
    public function getCurrentStats() {
        $stats = $this->findAll();
        return !empty($stats) ? $stats[0] : null;
    }
}