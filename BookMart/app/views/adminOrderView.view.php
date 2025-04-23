<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminOrderView.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Order Detail</title>
</head>
<body>
    <div class="header">
        <span class="title">
            <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
        <div class="page-title">
            <h1><center>Order Details</center></h1>
        </div>
    </div>

    <div class="container">
        <div class="content-wrapper">
            <!-- Book Details Section -->
            <div class="info-section">
                <div class="section-header">
                    <h2>Book Information</h2>
                </div>
                <div class="section-content">
                    <div class="detail-row">
                        <span class="detail-label">Book Title:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->title ?? '') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Publisher:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->publisher ?? '') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Price:</span>
                        <span class="detail-value">$<?= htmlspecialchars($order->price ?? '') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Quantity:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->quanitity ?? '') ?></span>
                    </div>
                </div>
            </div>

            <!-- Payment Details Section -->
            <div class="info-section">
                <div class="section-header">
                    <h2>Payment Details</h2>
                </div>
                <div class="section-content">
                    <div class="detail-row">
                        <span class="detail-label">Customer Name:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->full_name ?? '') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Discount Applied:</span>
                        <span class="detail-value">$<?= htmlspecialchars($order->discount_applied ?? '0.00') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Delivery Fee:</span>
                        <span class="detail-value">$<?= htmlspecialchars($order->delivery_fee ?? '0.00') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Total Amount:</span>
                        <span class="detail-value total-amount">$<?= htmlspecialchars($order->total_amount ?? '') ?></span>
                    </div>
                </div>
            </div>

            <!-- Address Section -->
            <div class="info-section">
                <div class="section-header">
                    <h2>Address Information</h2>
                </div>
                <div class="section-content">
                    <div class="detail-row">
                        <span class="detail-label">Shipping Address:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->shipping_address ?? '') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Province:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->province ?? '') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">District:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->district ?? '') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">City:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->city ?? '') ?></span>
                    </div>
                </div>
            </div>

            <!-- Shipping Details Section -->
            <div class="info-section">
                <div class="section-header">
                    <h2>Shipping Details</h2>
                </div>
                <div class="section-content">
                    <div class="detail-row">
                        <span class="detail-label">Created On:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->created_on ?? '') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Shipped Date:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->shipped_date ?? 'Not shipped yet') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Completed Date:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->completed_date ?? 'Not completed yet') ?></span>
                    </div>
                    <div class="detail-row">
                        <span class="detail-label">Canceled Date:</span>
                        <span class="detail-value"><?= htmlspecialchars($order->canceled_date ?? 'Not canceled') ?></span>
                    </div>
                </div>
            </div>

            
        </div>

        <div class="button-group">
            <button onclick="window.location.href='<?= ROOT ?>/AdminSearchorders'" class="close-btn"><b>Back to Orders</b></button>
        </div>
    </div>
    
    <script src="<?= ROOT ?>/assets/JS/adminOrderview.js"></script>
</body>
</html>