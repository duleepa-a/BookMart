<?php

class Admin extends Controller {

    public function bookstoreView() {
        $bookstore = new BookStore();

       
        $allStores = $bookstore->findAll();

        $pendingStores = $bookstore->where(['status' => 'pending']);

        $acceptedStores = $bookstore->where(['status' => 'approved']);

       
        $data['allStores'] = $allStores;
        $data['pendingStores'] = $pendingStores;
        $data['acceptedStores'] = $acceptedStores;

       
        $this->view('adminBookstoreRequest', $data);
    }


    public function viewBookStore($id) {
        
        $bookstoreModel = new BookStore();
        $bookstore = $bookstoreModel->findById($id);
    
        if ($bookstore) {
            $this->view('bookstoreDetails', ['bookstore' => $bookstore]);
        } else {
        
            $this->bookstoreView();
        }
    }

    
    public function approve() {
        $id = $_POST['id'];
        $bookstoreModel = new BookStore();
       
        $bookstoreModel->update($id, ['status'=>'approved']);

        $bookstore = $bookstoreModel->findById($id);
        if ($bookstore) {
            $userModel = new UserModel();
            $userModel->update($bookstore->user_id, ['active_status'=>'active']);
        }

        redirect('admin/bookstoreView');
    }

    public function reject() {
        $id = $_POST['id'];
        $bookstoreModel = new BookStore();
        $userModel = new UserModel();
        
        $bookstore = $bookstoreModel->findById($id);
        $bookstoreModel->delete($id);
        $userModel->delete($bookstore->user_id);

        redirect('admin/bookstoreView');
    }

    public function downloadEvidenceDoc($filename = '') {
        $filepath = 'C:\xampp\htdocs\BookMart\public\assets\uploads\evidence_docs' .'\\' . basename($filename); 

        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit;
        } else {
            echo "File not found.";
        }
    }
}
