<?php

class Admin extends Controller {

    public function bookstoreView() {
        $bookstore = new BookStore();
    

        $pendingPage = isset($_GET['pending_page']) ? (int)$_GET['pending_page'] : 1;
        $acceptedPage = isset($_GET['accepted_page']) ? (int)$_GET['accepted_page'] : 1;
        $tab = isset($_GET['tab']) ? $_GET['tab'] : 'pending-stores';
        $limit = 5; // Items per page


        $offset = ($pendingPage - 1)*$limit;
        $bookstore->setLimit($limit);
        $bookstore->setOffset($offset);
    
        // Get pending stores with pagination
        $pendingConditions = ['status' => 'pending'];
        $pendingStores = $bookstore->where($pendingConditions);
        $totalPending = $bookstore->count($pendingConditions);
        $totalPendingPages = ceil($totalPending / $limit);
        
        $acceptedBookstore = new BookStore();
        $acceptedoffset = ($acceptedPage - 1)*$limit;
        $acceptedBookstore->setOffset($offset);
        $acceptedBookstore->setLimit($limit);

        // Get accepted stores with pagination
        $acceptedConditions = ['status' => 'approved'];
        $acceptedStores = $acceptedBookstore->where($acceptedConditions);
        $totalAccepted = $acceptedBookstore->count($acceptedConditions);
        $totalAcceptedPages = ceil($totalAccepted / $limit);
    
        $data = [

            'pendingStores' => $pendingStores,
            'acceptedStores' => $acceptedStores,
            // Pagination for pending stores
            'pendingPage' => $pendingPage,
            'totalPendingPages' => $totalPendingPages,
            // Pagination for accepted stores
            'acceptedPage' => $acceptedPage,
            'totalAcceptedPages' => $totalAcceptedPages,
            // Counts
            'totalPending' => $totalPending,
            'totalAccepted' => $totalAccepted,
            'tab' => $tab
        ]; 
    
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

    public function viewCourier($id) {
        
        $courierModel = new Courier();
        $courier = $courierModel->first(["user_id" => $id]);
    
        if ($courier) {
            $this->view('courierDetails', ['courier' => $courier]);
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

        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        
        $email = $bookstore->owner_email;
        $subject = "Your BookMart Registration Has Been Approved";

        $message = "
        Dear ".$bookstore->owner_name.",

        We are pleased to inform you that your registration request to join BookMart has been successfully approved.

        You can now log in to your account using the credentials you provided during registration. Simply visit our login page and enter your email and password to access your bookstore dashboard.

        From your dashboard, you’ll be able to:
        - Add and manage your book listings
        - View and handle orders
        - Post advertisements
        - Track sales and performance

        If you encounter any issues logging in or have questions about using the platform, feel free to reach out to our support team at bookmart.info.lk@gmail.com 

        Welcome to the BookMart community—we're excited to have you on board!

        Best regards,
        BookMart Team
        ";


        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'duleepa24@gmail.com';
            $mail->Password = 'dnbzkaydjffxlrkx';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('duleepa24@gmail.com', 'BookMart');
            $mail->addAddress($email);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            $_SESSION['message'] = 'Email sent successfully!';
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            $_SESSION['message'] = 'Mailer Error: ' . $mail->ErrorInfo;
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

    public function payRolls() {
        $refundModel = new RefundRequest();
        $payrollModel = new payRoll();

        $tab = isset($_GET['tab']) ? $_GET['tab'] : 'new-add';
    
        // Common pagination parameters
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $refundPage = isset($_GET['refund_page']) ? (int)$_GET['refund_page'] : 1;
        $limit = 5;
        
        // Handle Payrolls tab
        $payrollOffset = ($currentPage - 1) * $limit;
        $payrollModel->setLimit($limit);
        $payrollModel->setOffset($payrollOffset);
    
        $payrollFilterStatus = isset($_GET['status']) ? $_GET['status'] : 'all';
        $baseConditions = [];
        
        if ($payrollFilterStatus !== 'all') {
            $baseConditions['settlement_status'] = $payrollFilterStatus;
            $allPayrolls = $payrollModel->where($baseConditions);
            $totalPayrolls = $payrollModel->count($baseConditions);
        } else {
            $allPayrolls = $payrollModel->findAll();
            $totalPayrolls = $payrollModel->countAll();
        }
        
        $totalPayrollPages = ceil($totalPayrolls / $limit);
    
        // Handle Refund Requests tab
        $refundOffset = ($refundPage - 1) * $limit;
        $refundModel->setLimit($limit);
        $refundModel->setOffset($refundOffset);
    
        $refundFilterStatus = isset($_GET['refund_status']) ? $_GET['refund_status'] : 'all';
        $refundConditions = [];
        
        if ($refundFilterStatus !== 'all') {
            $refundConditions['status'] = $refundFilterStatus;
            $refunds = $refundModel->where($refundConditions);
            $totalRefunds = $refundModel->count($refundConditions);
        } else {
            $refunds = $refundModel->findAll();
            $totalRefunds = $refundModel->countAll();
        }
        
        $totalRefundPages = ceil($totalRefunds / $limit);
    
        $this->view('adminPayRoll', [
            'payrolls' => $allPayrolls,
            'refundRequests' => $refunds,
            'currentPage' => $currentPage,
            'refundPage' => $refundPage,
            'totalPayrollPages' => $totalPayrollPages,
            'totalRefundPages' => $totalRefundPages,
            'filterStatus' => $payrollFilterStatus,
            'refundFilterStatus' => $refundFilterStatus,
            'totalPayrolls' => $totalPayrolls,
            'totalRefunds' => $totalRefunds,
            'tab' => $tab
        ]);
    }

    public function markAsResolve($id){
        $payrollModel = new payRoll();
        $payrollModel->update($id, ['settlement_status' => 'paid',
                                    'settlement_date' => date('Y-m-d H:i:s')
                                    ]);
            
        $this->payRolls();

    }

    public function settleAllPayrolls(){
        $data = json_decode(file_get_contents("php://input"), true);

        if (!isset($data['payrollIds']) || !is_array($data['payrollIds'])) {
            echo json_encode(['success' => false, 'message' => 'Invalid data']);
            return;
        }

        $payrollModel = new payRoll();

        foreach ($data['payrollIds'] as $id) {
            $payrollModel->update($id, [
                'settlement_status' => 'paid',
                'settlement_date' => date('Y-m-d H:i:s')
            ]);
        }

        $_SESSION['success'] = "successfully updated settled!";

        echo json_encode(['success' => true]);
    }


    public function addRefund(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          
            $orderId = htmlspecialchars(trim($_POST['order_id']));
            $payeeId = htmlspecialchars(trim($_POST['payee_id']));
            $bank = htmlspecialchars(trim($_POST['bank']));
            $branch_name = htmlspecialchars(trim($_POST['branch_name']));
            $account_number = htmlspecialchars(trim($_POST['account_number']));
            $account_name = htmlspecialchars(trim($_POST['account_name']));

            $payrollModel = new payRoll();
            $ordersModel = new Order();
            $userModel = new UserModel();
            $paymentModel = new PaymentInfo();
            $buyerModel = new BuyerModel();
            $booksellerModel = new BookSeller();
            $courierModel = new Courier();
    
            $order = $ordersModel->first(['order_id' => $orderId]);
            $courier = $courierModel->first(['user_id' => $order->courier_id]);
            $payment = $paymentModel->first(['order_id' => $orderId ]);

            if($order->buyer_id != $payeeId){
                $_SESSION['error'] = "Buyer ID doesn't smatch";
                return;
            }
    
            if($userModel->getRole($order->buyer_id) == 'buyer'){
                $buyer = $buyerModel->first(['user_id' => $order->buyer_id]);
            }
            else{
                $buyer =  $booksellerModel->first(['user_id' => $order->buyer_id]);
            }

            $systemFeeforbuyer =($order->total_amount - $order->delivery_fee)*0.1 ;
            
            $Data=[
                'payee_id' => $buyer->user_id,
                'order_id' => $orderId,
                'payment_id' => $payment->payment_id,
                'transaction_type' => 'refund',
                'gross_amount' => $order->total_amount - $order->delivery_fee,
                'system_fee' => $systemFeeforbuyer,
                'net_amount' =>$order->total_amount - $order->delivery_fee - $systemFeeforbuyer,
                'bank' => $bank,
                'branch_name' => $branch_name,
                'account_number' => $account_number,
                'account_name' => $account_name,
                'payment_date' => $payment->payment_date
            ];
    
            $payrollModel->insert($Data);
            $payrollId = $payrollModel->first(['payee_id' => $order->seller_id ,'order_id' => $orderId ]);

            $payrollModel->delete($payrollId);
        
            $ordersModel->update($orderId,[
                'order_status' => 'canceled' ,
                'canceled_date' => date('Y-m-d H:i:s'),
                'payment_status' => 'refunded'
              ]);
        }
        
        $this->payRolls();
    }

    public function updateRefundStatus(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reqId = htmlspecialchars(trim($_POST['id']));
            $status = htmlspecialchars(trim($_POST['action']));

            $refundModel = new RefundRequest();

            $refundModel->update($reqId,[ 'status' => $status ]);
            
            $this->payRolls();
            
        }
    }

    public function deleteRefundRequest(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $reqId = htmlspecialchars(trim($_POST['id']));

            $refundModel = new RefundRequest();

            $refundModel->delete($reqId);   
            $this->payRolls();
        }
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

    public function downloadCourierDoc($filename = '') {
        $filepath = 'C:\xampp\htdocs\BookMart\public\assets\uploads\courier_docs' .'\\' . basename($filename); 

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

    public function downloadRefundEvdience($filename = '') {
        $filepath = 'C:\xampp\htdocs\BookMart\public\assets\uploads\refunds' .'\\' . basename($filename); 

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
