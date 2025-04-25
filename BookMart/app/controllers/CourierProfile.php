<?php

class CourierProfile extends Controller{

    public function index(){

        $courierData = new Courier();
        $courierD = $courierData->where(['user_id' =>  $_SESSION['user_id']]);

         //**** */
        if (!empty($courierD)) {
            $courier = $courierD[0];
            $user_id = $courier->user_id ;
        }

        $courierModel = new UserModel();
        $courier = $courierModel->where(['ID' => $user_id]);
        // echo '<pre>';
        // print_r($courierD);
        // echo '</pre>';
        $this->view('courierProfile',  ['courierD' =>$courierD,'courier'=>$courier]);
    }

    public function updatePersonalDetails(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = $_POST['firstname'] ?? '';
            $lastname = $_POST['lastname'] ?? '';
            $gender = $_POST['gender'] ?? '';
            $nic = $_POST['nic'] ?? '';
            $license = $_POST['license'] ?? '';
            $address = $_POST['address'] ?? '';
            $addressline2 = $_POST['address-line-2'] ?? '';
            $city = $_POST['city'] ?? '';
            $phonenumber = $_POST['phone-number'] ?? '';
            $secondarynumber = $_POST['secondary-number'] ?? '';

            $errors = [];

            if (empty($firstname)) $errors['first-name'] = "First name is required.";
            if (empty($lastname)) $errors['last-name'] = "Last name is required.";
            if (!preg_match('/^[A-Z]\d{9}$/', $license)) $errors['license'] = "Invalid license number.";
            if (!preg_match('/^(\d{9}[VXvx]|\d{12})$/', $nic)) $errors['nic'] = "Invalid NIC number.";
            if (!preg_match('/^\d{10}$/', $phonenumber)) $errors['phone-number'] = "Invalid phone number.";
            if (!preg_match('/^\d{10}$/', $secondarynumber)) $errors['secondary-number'] = "Invalid phone number.";
            if (empty($address)) $errors['address'] = " Address is required.";
            if (empty($city)) $errors['city'] = "City is required.";
            // if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) $errors['email'] = "Invalid Email Address.";
            
            // if (!empty($errors)) {
            //     echo "<pre>";
            //     print_r($errors);
            //     echo "</pre>";
            //     die();
            // }

            if (empty($errors)) {
                $courierModel = new Courier();

                $userId = $courierModel->first(['user_id' => $_SESSION['user_id']])->id ?? null;
                
                if ($userId) {
                    $courierModel->update($userId, [
                        'first_name' => $firstname,
                        'last_name' => $lastname,
                        'gender' => $gender,
                        'nic_number' => $nic,
                        'license_number' => $license,
                        'address_line_1' => $address,
                        'address_line_2' => $addressline2,
                        'city' => $city,
                        'phone_number' => $phonenumber,
                        'secondary_phone_number' =>  $secondarynumber,
                    ]);

                    $this->index(); 
                } else {
                    $_SESSION['error'] = "You must be logged in to update your store.";
                    redirect('login');
                }
            } else {
                $_SESSION['form_errors'] = $errors;
                $this->index();  
            }
        }
    }

    public function updateBankDetails(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bank = $_POST['bank'] ?? '';
            $branchname = $_POST['branch-name'] ?? '';
            $accountnumber = $_POST['account-number'] ?? '';
            $accountname = $_POST['account-name'] ?? '';
            
            $errors = [];

            if (empty($bank)) $errors['bank'] = "Bank Name is required.";
            if (empty($branchname)) $errors['branch-name'] = "Branch name is required.";
            if (empty($accountname)) $errors['account-name'] = "Account name is required.";
            if (!preg_match('/^\d{8,12}$/', $accountnumber)) $errors['account-number'] = "Invalid bank account number.";
            
            
            if (empty($errors)) {
                $courierModel = new Courier();

                $userId = $courierModel->first(['user_id' => $_SESSION['user_id']])->id ?? null;
                
                if ($userId) {
                    $courierModel->update($userId, [
                        'bank' => $bank,
                        'branch_name' => $branchname,
                        'account_number' => $accountnumber,
                        'account_name' => $accountname,
                    ]);

                    $this->index(); 
                } else {
                    $_SESSION['error'] = "You must be logged in to update your store.";
                    redirect('login');
                }
            } else {
                $_SESSION['form_errors'] = $errors;
                $this->index();  
            }
        }
    }

    public function updateVehicalDetails(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vehicaltype = $_POST['vehical-type'] ?? '';
            $vehicalmodel = $_POST['vehical-model'] ?? '';
            $vehicalregistrationnumber = $_POST['vehical-registration-number'] ?? '';
            
            $errors = [];

            // if (empty($vehicaltype)) $errors['vehical-type'] = "vehical type is required.";
            // if (empty($vehicalmodel)) $errors['vehical-model] = "vehical model is required.";
            // if (empty($vehicalregistrationnumber) $errors['vehical-registration-number'] = "vehical registration number is required.";
            
            if (empty($errors)) {
                $courierModel = new Courier();

                $userId = $courierModel->first(['user_id' => $_SESSION['user_id']])->id ?? null;
                
                if ($userId) {
                    $courierModel->update($userId, [
                        'vehicle_type' => $vehicaltype,
                        'vehicle_model' => $vehicalmodel,
                        'vehicle_registration_number' => $vehicalregistrationnumber,                        
                    ]);

                    $this->index(); 
                } else {
                    $_SESSION['error'] = "You must be logged in to update your store.";
                    redirect('login');
                }
            } else {
                $_SESSION['form_errors'] = $errors;
                $this->index();  
            }
        }
    }

}
