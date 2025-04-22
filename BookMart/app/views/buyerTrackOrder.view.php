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
    <!-- navBar sideBar begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar sideBar end -->
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
    <div id="custom-alert" class="error" style="display: none;">
        <div class="error__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
            </svg>
        </div>
        <div class="error__title" id="alert-message">Alert message goes here</div>
        <div class="error__close" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
            </svg>
        </div>
    </div>

    <footer class="small-footer">
        <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer>     
    <script>
        function showAlert(message, type = "error") {
            const alertBox = document.getElementById("custom-alert");
            const alertMsg = document.getElementById("alert-message");
            const alertMsgbox = document.getElementsByClassName("error")[0];

            // Change alert style based on the type
            if (type === "success") {
                alertBox.style.backgroundColor = "#4CAF50";  // green
            }

            alertMsg.textContent = message;
            alertBox.style.display = "flex";

            console.log(alertMsg.textContent);

            setTimeout(() => {
                closeAlert();
            }, 4000);
        }

        function closeAlert() {
            document.getElementById("custom-alert").style.display = "none";
        }
        document.querySelector('.copy-id').addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            navigator.clipboard.writeText(id).then(() => {
                showAlert('Copied!','success');
            });
        });
    </script>
</body>
</html>