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

    public function payRolls(){
        $payrollModel = new payRoll();
        
        $payrolls = $payrollModel->findall();
        
        $this->view('adminPayRoll',[ 'payrolls' => $payrolls ]);
    }

    public function markAsResolve($id){
        $payrollModel = new payRoll();
        $payrollModel->update($id, ['settlement_status' => 'paid',
                                    'settlement_date' => date('Y-m-d H:i:s')
                                    ]);
            
        $this->payRolls();

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
}
