<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Notifications - BookMart</title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'bookSellerNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- Sidebar division begin -->
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- Sidebar division end -->
    
    <br><br>
    <center>
    <div class="background-box">
        <h1 class="title-text">Notifications</h1>
        <br><br>
        
        <div class="notifications-container">
            <div class="notification-card">
                <div class="notification-header">
                    <h2>New Book Order Received</h2>
                    <span class="notification-meta">Today at 10:15 AM</span>
                </div>
                <div class="notification-content">
                    <p>You have received a new order for "The Great Gatsby" from a customer.</p>
                </div>
            </div>

            <div class="notification-card">
                <div class="notification-header">
                    <h2>Inventory Low Alert</h2>
                    <span class="notification-meta">Yesterday at 3:45 PM</span>
                </div>
                <div class="notification-content">
                    <p>Your stock of "Harry Potter Series" is running low. Consider restocking soon.</p>
                </div>
            </div>

            <div class="notification-card">
                <div class="notification-header">
                    <h2>Payment Processed</h2>
                    <span class="notification-meta">October 20, 2024 at 2:30 PM</span>
                </div>
                <div class="notification-content">
                    <p>Your recent sales have been processed. Rs.1250.00 has been added to your account.</p>
                </div>
            </div>

            <div class="notification-card">
                <div class="notification-header">
                    <h2>Review Submitted</h2>
                    <span class="notification-meta">October 18, 2024 at 11:20 AM</span>
                </div>
                <div class="notification-content">
                    <p>A customer has left a 5-star review for "Pride and Prejudice".</p>
                </div>
            </div>

            <div class="notification-card">
                <div class="notification-header">
                    <h2>Delivery Update</h2>
                    <span class="notification-meta">October 15, 2024 at 9:05 AM</span>
                </div>
                <div class="notification-content">
                    <p>Your bulk order of textbooks is being delivered.</p>
                </div>
            </div>
        </div>

        <div class="controls">
            <button class="view-more-button">View More Notifications</button>
        </div>
    </div>
    </center>

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->
    <script src="<?= ROOT ?>/assets/JS/notifications.js"></script>
</body>
</html>