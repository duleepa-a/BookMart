<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/buyerOrders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>        
    <!-- navBar division end -->
   <!-- navBar sideBar begin -->
   <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar sideBar end -->
    <div class="container">
        <h1 class="heading">My Orders</h1>
        <nav class="tabs">
            <button class="tab-button active" onclick="showTab('all')">All</button>
            <button class="tab-button" onclick="showTab('pending')">To-Deliver</button>
            <button class="tab-button" onclick="showTab('shipping')">To-Receive</button>
            <button class="tab-button last-child" onclick="showTab('completed')">To-Review</button>
        </nav>

        <?php 
        $orderStatuses = ['all', 'pending', 'shipping', 'completed']; 

        foreach ($orderStatuses as $status): 
            $ordersList = $groupedOrders[$status] ?? []; 
        ?>

        <div class="tab-content" id="<?= $status ?>" style="display: <?= $status === 'all' ? 'block' : 'none' ?>;">
            <?php if (empty($ordersList)): ?>
                <div class="message-div">
                    <p class="message-text">No orders available in this category.</p>
                </div>
            <?php else: ?>
                <?php foreach ($ordersList as $order): ?>
                    <div class="order-card">
                        <div class="store-header">
                            <div class="store-name">
                                <i class="fa-solid fa-store store-icon"></i>
                                <span><?= htmlspecialchars($order->seller_username) ?></span>
                            </div>
                            <div class="shipped-status">
                                <i class="fa-solid fa-truck-fast"></i>
                                <?= ucfirst($order->order_status) ?>
                            </div>
                        </div>
                        <div class="product">
                            <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($order->cover_image) ?>" alt="<?= htmlspecialchars($order->book_title) ?>">
                            <div class="product-details">
                                <p class="product-title"><?= htmlspecialchars($order->book_title) ?></p>
                                <p class="product-specs"><?= htmlspecialchars($order->book_author) ?></p>
                            </div>
                            <div class="price-qty-section">
                                <div class="price-container">
                                    <p class="label">
                                        <i class="fa-solid fa-tag icon"></i>
                                        Total Price
                                    </p>
                                    <p class="value">Rs. <?= htmlspecialchars($order->total_amount) ?></p>
                                </div>
                                <div class="qty-containers">
                                    <div class="qty-container">
                                        <p class="label">
                                            <i class="fa-solid fa-box icon"></i>
                                            Quantity
                                        </p>
                                        <p class="value"><?= isset($order->quantity) ? htmlspecialchars($order->quantity) : (isset($order->quanitity) ? htmlspecialchars($order->quanitity) : 'N/A') ?></p>

                                    </div>
                                    <a href="<?= ROOT ?>/Buyer/trackOrder/<?= $order->order_id ?>" class="order-card-link">
                                        <button class="btn btn-details">
                                            <i class="fa-solid fa-magnifying-glass-location"></i>
                                            Track Order
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php endforeach; ?>

    </div>
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer>    
    <script src="<?= ROOT ?>/assets/JS/buyerOrders.js"></script>
</body>
</html>