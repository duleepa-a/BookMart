<?php

class UserModel {
    use Model;

    protected $table = 'user';

    protected $allowedColumns = [
        'username',
        'password',
        'email',
        'role',
        'active_status',
        'createdAt'
    ];

    public function findUserByUsernameOrEmail($usernameOrEmail) {
        $query = "SELECT * FROM user WHERE username = :usernameOrEmail OR email = :usernameOrEmail";
        return $this->getRow($query, ['usernameOrEmail' => $usernameOrEmail]);
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

        return $user !== false;
    }

    public function isEmailTaken($email) {

        $data = ['email' => $email];
        $user = $this->first($data);

        return $user !== false;
    }

}
