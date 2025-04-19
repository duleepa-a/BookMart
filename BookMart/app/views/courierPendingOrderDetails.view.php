<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Available Orders</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierOrderDetails.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <?php include 'courierNavbar.view.php'; ?> 
    <main>
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()" >&times;</span>

            <?php if(!empty($orders)): ?>
                <?php foreach ($orders as $orderOne ): ?>
                    <?php if ($buyer && is_array($buyer)) : ?>
                        <?php foreach ($buyer as $buyerOne): ?>
            

                <form id="courierOrderDetails" action="<?= ROOT ?>/CourierPendingOrderDetails/update" enctype="multipart/form-data" method="POST">

                <h3>Order ID: <input type="text" name="order_id" id="order_id" value="<?= $orderOne->order_id ?>"  readonly></h3>
        
                <label>Pickup Location:</label>
                <input type="text" name="pickup_location" id="pickup_location" value="<?= $orderOne->pickup_location ?>" readonly>

                <label>Delivery Location:</label>
                <input type="text" name="shipping_address" id="shipping_address" value="<?= $orderOne->shipping_address ?>" readonly>

                <label>Customer Name:</label>
                <input type="text" id="full_name" value="<?= $buyerOne->full_name ?> " readonly>

                <label>Contact Number:</label>
                <input type="text" id="phone_number" value="<?= $buyerOne->phone_number ?> " readonly>

                <label>Payment Amount:</label>
                <input type="text" id="total_amount" value="<?= $orderOne->total_amount ?>" readonly>

                <label>Estimated Distance:</label>
                <input type="text" name="distance" id="distance" value="<?= $orderOne->estimate_distance ?>" readonly>

                <label>Delivery Timeframe:</label>
                <input type="text" name="timeframe" id="timeframe" value="<?= $orderOne->canceled_date ?>" readonly>
                
                <button type="submit" class="accept-button">Completed</button>

                <?php endforeach; ?>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php else: ?>
                    <p>No orders</p>
                <?php endif; ?>
            </form>
        </div>
    </div>


    </main>

    <script src="<?= ROOT ?>/assets/JS/courierOrderDetails.js"></script>
</body>
</html>