<?php

Trait Database{

    private $pdo;

    protected function connect() {
        if (!$this->pdo) {
            $string = "mysql:hostname=" . DBHOST . ";dbname=" . DBNAME;
            $this->pdo = new PDO($string, DBUSER, DBPASS);
        }
        return $this->pdo;
    }

    public function query($query,$data = []){

        $conn = $this->connect();
        $stm=$conn->prepare($query);

        $check = $stm->execute($data);
        if($check){
            
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
               
                return $result;
            }
        }

        return false;
    }

    public function getRow($query,$data = []){
        
        $conn = $this->connect();
        $stm=$conn->prepare($query);

        $check = $stm->execute($data);
        if($check){
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)){
                return $result[0];
            }
        }

        return false;
    }

    public function get_last_id() {
        return $this->connect()->lastInsertId();
    }


}



// $string = "mysql:hostname=localhost;dbname=my_db";
// $con = new PDO($string,'root','');

// show($conn);
