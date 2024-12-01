<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminViewusers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>View Buyer</title>
</head>
<body>
<!-- navBar division begin -->
<?php include 'adminNavBar.view.php'; ?>
<!-- navBar division end -->
<div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/" class="active" ><i class="Dashboard"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers"  ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile" class="active"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>

<div class="container">
    <h2>User Information</h2>
    <div class="box">
        <div class="user-info">
            <div class="info-row">
                <span class="label">Name:</span>
                <span class="value" id="userName">D.W.C Sameera</span>
            </div>
            <div class="info-row">
                <span class="label">Buyer ID:</span>
                <span class="value" id="sellerId">B001</span>
            </div>
            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value" id="location">sameeradwc67@gmail.com</span>
            </div>
            <div class="info-row">
                <span class="label">Phone Number:</span>
                <span class="value" id="phoneNumber">0713989143</span>
            </div>
            <div class="info-row">
                <span class="label">Account created:</span>
                <span class="value" id="accountCreated">2024 January 25</span>
            </div>
            <div class="info-row">
                <span class="label">Last Login:</span>
                <span class="value" id="lastLogin">2024 December 23</span>
            </div>
            <div class="info-row">
                <span class="label">Status:</span>
                <span class="value" id="status">Active</span>
            </div>
        </div>
        <div class="button-group">
            <button class="btn suspendBtn">Suspend</button>
            <button class="btn deleteUserBtn">Delete User</button>
            <a href="<?= ROOT ?>/adminSendmsg" class="btn messageBtn">Send Message</a>
        </div>
    </div><br>  

    <!--dialog box for deletion-->
    <div id="confirmationDialog" class="dialog-overlay">
        <div class="dialog-box">
            <p>Are you sure you want to delete this User?</p>
            <div class="dialog-buttons">
                <button id="cancelBtn" class="btn">Cancel</button>
                <button id="confirmDeleteBtn" class="btn">Confirm deletion</button>
            </div>
        </div>
    </div>

    <div id="successMessage" class="dialog-overlay">
        <div class="dialog-box">
            <p>Successfully deleted.</p>
        </div>
    </div>

    <div class="container">
        <h2>Recent Order</h2>
        <div class="box">
            <input type="text" id="searchInput" placeholder="Search...">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Book Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Example array of orders for the buyer
                    $orders = [
                        ['order_id' => 'ORD123', 'book_title' => 'The Great Gatsby', 'date' => '2024-12-10', 'status' => 'Delivered', 'total' => '$10.99'],
                        ['order_id' => 'ORD124', 'book_title' => '1984', 'date' => '2024-11-25', 'status' => 'Shipped', 'total' => '$9.99'],
                        ['order_id' => 'ORD125', 'book_title' => 'To Kill a Mockingbird', 'date' => '2024-11-15', 'status' => 'Processing', 'total' => '$8.99'],
                    ];

                    // Loop through each order and create a row
                    foreach ($orders as $order) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($order['order_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['book_title']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['date']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['status']) . "</td>";
                        echo "<td>" . htmlspecialchars($order['total']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>    
        </div>
    </div><br>


    <div class="container">
        <h2>Review Section</h2>
        <div class="box">
            <input type="text" id="searchInput" placeholder="Search...">
            <table class="table">
                <thead>
                    <tr>
                        <th>Review ID</th>
                        <th>Book Title</th>
                        <th>Rating</th>
                        <th>Date</th>
                        <th>Content</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Example array of reviews for the buyer
                    $reviews = [
                        ['review_id' => 'REV001', 'book_title' => 'The Great Gatsby', 'rating' => '5', 'date' => '2024-12-01', 'content' => 'Amazing book!'],
                        ['review_id' => 'REV002', 'book_title' => '1984', 'rating' => '4', 'date' => '2024-11-20', 'content' => 'Thought-provoking and powerful.'],
                    ];

                    // Loop through each review and create a row
                    foreach ($reviews as $review) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($review['review_id']) . "</td>";
                        echo "<td>" . htmlspecialchars($review['book_title']) . "</td>";
                        echo "<td>" . htmlspecialchars($review['rating']) . "</td>";
                        echo "<td>" . htmlspecialchars($review['date']) . "</td>";
                        echo "<td>" . htmlspecialchars($review['content']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <br><br>

    <script src="<?= ROOT ?>/assets/JS/adminViewusers.js"></script>

</body>
</html>
