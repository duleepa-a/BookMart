<?php

Trait Model{

    use Database;
    protected $limit = 10;
    protected $offset ='0';
    protected $order_column = "id";
    protected $order_type = "desc";
    public $errors = [];

    public function setLimit($limit) {
        $this->limit = $limit;
    }

    public function setOffset($offset) {
        $this->offset = $offset;
    }

    public function first($data,$data_not = []){

        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query="SELECT * FROM $this->table WHERE ";

        foreach($keys as $key){
            $query .= $key . "=:" .$key . " && ";
        }

        foreach($keys_not as $key){
            $query .= $key . "!=:" .$key . " && ";
        }

        $query =trim($query," && ");

        $query .=" limit $this->limit offset $this->offset" ;

        $data = array_merge($data,$data_not);

        $result = $this->query($query,$data);

        if($result)
            return $result[0];

        return false;

    }
    public function findAll(){

        $query="SELECT * FROM $this->table ";

        $query .="order by $this->order_column $this->order_type limit $this->limit offset $this->offset" ;

        return $this->query($query);

    }
    public function where($data,$data_not = []){

        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query="SELECT * FROM $this->table WHERE ";

        foreach($keys as $key){
            $query .= $key . "=:" .$key . " && ";
        }

        foreach($keys_not as $key){
            $query .= $key . "!=:" .$key . " && ";
        }

        $query =trim($query," && "). " ";

        $query .="order by $this->order_column $this->order_type limit $this->limit offset $this->offset" ;

        $data = array_merge($data,$data_not);

        return $this->query($query,$data);

    }
    public function insert($data){

        if(!empty($this->allowedColumns)){
            foreach($data as $key => $value){
                if(!in_array($key,$this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query="INSERT INTO $this->table (".implode(",",$keys).") VALUES (:".implode(",:",$keys).") ";

        $this->query($query,$data);

        $lastId = $this->get_last_id();

        return $this->first([$this->order_column => $lastId]);
    }

    public function update($id,$data,$id_column = 'id'){
        $id_column = $this->order_column;
        if(!empty($this->allowedColumns)){
            foreach($data as $key => $value){
                if(!in_array($key,$this->allowedColumns)){
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query="UPDATE $this->table SET ";

        foreach($keys as $key){
            $query .= $key . "= :" .$key . " , ";
        }  

        $query =trim($query," , ");

        $query .=" WHERE $id_column = :$id_column" ;

        $data[$id_column] = $id;

        $this->query($query,$data);
        return false;
    }

    public function delete($id,$id_column = 'id'){
       
        $data[$id_column] = $id;
        $query="DELETE FROM $this->table WHERE $id_column = :$id_column ";

        $this->query($query,$data);
        
    }   

    public function count($data = [], $data_not = []) {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT COUNT(*) as total FROM $this->table WHERE ";
    
        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }
    
        foreach ($keys_not as $key) {
            $query .= $key . "!=:" . $key . " && ";
        }
    
        $query = trim($query, " && ");
    
        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);
    
        return $result ? $result[0]->total : 0;
    }

    public function countAll(){
         $query = "SELECT COUNT(*) as total FROM $this->table";

         $result = $this->query($query);

         return $result ? $result[0]->total : 0 ;

    }
    
}