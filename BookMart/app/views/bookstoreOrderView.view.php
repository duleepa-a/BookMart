<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Order Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreOrderView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Page Title -->
        <h2 class="page-title"><i class="fas fa-box"></i>Order Details</h2>
        
        <!-- Breadcrumb -->
        <ul class="breadcrumb">
            <li>Order #<?= $order->order_id ?></li>
        </ul>
        
        <!-- First Row: Book Details and Order Summary -->
        <div class="row">
            <!-- Book Details Card -->
            <div class="col col-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Order #<?= $order->order_id ?></h3>
                        <div>
                            <?php 
                            $statusClass = '';
                            switch($order->order_status) {
                                case 'pending': $statusClass = 'status-pending'; break;
                                case 'accepted': $statusClass = 'status-success'; break;
                                case 'shipping': $statusClass = 'status-success'; break;
                                case 'completed': $statusClass = 'status-delivered'; break;
                                case 'cancelled': $statusClass = 'status-cancelled'; break;
                                default: $statusClass = '';
                            }
                            ?>
                            <span class="status-badge <?= $statusClass ?>">
                                <?= ucfirst($order->order_status) ?>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Book Information -->
                    <div class="book-card">
                        <img src="<?= ROOT?>/assets/Images/book cover images/<?= $book->cover_image ?>" alt="<?= $book->title ?>" class="book-image">
                        <div class="book-details">
                            <h4 class="book-title"><?= $book->title ?></h4>
                            <p class="book-author">by <?= $book->author ?></p>
                            
                            <div class="info-grid">
                                <div class="info-item">
                                    <span class="info-label">ISBN</span>
                                    <span class="info-value"><?= $book->ISBN ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Genre</span>
                                    <span class="info-value"><?= $book->genre ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Publisher</span>
                                    <span class="info-value"><?= $book->publisher ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Language</span>
                                    <span class="info-value"><?= $book->language ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Condition</span>
                                    <span class="info-value"><?= $book->book_condition ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Quantity</span>
                                    <span class="info-value"><?= $order->quanitity ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary Card -->
            <div class="col col-2">
                <div class="card">
                    <h3 class="card-title"><i class="fas fa-receipt"></i> Order Summary</h3>
                    
                    <table class="summary-table">
                        <tbody>
                            <tr>
                                <td>Date Placed</td>
                                <td><?= date('M d, Y', strtotime($order->created_on)) ?></td>
                            </tr>
                            <tr>
                                <td>Payment Status</td>
                                <td>
                                    <span class="status-badge <?= $order->payment_status == 'successful' ? 'status-delivered' : 'status-cancelled' ?>">
                                        <?= ucfirst($order->payment_status) ?>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                            <?php if ($order->discount_applied > 0) {
                                    $book->price = $book->price - ($book->price * $order->discount_applied /100);
                                }
                            ?>
                                <td>Item Price</td>
                                <td>Rs. <?= number_format($book->price, 2) ?></td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td><?= $order->discount_applied ?? 0.0 ?>%</td>
                            </tr>
                            <tr>
                                <td>Delivery Fee</td>
                                <td>Rs. <?= $order->delivery_fee ?></td>
                            </tr>
                            <tr>
                                <td><strong>Total Amount</strong></td>
                                <td><strong>Rs. <?= number_format($order->total_amount, 2) ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Second Row: Buyer Information and Courier Information -->
        <div class="row">
            <!-- Buyer Information Card -->
            <div class="col col-2">
                <div class="card">
                    <h3 class="card-title"><i class="fas fa-user"></i> Buyer Information</h3>
                    
                    <div class="info-item">
                        <span class="info-label">Customer Name</span>
                        <span class="info-value"><?= $buyer->full_name ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Phone Number</span>
                        <span class="info-value"><?= $buyer->phone_number ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Shipping Address</span>
                        <span class="info-value">
                            <?= $order->shipping_address ?><br>
                            <?= $order->city ?>, <?= $order->district ?><br>
                            <?= $order->province ?>
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Courier Information Card -->
            <div class="col col-2">
                <div class="card">
                    <h3 class="card-title"><i class="fas fa-truck"></i> Courier Information</h3>
                    
                    <?php if($order->courier_id && isset($courier)): ?>
                    <div class="info-item">
                        <span class="info-label">Courier Name</span>
                        <span class="info-value"><?= $courier->first_name ?> <?= $courier->last_name ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Courier Phone</span>
                        <span class="info-value"><?= $courier->phone_number ?></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Vehicle</span>
                        <span class="info-value"><?= $courier->vehicle_type ?> - <?= $courier->vehicle_model ?></span>
                    </div>
                    <?php else: ?>
                    <div class="full-size-item">
                        <p class="text-muted">No courier assigned yet.</p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if($order->order_status == 'pending' && $order->courier_id): ?>
            <div class="card">
                <h5 class="card-title">Pickup Confirmation</h5>
                <div class="row">
                    <div class="col col-2">
                        <div class="form-group">
                            <label for="pickupCode" class="form-label">Enter Pickup Code:</label>
                            <input type="text" class="form-control" id="pickupCode" placeholder="Enter code provided by courier">
                        </div>
                    </div>
                    <div class="col col-2" style="display: flex; align-items: flex-end; justify-content: flex-end;">
                        <button type="button" class="btn" onclick="confirmPickup(<?= $order->order_id ?>)">
                            Confirm Pickup
                        </button>
                    </div>
                </div>
                <div id="pickupMessage"></div>
            </div>
        <?php elseif($order->order_status == 'shipping'): ?>
                <div class="alert alert-success">
                    <h5>Pickup Confirmed</h5>
                    <p>This order was picked up by the courier on 
                        <?= $order->shipped_date ? date('F j, Y, g:i a', strtotime($order->shipped_date)) : 'N/A' ?>
                    </p>
                </div>
        <?php endif; ?>

        <!-- Order Timeline -->
        <div class="card">
            <h5 class="card-title">Order Timeline</h5>
            <ul class="timeline">
                <li class="timeline-item">
                    Order Placed
                    <span class="timeline-badge"><?= date('F j, Y', strtotime($order->created_on)) ?></span>
                </li>
                <?php if($order->order_status == 'shipping' || $order->order_status == 'completed'): ?>
                <li class="timeline-item">
                    Package Picked Up
                    <span class="timeline-badge">
                        <?= $order->shipped_date ? date('F j, Y', strtotime($order->shipped_date)) : 'N/A' ?>
                    </span>
                </li>
                <?php endif; ?>

                <?php if($order->order_status == 'completed'): ?>
                <li class="timeline-item">
                    Delivered
                    <span class="timeline-badge">
                        <?= $order->completed_date ? date('F j, Y', strtotime($order->completed_date)) : 'N/A' ?>
                    </span>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="card-footer" style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px;">
            <a href="<?=ROOT?>/BookstoreController/orders" class="btn btn-secondary">Back to All Orders</a>
        </div>
       
    </div>

    <script>
        function confirmPickup(orderId) {
            const pickupCode = document.getElementById('pickupCode').value;
            const messageDiv = document.getElementById('pickupMessage');
            
            if (!pickupCode) {
                messageDiv.innerHTML = '<div class="alert alert-danger">Please enter the pickup code provided by the courier.</div>';
                return;
            }
            
            // AJAX request to verify code and update status
            fetch('<?=ROOT?>/BookstoreController/confirmPickup', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    order_id: orderId,
                    pickup_code: pickupCode
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messageDiv.innerHTML = '<div class="alert alert-success">Pickup confirmed successfully!</div>';
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                } else {
                    messageDiv.innerHTML = `<div class="alert alert-danger">${data.message || 'Invalid pickup code. Please try again.'}</div>`;
                }
            })
            .catch(error => {
                messageDiv.innerHTML = '<div class="alert alert-danger">There was an error processing your request. Please try again.</div>';
                console.error('Error:', error);
            });
        }
    </script>
</body>
</html>