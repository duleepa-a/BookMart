<?php

class AdminAdvertisment extends Controller{

    public function index(){
        $ads = $this->getAllAds();
        
        $data = ['advertisements' => $ads,
                ];
        $this->view('adminAdvertisment',$data);
    }

    
    public function getAllAds() {
        $advModel = new AdvModel();

        return $advModel->findAll(); // Calls findAll from model.php
    }

    public function addAdvertisement(){
        $advModel = new AdvModel();
        echo("addAdvertisement");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo("addAdvertisement POST in");

            $advData = [
                'Advertisement_Title' => htmlspecialchars(trim($_POST['Advertisement_Title'])),
                'Advertisement_Description' => htmlspecialchars(trim($_POST['Advertisement_Description'])),
                'Price' => htmlspecialchars(trim($_POST['Price']), FILTER_VALIDATE_FLOAT),
                'Start_date' => filter_var(trim($_POST['Start_date'])),
                'End_date' => filter_var(trim($_POST['End_date'])),
                
            ];
            if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\Images\ads';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true); 
                    }
                    $filename= uniqid() . '.' . $fileExtension;
                    $filePath = $uploadDir. '\\' . $filename; 
                    if (!file_exists($_FILES['cover_image']['tmp_name'])) {
                        echo "Temporary file does not exist!<br>";
                    }
                    if (!is_dir($uploadDir)) {
                        echo "Directory does not exist. Creating: $uploadDir<br>";
                        mkdir($uploadDir, 0777, true); // Creates directory if missing
                    }
                    if (!is_writable($uploadDir)) {
                        echo "Directory is not writable: $uploadDir<br>";
                    }
                    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $filePath)) {
                        $advData['cover_image'] = $filename;
                    } else {
                        echo "Error uploading cover image!";
                        // $this->view('addBook', $bookData);
                        return;
                    }
                } else {
                    echo "Invalid file type!";
                    // $this->view('addBook', $bookData);
                    return;
                }
            }
           

            // Validate and save the book data
            // if ($bookModel->validate($bookData)) {
                echo("Validation passed");
                if ($advModel->insert($advData)) {
                    redirect('adminAdvertisment');
                } else {
                    echo "Something went wrong!";
                }
            // } else {
            //     echo("Validation failed");
                // $this->view('addBook', $bookData);
            // }
        } else {
            echo("addAdvertisement GET request");
            $this->view('addAdvertisement');
        }
    }

    public function updateAdvertisement(){
        $advModel = new AdvModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $AddId = $_POST['add_id'];

            // Prepare book data for update
            $advData = [
                'Advertisement_Title' => htmlspecialchars(trim($_POST['Advertisement_Title'])),
                'Advertisement_Description' => htmlspecialchars(trim($_POST['Advertisement_Description'])),
                'Advertisement_Type' => htmlspecialchars(trim($_POST['Advertisement_Type'])),
                'Price' => htmlspecialchars(trim($_POST['Price']), FILTER_VALIDATE_FLOAT),
                'Start_date' => htmlspecialchars(trim($_POST['Start_date'])),
                'End_date' => filter_var(trim($_POST['End_date'])),
            ];

            show($advData);

            show($AddId);
            // Update the book record in the database
            if (!($advModel->update($AddId, $advData))) {
                redirect('adminAdvertisment');
            } else {
                echo "Something went wrong while updating the advertisement!";
            }
        } else {
            echo "Invalid request method!";
        }
    }

    public function deleteAdvertisement(){
        $advModel = new AdvModel();
        $id = $_POST['add_id'];
        
        show($id);
        $advModel->delete($id);
        redirect('adminAdvertisment');
        
    }

}
