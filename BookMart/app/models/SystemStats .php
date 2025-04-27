<?php

class SystemStats {

    use Model;

    protected $table = 'system_stats';

    protected $allowedColumns = [
        'systemfee_book',
        'systemfee_add',
        'deliveryfee',
        'system_email'
    ];

    public function getAll() {
        $query = "SELECT * FROM {$this->table}";
        return $this->query($query);
    }
    
    public function getFirst() {
        $query = "SELECT * FROM {$this->table} LIMIT 1";
        $result = $this->query($query);
        return $result ? $result[0] : null;
    }
    
    public function updateStats($systemfee_book, $systemfee_add, $deliveryfee, $system_email) {
        // Check if stats record exists
        $stats = $this->getFirst();
        
        if ($stats) {
            // Update existing record
            $query = "UPDATE {$this->table} SET 
                      systemfee_book = :systemfee_book,
                      systemfee_add = :systemfee_add,
                      deliveryfee = :deliveryfee
                      system_email = :system_email
                      WHERE id = :id";
                      
            $params = [
                'systemfee_book' => $systemfee_book,
                'systemfee_add' => $systemfee_add,
                'deliveryfee' => $deliveryfee,
                'system_email' => $system_email,
                'id' => $stats->id
            ];
        } else {
            // Insert new record
            $query = "INSERT INTO {$this->table} 
                      (systemfee_book, systemfee_add, deliveryfee, system_email) 
                      VALUES (:systemfee_book, :systemfee_add, :deliveryfee, :system_email)";
                      
            $params = [
                'systemfee_book' => $systemfee_book,
                'systemfee_add' => $systemfee_add,
                'deliveryfee' => $deliveryfee,
                'system_email' => $system_email
            ];
        }
        
        return $this->query($query, $params);
    }
}