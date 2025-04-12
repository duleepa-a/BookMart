<?php

require 'BookView.php';

class Payment extends Controller{

    public function index(){
        
    }
    public function checkOut($bookId, $qty) {

        $bookModel = new BookModel();
        $buyerModel = new BuyerModel(); 
    
        $book = $bookModel->first(['id' => $bookId]);
        $buyer = $buyerModel->first(['user_id' => $_SESSION['user_id']]);
    
        
        $discount = ($book->discount / 100) * $book->price;
        $discountedPrice = $book->price - $discount;
        $totalPrice = $discountedPrice * $qty;
        
        $data = [
            'book' => $book,
            'buyer' => $buyer,
            'quantity' => $qty,
            'discount' => $discount,
            'discountedPrice' => $discountedPrice,
            'totalPrice' => $totalPrice,
            'deliveryFee' => 250,
        ];

        $orderdetails = [
            'book_id' => $bookId,
            'buyer_id' => $_SESSION['user_id'],
            'quantity' => $qty,
            'discount' => $book->discount,
            'discounted_Price' => $discountedPrice,
            'street_address'=> $buyer->street_address,
            'city'=>$buyer->city,
            'province'=>$buyer->province,
            'district'=>$buyer->district,
            'deliveryFee' => 250,
        ];

        $_SESSION['order_details']= $orderdetails;
    
        $this->view('checkout', $data);
    }
    public function success() {

        // Retrieve order details from session
        if (!isset($_SESSION['order_details'])) {
            echo "Error: Order details not found.";
            return;
        }

        $orderdetails = $_SESSION['order_details'];
    
        // Get book details
        $bookId = $orderdetails['book_id'];
        $bookModel = new BookModel();
        $book = $bookModel->first(['id' => $bookId]);

        $discountedPrice = $orderdetails['discounted_Price'];
        $totalPrice = $discountedPrice * $orderdetails['quantity'];
    
        if (!$book) {
            echo "<h2>Error!</h2>";
            echo "<p>Book not found.</p>";
            return;
        }
    
        $newQty = $book->quantity - $orderdetails['quantity'];
        $bookData = ['quantity' => max(0, filter_var(trim($newQty), FILTER_VALIDATE_INT))];
        $bookModel->update($bookId, $bookData);
    
        $orderModel = new Order();
        $orderData = [
            'buyer_id' => $orderdetails['buyer_id'],
            'book_id' => $bookId,
            'seller_id'=> $book->seller_id,
            'order_status' => 'pending',
            'payment_status' => 'successful',
            'quanitity' => $orderdetails['quantity'],
            'delivery_fee' => $orderdetails['deliveryFee'],
            'discount_applied' => $orderdetails['discount'],
            'total_amount' => $totalPrice + $orderdetails['deliveryFee'],
            'shipping_address' => $orderdetails['street_address'],
            'province' => $orderdetails['province'],
            'district' => $orderdetails['district'],
            'city' => $orderdetails['city'],
        ];
        $orderModel->insert($orderData);
        
        $orderId = $orderModel->first(['buyer_id' => $orderdetails['buyer_id'] , 'order_status' => 'pending'])->order_id;
    
        $paymentModel = new PaymentInfo();
        $paymentData = [
            'order_id' => $orderId,
            'payment_amount' => $orderData['total_amount']
        ];
        $paymentModel->insert($paymentData);
    
        echo "<h2>Payment Successful!</h2>";
        echo "<p>Thank you for your purchase.</p>";
    }
    
    public function cancel() {
        echo "<h2>Payment Canceled</h2>";
        echo "<p>Your payment was not completed. Please try again.</p>";
    }
    public function process() {
        $secretKey = 'sk_test_51QwNzUFwD7Ut7Vs9FPBW5K38e9dwzqBJs8FvydvTKar0oCVaHKBiogjJxJsUdvs39C5WuDU05Xk8wuWE42pCgaRg002dFEvGvW'; //Stripe Secret Key
        header('Content-Type: application/json');

        $input = json_decode(file_get_contents('php://input'), true);
        $amount = $input['amount']; 
        $bookTitle = $input['book_title'];

        $fields = [
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'lkr', 
                    'product_data' => [
                        'name' => $bookTitle,
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => ROOT . '/Payment/success',
            'cancel_url' => ROOT . '/Payment/cancel',
        ];

        $ch = curl_init('https://api.stripe.com/v1/checkout/sessions');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $secretKey,
            'Content-Type: application/x-www-form-urlencoded',
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));

        $response = curl_exec($ch);
        curl_close($ch);

        echo $response;
    }



}
