<?php

class AdminAdvertisment extends Controller{

    public function index() {
        $advModel = new AdvModel();
        $store_add = new StoreAdvModel();
        $userModel = new BookStore();
    

        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pendingPage = isset($_GET['pending_page']) ? (int)$_GET['pending_page'] : 1;
        $approvedPage = isset($_GET['approved_page']) ? (int)$_GET['approved_page'] : 1;
        $limit = 5; 

        $tab = isset($_GET['tab']) ? $_GET['tab'] : 'new-add';
        

        $offset = ($currentPage - 1) * $limit;
        $advModel->setLimit($limit);
        $advModel->setOffset($offset);
        $ads = $advModel->findAll();
        $totalAds = $advModel->countAll();
        $totalPages = ceil($totalAds / $limit);
    

        $pendingOffset = ($pendingPage - 1) * $limit;
        $store_add->setLimit($limit);
        $store_add->setOffset($pendingOffset);
        $pendingConditions = ['status' => 'pending'];
        $pendingStoreAds = $store_add->where($pendingConditions);
        $totalPending = $store_add->count($pendingConditions);
        $totalPendingPages = ceil($totalPending / $limit);
    

        $approvedOffset = ($approvedPage - 1) * $limit;
        $store_add->setLimit($limit);
        $store_add->setOffset($approvedOffset);
        $approvedConditions = ['status' => 'approved'];
        $approvedAds = $store_add->where($approvedConditions);
        $totalApproved = $store_add->count($approvedConditions);
        $totalApprovedPages = ceil($totalApproved / $limit);
        

        if($pendingStoreAds){
            foreach ($pendingStoreAds as $ad) {
                $user = $userModel->first(['user_id' => $ad->store_id]);
                $ad->store_name = $user->store_name ?? 'N/A';
            }
        }
    
        if($approvedAds){
            foreach ($approvedAds as $ad) {
                $user = $userModel->first(['user_id' => $ad->store_id]);
                $ad->store_name = $user->store_name ?? 'N/A';
            }
        }
    
        $data = [
            'advertisements' => $ads,
            'pendingStoreAds' => $pendingStoreAds,
            'approvedAds' => $approvedAds,
            // Pagination for admin ad's
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
            // Pagination for pending bookstore ad's
            'pendingPage' => $pendingPage,
            'totalPendingPages' => $totalPendingPages,
            // Pagination for approved bookstore ad's
            'approvedPage' => $approvedPage,
            'totalApprovedPages' => $totalApprovedPages,
            // Counts
            'totalAds' => $totalAds,
            'totalPending' => $totalPending,
            'totalApproved' => $totalApproved
        ];
    
        $this->view('adminAdvertisment', $data);
    }


    public function addAdvertisement(){
        $advModel = new AdvModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
                        mkdir($uploadDir, 0777, true); 
                    }
                    if (!is_writable($uploadDir)) {
                        echo "Directory is not writable: $uploadDir<br>";
                    }
                    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $filePath)) {
                        $advData['cover_image'] = $filename;
                    } else {
                        echo "Error uploading cover image!";
                        return;
                    }
                } else {
                    echo "Invalid file type!";
                    return;
                }
            }
                if ($advModel->insert($advData)) {
                    redirect('adminAdvertisment');
                } else {
                    echo "Something went wrong!";
                }
        } else {
            echo("addAdvertisement GET request");
            $this->view('adminAdvertisment');
        }
    }

    public function updateAdvertisement(){
        $advModel = new AdvModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $AddId = $_POST['add_id'];

            $advData = [
                'Advertisement_Title' => htmlspecialchars(trim($_POST['Advertisement_Title'])),
                'Advertisement_Description' => htmlspecialchars(trim($_POST['Advertisement_Description'])),
                'Price' => htmlspecialchars(trim($_POST['Price']), FILTER_VALIDATE_FLOAT),
                'Start_date' => htmlspecialchars(trim($_POST['Start_date'])),
                'End_date' => filter_var(trim($_POST['End_date'])),
            ];

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

    public function handleAdDecision() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adId = $_POST['ad_id'];
            $amount = $_POST['payment_amount'];
            $action = $_POST['action'];
    
            $storeAddModel = new StoreAdvModel();
    
            if ($action === 'accept') {
                $storeAddModel->update($adId, [
                    'payment_amount' => $amount,
                    'status' => 'approved'
                ]);
            } elseif ($action === 'reject') {
                $storeAddModel->update($adId, [
                    'status' => 'rejected'
                ]); 
            }
    
            redirect('adminAdvertisment'); 
        }
    }
    

}
