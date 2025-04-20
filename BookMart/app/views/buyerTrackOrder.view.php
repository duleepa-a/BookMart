<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/buyerTrackOrder.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Track Order - BookMart</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>        
    <!-- navBar division end -->
    <div class="sidebar">
        <h3 class="sidebar-heading">Welcome back,<br><?= $_SESSION['full_name'] ?? 'User' ?></h3>
        <ul>
            <li><a href="<?= ROOT ?>/buyer/orders" class="active"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/buyer/reviews"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/buyer/myProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <?php
        if($order->order_status == 'pending' && !empty($order->courier_id)){
            $order->order_status = "courier assigned";
        }
    ?>
    <div class="container">
        <div class="tracking-container">
            <div class="header">
                <div class="order-info">
                    <h2>Order #<?= $order->order_id ?></h2>
                    <div class="order-meta">
                        <span class="tag tag-<?= strtolower(str_replace(' ', '-', $order->order_status)) ?>">
                            <?= $order->order_status ?>
                        </span>
                        <span class="tag tag-<?= strtolower(str_replace(' ', '-', $order->payment_status)) ?>">
                            <?= $order->payment_status ?>
                        </span>
                        <p>Ordered on: <?= date('d M Y', strtotime($order->created_on)) ?></p>
                    </div>
                </div>
                <div class="tracking-number">
                    <h4>Tracking Number</h4>
                    <p><?= $order->order_id ?> <i class="fas fa-copy copy-id" data-id="<?= $order->order_id ?>"></i></p>
                </div>
            </div>
            <div class="status-container">
                <?php

                $statuses = [
                    'pending' => 'fa-spinner',
                    'courier assigned' => 'fa-user-check',
                    'shipping' => 'fa-truck',
                    'completed' => 'fa-check-circle',
                    'reviewed' => 'fa-check-circle',
                ];

                
                $currentStatusIndex = array_search($order->order_status, array_keys($statuses));
                if ($currentStatusIndex === false) $currentStatusIndex = 0;
                
                $i = 0;
                foreach($statuses as $status => $icon): 
                    $isActive = $i <= $currentStatusIndex;
                ?>
                <div class="status <?= $isActive ? 'active' : '' ?>">
                    <i class="fas <?= $icon ?> <?= strtolower(str_replace(' ', '-', $status)) ?>"></i>
                    <p><?= $status ?></p>
                </div>
                <?php 
                    $i++;
                endforeach; 
                ?>
            </div>

            <div class="timeline">
                <div class="event">
                    <div class="date-time">
                        <h4><?= date('d M H:i', strtotime($order->created_on)) ?></h4>
                    </div>
                    <div class="dot active"></div>
                    <div class="content">
                        <h4>Order Placed</h4>
                        <p>Your order has been received and is being processed.</p>
                    </div>
                </div>
                <?php if($order->courier_id): ?>
                    <div class="event">
                        <div class="date-time">
                            <h4><?= date('d M H:i', strtotime($order->created_on . ' +1 day')) ?></h4>
                        </div>
                        <div class="dot active"></div>
                        <div class="content">
                            <h4>Courier Assigned</h4>
                            <p>A courier has been assigned to deliver your order.</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($order->shipped_date): ?>
                    <div class="event">
                        <div class="date-time">
                            <h4><?= date('d M H:i', strtotime($order->shipped_date)) ?></h4>
                        </div>
                        <div class="dot active"></div>
                        <div class="content">
                            <h4>Out for Delivery</h4>
                            <p>Your order is on its way to the delivery address.</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($order->completed_date): ?>
                    <div class="event">
                        <div class="date-time">
                            <h4><?= date('d M H:i', strtotime($order->completed_date)) ?></h4>
                        </div>
                        <div class="dot active"></div>
                        <div class="content">
                            <h4>Order Delivered</h4>
                            <p>Your order has been successfully delivered.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($order->courier_id && $courier): ?>
            <div class="courier-details">
                <h3>Courier Information</h3>
                <div class="courier-card">
                    <div class="courier-profile">
                        <?php if($courier->drivers_photo): ?>
                            <img src="<?= ROOT ?>/assets/images/couriers/<?= $courier->drivers_photo ?>" alt="Courier Photo">
                        <?php else: ?>
                            <div class="profile-placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                        <?php endif; ?>
                        <div class="courier-name">
                            <h4><?= $courier->first_name ?> <?= $courier->last_name ?></h4>
                            <p><?= $courier->vehicle_type ?> - <?= $courier->vehicle_model ?></p>
                        </div>
                    </div>
                    <div class="courier-contact">
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <p><?= $courier->phone_number ?></p>
                        </div>
                        <?php if($courier->secondary_phone_number): ?>
                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <p><?= $courier->secondary_phone_number ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="delivery-address">
                <h3>Delivery Address</h3>
                <p><?= $order->shipping_address ?></p>
                <p><?= $order->city ?>, <?= $order->district ?>, <?= $order->province ?></p>
            </div>
            <div class="order-summary">
                <h3>Order Summary</h3>
                <div class="summary-details">
                    <div class="summary-row">
                        <span>Price</span>
                        <span>Rs. <?= number_format(($order->total_amount - $order->delivery_fee)/$order->quanitity + $order->discount_applied, 2) ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Quantity</span>
                        <span><?= $order->quanitity ?></span>
                    </div>
                    <div class="summary-row">
                        <span>Delivery Fee</span>
                        <span>Rs. <?= number_format($order->delivery_fee, 2) ?></span>
                    </div>
                    <?php if($order->discount_applied > 0): ?>
                    <div class="summary-row discount">
                        <span>Discount</span>
                        <span>- Rs. <?= number_format($order->discount_applied * $order->quanitity, 2) ?></span>
                    </div>
                    <?php endif; ?>
                    <div class="summary-row total">
                        <span>Total Amount</span>
                        <span>Rs. <?= number_format($order->total_amount, 2) ?></span>
                    </div>
                </div>
            </div>

            <?php if($order->order_status === 'completed'): ?>
                <div class="review-section">
                    <div class="review-section">
                        <form action="<?= ROOT ?>/buyer/addReview" method="post">
                                <input type="hidden" name="order_id" value="<?= $order->order_id ?>">
                                <input type="hidden" name="book_id" value="<?= $order->book_id ?>">
                                <input type="hidden" name="seller_id" value="<?= $order->seller_id?>">
                                <input type="hidden" name="seller_username" value="<?= $order->seller_username ?>">
                                <button type="submit" class="review-button">REVIEW</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($order->canceled_date): ?>
                <div class="canceled-notice">
                    <i class="fas fa-exclamation-circle"></i>
                    <p>This order was canceled on <?= date('d M Y', strtotime($order->canceled_date)) ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer class="small-footer">
        <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer>     
    <script>
        // Copy order ID to clipboard
        document.querySelector('.copy-id').addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            navigator.clipboard.writeText(id).then(() => {
                alert('Order ID copied to clipboard!');
            });
        });
    </script>
</body>
</html>