<?php

class Payroll {

    use Model;

    protected $table = 'payroll';

    protected $allowedColumns = [
        'id',
        'payee_id',
        'order_id',
        'payment_id',
        'transaction_type',
        'gross_amount',
        'system_fee',
        'net_amount',
        'bank',
        'branch_name',
        'account_number',
        'account_name',
        'payment_date',
        'settlement_status',
        'settlement_date'
    ];

    public function addPayRoll($orderId){

        $ordersModel = new Order();
        $userModel = new UserModel();
        $paymentModel = new PaymentInfo();
        $bookstoreModel = new BookStore();
        $booksellerModel = new BookSeller();
        $courierModel = new Courier();
        $systemStatModel = new SystemStats();

        $order = $ordersModel->first(['order_id' => $orderId]);
        $courier = $courierModel->first(['user_id' => $order->courier_id]);
        $payment = $paymentModel->first(['order_id' => $orderId ]);

        if($userModel->getRole($order->seller_id) == 'bookStore'){
            $seller = $bookstoreModel->first(['user_id' => $order->seller_id]);
        }
        else{
            $seller =  $booksellerModel->first(['user_id' => $order->seller_id]);
        }

        $systemStats = $systemStatModel->first(['id' => 1 ]);
        $systemFeePercentageForDeliveries = $systemStats->systemfee_add ? ($systemStats->systemfee_add)/100 : 0.1;
        $systemFeePercentageForBooks = $systemStats->systemfee_book ? ($systemStats->systemfee_book)/100 : 0.1;

        $courierData = [
            'payee_id' => $courier->user_id,
            'order_id' => $orderId,
            'payment_id' => $payment->payment_id,
            'transaction_type' => 'delivery',
            'gross_amount' => $order->delivery_fee,
            'system_fee' => ($order->delivery_fee * $systemFeePercentageForDeliveries),
            'net_amount' => $order->delivery_fee - $order->delivery_fee * $systemFeePercentageForDeliveries,
            'bank' => $courier->bank,
            'branch_name' => $courier->branch_name,
            'account_number' => $courier->account_number,
            'account_name' => $courier->account_name,
            'payment_date' => $payment->payment_date
        ]; 

        $this->insert($courierData);

        $systemFeeforseller = (($order->total_amount - $order->delivery_fee)* $systemFeePercentageForBooks);

        $sellerData = [
            'payee_id' => $seller->user_id,
            'order_id' => $orderId,
            'payment_id' => $payment->payment_id,
            'transaction_type' => 'book',
            'gross_amount' => $order->total_amount - $order->delivery_fee,
            'system_fee' => $systemFeeforseller,
            'net_amount' =>$order->total_amount - $order->delivery_fee - $systemFeeforseller,
            'bank' => $seller->bank,
            'branch_name' => $seller->branch_name,
            'account_number' => $seller->account_number,
            'account_name' => $seller->account_name,
            'payment_date' => $payment->payment_date
        ];

        $this->insert($sellerData);

    }


}
