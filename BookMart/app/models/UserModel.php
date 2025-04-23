<?php

class UserModel {
    use Model;

    protected $table = 'user';

    protected $allowedColumns = [
        'ID',
        'username',
        'password',
        'email',
        'role',
        'active_status',
        'createdAt'
    ];

    public function __construct() {
        $this->order_column = 'ID';
    }

    public function findUserByUsernameOrEmail($usernameOrEmail) {
        $query = "SELECT * FROM user WHERE username = :usernameOrEmail OR email = :usernameOrEmail";
        return $this->getRow($query, ['usernameOrEmail' => $usernameOrEmail]);
    }

    public function getRole($ID){
        return $this->first(['ID' => $ID])->role; 
    }

    public function registerBuyer($userData, $buyerData) {
        echo(" in function ");
        $userId = $this->insert($userData);
        if ($userId) {
            echo(" user data done");
            $buyerModel = new BuyerModel();
            $result = $this->findUserByUsernameOrEmail($userData['email']);
            $user = $result; // Get the first object from the array
            $buyerData['user_id'] = $user->ID;
            return $buyerModel->insert($buyerData);
        }
        else{
            echo(" user data not entered ");
            return false;
        }
        
    }

    public function registerBookSeller($userData, $bookSellerData) {
        echo(" in function ");
        $userId = $this->insert($userData);
        if ($userId) {
            echo(" user data done");
            $bookSellerModel = new BookSeller();
            $result = $this->findUserByUsernameOrEmail($userData['email']);
            $user = $result;
            $bookSellerData['user_id'] = $user->ID;
            return $bookSellerModel->insert($bookSellerData);
        }
        else{
            echo(" user data not entered ");
            return false;
        }
        
    }

    public function registerCourier($userData, $courierData) {
        echo(" in function ");
        $userId = $this->insert($userData);
        
        if ($userId) {
            echo(" user data done");
            
            $courierModel = new Courier();
            $result = $this->findUserByUsernameOrEmail($userData['email']);
            
            if ($result) {
                $user = $result; 
            
                $courierData['user_id'] = $user->ID;
                
                return $courierModel->insert($courierData);
            } else {
                echo(" user data found but could not retrieve user details ");
                return false;
            }
        } else {
            echo(" user data not entered ");
            return false;
        }
    }

    public function registerBookStore($userData, $storeData) {
        echo(" in function ");
        $userId = $this->insert($userData);
        
        if ($userId) {
            echo(" user data done");
            
            $storeModel = new BookStore();
            $result = $this->findUserByUsernameOrEmail($userData['email']);
            
            if ($result) {
                $user = $result; 
            
                $storeData['user_id'] = $user->ID;
                
                return $storeModel->insert($storeData);
            } else {
                echo(" user data found but could not retrieve user details ");
                return false;
            }
        } else {
            echo(" user data not entered ");
            return false;
        }
    }

    public function validate($data){
        $this->errors =[];
        if(empty($data['email'])){
            $this->errors['email'] = "Email is required";
        } else if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            $this->errors['email'] = "Email is not valid";
        }

        if(empty($data['password'])){
            $this->errors['password'] = "Password is required";
        }

        if(empty($this->errors)){
            return true;
        }
        return false;
    }

    public function isUsernameTaken($username) {
        
        if (strlen($username) < 6) {
            return true; 
        }

        $data = ['username' => $username];
        $user = $this->first($data);

        if ($user && isset($_SESSION['user_id']) && $user->ID == $_SESSION['user_id']) {
            return false; 
        }

        return $user !== false;
    }

    public function isEmailTaken($email) {

        $data = ['email' => $email];
        $user = $this->first($data);

        return $user !== false;
    }

    
    public function getUserById($user_id) {
        // Define the query to fetch the user by ID
        $query = 'SELECT * FROM user WHERE ID = :id';
    
        // Bind the data for the query
        $data = [':id' => $user_id];
    
        // Use the getRow method from the Database trait to fetch a single user
        return $this->getRow($query, $data);
    }



    
    //admin view all users
    public function getAllUsers(){
        $query = "SELECT * FROM user";
        return $this->query($query);
    }
    
    public function getUsersByRole($role, $limit = null, $offset = null, $sortClause = "") {
        $query = "SELECT * FROM user WHERE role = :role";
        $query .= $sortClause;
        
        $params = [':role' => $role];
        
        if ($limit !== null) {
            $query .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        }
        
        return $this->query($query, $params);
    }

    // Add to UserModel.php
    public function searchUsers($search, $limit, $offset, $sortClause = "", $role = "") {
        $query = "SELECT * FROM user WHERE (username LIKE :search OR email LIKE :search)";
        if (!empty($role)) {
            $query .= " AND role = :role";
        }
        $query .= $sortClause;
        
        $params = [':search' => "%$search%"];
        if (!empty($role)) {
            $params[':role'] = $role;
        }
        
        if ($limit !== null) {
            $query .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        }
        
        return $this->query($query, $params);
    }

    public function countSearchResults($search, $role = "") {
        $query = "SELECT COUNT(*) as count FROM user WHERE (username LIKE :search OR email LIKE :search)";
        if (!empty($role)) {
            $query .= " AND role = :role";
        }
        
        $params = [':search' => "%$search%"];
        if (!empty($role)) {
            $params[':role'] = $role;
        }
        
        $result = $this->query($query, $params);
        return $result[0]->count ?? 0;
    }

    public function count($role = "") {
        $query = "SELECT COUNT(*) as count FROM user";
        if (!empty($role)) {
            $query .= " WHERE role = :role";
            return $this->query($query, [':role' => $role])[0]->count ?? 0;
        }
        return $this->query($query)[0]->count ?? 0;
    }

    public function findAll($limit = null, $offset = null, $sortClause = "") {
        $query = "SELECT * FROM user";
        $query .= $sortClause;
        
        $params = [];

        if ($limit !== null) {
            $query .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        }
        
        return $this->query($query);
    }

}


    