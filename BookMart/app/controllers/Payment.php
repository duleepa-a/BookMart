<?php

require 'BookView.php';

class Payment extends Controller{

    public function index(){
        
    }
    public function checkOut($bookId, $qty) {

        $bookModel = new BookModel();
        $buyerModel = new BuyerModel();
        $sellerModel = new BookSeller();
        $bookstoreModel = new BookStore(); 
        $userModel = new UserModel(); 
        $couponModel = new CouponModel();
    
        $book = $bookModel->first(['id' => $bookId]);
        $buyerId= $_SESSION['user_id'];

        if($userModel->getRole($buyerId) == 'buyer'){
            $buyer = $buyerModel->first(['user_id' => $buyerId]);
        }
        else{
            $buyer = $sellerModel->first(['user_id' => $buyerId]);
        }

        if($userModel->getRole($book->seller_id) == 'bookStore'){
            $seller = $bookstoreModel->first(['user_id' => $book->seller_id]);
        }
        else{
            $seller =  $sellerModel->first(['user_id' => $book->seller_id]);
        }

        $couponMessage="";

        if (isset($_GET['coupon'])) {
            $code = trim($_GET['coupon']);
            $coupon = $couponModel->getCouponValid($code,$book->seller_id);
        
            if ($coupon) {
                $book->discount = $coupon->discount_percentage;
                $couponMessage = "Coupon applied! {$book->discount}% discount.";
            } else {
                $couponMessage = "Invalid or expired coupon.";
            }
        }
        
        
        $discount = ($book->discount / 100) * $book->price;
        $discountedPrice = $book->price - $discount;
        $totalPrice = $discountedPrice * $qty;

        $book->seller_name = $userModel->first(['id' => $book->seller_id])->username;

        $data = [
            'book' => $book,
            'buyer' => $buyer,
            'quantity' => $qty,
            'discount' => $discount,
            'discountedPrice' => $discountedPrice,
            'couponMessage' => $couponMessage,
            'totalPrice' => $totalPrice,
            'deliveryFee' => 250,
        ];

        $orderdetails = [
            'book_id' => $bookId,
            'buyer_id' => $_SESSION['user_id'],
            'quantity' => $qty,
            'discount' => $book->discount,
            'item_discount' => $discount,
            'discounted_Price' => $discountedPrice,
            'street_address'=> $buyer->street_address,
            'pickup_location' => $seller->street_address,
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
            'discount_applied' => $orderdetails['item_discount'],
            'total_amount' => $totalPrice + $orderdetails['deliveryFee'],
            'shipping_address' => $orderdetails['street_address'],
            'pickup_location' => $orderdetails['pickup_location'],
            'province' => $orderdetails['province'],
            'district' => $orderdetails['district'],
            'city' => $orderdetails['city'],
        ];
        $insertedorder=$orderModel->insert($orderData);
        
        $orderId = $insertedorder->order_id;
    
        $paymentModel = new PaymentInfo();
        $paymentData = [
            'order_id' => $orderId,
            'payment_amount' => $orderData['total_amount']
        ];
        $payment=$paymentModel->insert($paymentData);


        $userModel = new UserModel(); 
        if ($userModel->getRole($book->seller_id) == 'bookSeller') {
            $bookModel = new BookModel();
            $bookModel->update($book->id, ['status' => 'removed']);
        }

        $notificationModel = new NotificationModel();
            $notificationModel->createNotification(
            trim($orderData['seller_id']),
            'Order Placed',
            'A new order has been placed for the book ' . trim($book->title) . '.',
            '/bookstoreController/orderView/' . $orderId,
        );
        
    
        $this->view('paymentSuccess',['payment' => $payment]);
    }
    
    public function cancel() {
       $this->view('paymentCancel');
    }
    public function process() {
        $secretKey = STRIPE_SECRET_KEY; //Stripe Secret Key
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

    public function addToCart($bookId,$bookQuantity) {
        $quantity = $bookQuantity ?? 1;
        $bookModel = new BookModel();
        $book = $bookModel->first(['id' => $bookId]);

        $sellerm = new UserModel;
        $seller= $sellerm->first(['id' => $book->seller_id]);

        $book->seller_name = $seller->username;

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$bookId])) {
            $_SESSION['cart'][$bookId]['quantity'] += $quantity;
        } else {

            if ($book) {
                $discountedPrice = $book->price - ($book->price * $book->discount / 100);

                $_SESSION['cart'][$bookId] = [
                    'book_id' => $bookId,
                    'title' => $book->title,
                    'price' => $discountedPrice,
                    'original_price' => $book->price,
                    'discount' => $book->discount,
                    'quantity' => $quantity,
                    'max_quantity'=>$book->quantity,
                    'cover_image' => $book->cover_image,
                    'seller_username' => $book->seller_name
                ];
            }
        }

        if($_SESSION['cart'][$bookId]['quantity'] >= $book->quantity){
            $_SESSION['cart'][$bookId]['quantity'] = $book->quantity;
        }

        $this->cartView();
    }

    public function cartView(){
        $this->view('cart',['cart'=> $_SESSION['cart'] ?? []]);
    }

    public function cartCheckout() {
        $secretKey = STRIPE_SECRET_KEY;
        $cart = $_SESSION['cart'] ?? [];
    
        if (empty($cart)) {
            echo "Cart is empty.";
            return;
        }
    
        $lineItems = [];
        $totalAmount = 0;
    
        foreach ($cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'lkr',
                    'product_data' => ['name' => $item['title']],
                    'unit_amount' => $item['price'] * 100, 
                ],
                'quantity' => $item['quantity'],
            ];
            $totalAmount += $item['price'] * $item['quantity'];
        }
    
        $fields = [
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => ROOT . '/payment/cartSuccess',
            'cancel_url' => ROOT . '/payment/cancel',
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
        
        $session = json_decode($response);
        
        if (isset($session->url)) {
            header("Location: " . $session->url);
            exit;
        } else {
            echo "Failed to create Stripe session.";
        }
    }
    
    public function cartSuccess() {
        if (!isset($_SESSION['cart'])) {
            echo "No cart found!";
            return;
        }
    
        $cart = $_SESSION['cart'];
        $buyerId = $_SESSION['user_id'];
    
        $buyerModel = new BuyerModel();
        $bookModel = new BookModel();
        $orderModel = new Order();
        $paymentModel = new PaymentInfo();
        $sellerModel = new BookSeller();
        $bookstoreModel = new BookStore(); 
        $userModel = new UserModel(); 
        
        if($userModel->getRole($buyerId) == 'buyer'){
            $buyer = $buyerModel->first(['user_id' => $buyerId]);
        }
        else{
            $buyer = $sellerModel->first(['user_id' => $buyerId]);
        }
    
        foreach ($cart as $item) {
            $bookId = $item['book_id'];
            $book = $bookModel->first(['id' => $bookId]);
    
            if (!$book) continue;

            if($userModel->getRole($book->seller_id) == 'bookStore'){
                $seller = $bookstoreModel->first(['user_id' => $book->seller_id]);
            }
            else{
                $seller =  $sellerModel->first(['user_id' => $book->seller_id]);
            }
    
            $discountedPrice = $item['price'];
            $quantity = $item['quantity'];
            $totalAmount = $discountedPrice * $quantity;
            $deliveryFee = 250;
    
            // Reduce book stock
            $bookModel->update($bookId, [
                'quantity' => max(0, $book->quantity - $quantity)
            ]);
    
            // Insert order
            $orderData = [
                'buyer_id' => $buyerId,
                'book_id' => $bookId,
                'seller_id' => $book->seller_id,
                'order_status' => 'pending',
                'payment_status' => 'successful',
                'quanitity' => $quantity,
                'delivery_fee' => $deliveryFee,
                'discount_applied' => $item['original_price'] - $item['price'],
                'total_amount' => $totalAmount + $deliveryFee,
                'shipping_address' => $buyer->street_address,
                'pickup_location' => $seller->street_address,
                'province' => $buyer->province,
                'district' => $buyer->district,
                'city' => $buyer->city,
            ];
    
            $order=$orderModel->insert($orderData);            

            $payment=$paymentModel->insert([
                'order_id' => $order->order_id,
                'payment_amount' => $orderData['total_amount']
            ]);
        }
        unset($_SESSION['cart']);
    
        $this->view('paymentSuccess',['payment' => $payment]);
    }
    
    public function increase($bookId,$quantity){
        if (isset($_SESSION['cart'][$bookId])) {

            if($_SESSION['cart'][$bookId]['quantity'] + 1 <= $quantity){
                $_SESSION['cart'][$bookId]['quantity'] += 1;
            };
        }
        $this->cartView();
    }
    
    public function decrease($bookId) {
        if (isset($_SESSION['cart'][$bookId])) {
            $_SESSION['cart'][$bookId]['quantity'] -= 1;
            if ($_SESSION['cart'][$bookId]['quantity'] <= 0) {
                unset($_SESSION['cart'][$bookId]);
            }
        }
        $this->cartView();
    }

    public function deleteSelected() {
        if (!empty($_POST['book_ids'])) {
            foreach ($_POST['book_ids'] as $bookId) {
                unset($_SESSION['cart'][$bookId]);
            }
        }
        $this->cartView();
    }

    public function clear() {
        unset($_SESSION['cart']);
        $this->cartView();
    }

    public function removeBook($bookId){
        unset($_SESSION['cart'][$bookId]);
        $this->cartView();
    }

    public function adSuccess(){
        $adId = $_GET['ad_id'] ?? null;
        $amount = $_GET['amount'] ?? null;

        if ($adId) {
            $advModel = new StoreAdvModel();
            $paymentModel = new PaymentInfo();
            
            $advModel->update($adId, ['active_status' => 1]);


            $paymentData = [
                'ad_id' => $adId,
                'payment_amount' => $amount,
                'type' => 'advertisment'
            ];

            $payment = $paymentModel->insert($paymentData);
            
            $this->view('paymentSuccess',['payment' => $payment]);
        } else {
            echo "Invalid ad reference.";
        }
    }


    public function payAd(){
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['ad_id'], $_POST['amount'])) {
            echo "Invalid payment request.";
            return;
        }

        $adId = $_POST['ad_id'];
        $amount = floatval($_POST['amount']);
        $secretKey = STRIPE_SECRET_KEY;

        if ($amount <= 0) {
            echo "Invalid payment amount.";
            return;
        }

        $lineItems = [[
            'price_data' => [
                'currency' => 'lkr',
                'product_data' => ['name' => "Advertisement ID #$adId"],
                'unit_amount' => $amount * 100, // Stripe uses cents
            ],
            'quantity' => 1,
        ]];

        $fields = [
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => ROOT . "/payment/adSuccess?ad_id=$adId&amount=$amount",
            'cancel_url' => ROOT . "/payment/cancel",
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

        $session = json_decode($response);

        if (isset($session->url)) {
            header("Location: " . $session->url);
            exit;
        } else {
            echo "Failed to create Stripe session for advertisement.";
        }
    }

}
