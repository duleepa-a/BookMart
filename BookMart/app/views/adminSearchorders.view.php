<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminsearch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!--bell icon-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Search Orders</title>
</head>
<body>
<!-- navBar division begin -->
<?php include 'adminNavBar.view.php'; ?>
<div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers"  ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders" class="active" ><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminViewContactUs"><i class="fa-solid fa-envelope"></i>Inquiries</a></li>
            <li><a href="<?= ROOT ?>/adminViewCourierComplains"><i class="fa-solid fa-circle-exclamation"></i>Complains</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile" ><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <!-- navBar division end -->

    <div class="container">
        <div class="box">
            <div class="search-row">
                <h2>Search Orders</h2>
                    <input type="text" class="search-input" placeholder="Search Order by ID, Customer name..." id="searchInput">
                    <select class="sort-by">
                        <option value="">Sort by</option>
                        <option value="id">Order ID</option>
                        <option value="name">Book Title</option>
                        <option value="customer">Customer Name</option>
                        <option value="store">Book store/Seller</option>
                    </select>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Book Title</th>
                            <th>Customer Name</th>
                            <th>Book store/Seller</th>
                            <th>Date Placed</th>
                            <th>Payment Amount</th>
                            <th>Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Example array of orders fetched from your database
                        $orders = [
                            ['order_id' => '001', 'book_title' => 'The Great Gatsby', 'customer_name' => 'John Doe', 'store' => 'BookStore1', 'date_placed' => '2024-10-01', 'payment' => '$20.99', 'quantity' => 2, 'status' => 'Shipped'],
                            ['order_id' => '002', 'book_title' => 'To Kill a Mockingbird', 'customer_name' => 'Jane Smith', 'store' => 'BookStore2', 'date_placed' => '2024-10-03', 'payment' => '$15.99', 'quantity' => 1, 'status' => 'Processing'],
                            ['order_id' => '003', 'book_title' => '1984', 'customer_name' => 'Alice Johnson', 'store' => 'BookStore1', 'date_placed' => '2024-10-05', 'payment' => '$18.99', 'quantity' => 3, 'status' => 'Delivered'],
                            // Add more orders here
                        ];

                        // Loop through each order and create a row
                        foreach ($orders as $order) {
                            echo "<tr onclick='window.location.href=\"" . ROOT . "/viewOrder/{$order['order_id']}\"'>";
                            echo "<td>" . htmlspecialchars($order['order_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['book_title']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['customer_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['store']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['date_placed']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['payment']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['quantity']) . "</td>";
                            echo "<td>" . htmlspecialchars($order['status']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div><br><br><br>

            <div class="pagination">
                <button class="page-button previous">&lt;</button>
                <button class="page-button">1</button>
                <button class="page-button">2</button>
                <button class="page-button">3</button>
                <button class="page-button">4</button>
                <button class="page-button">5</button>
                <button class="page-button next">&gt;</button>
            </div>

        </div>
    </div>
    <br><br>

    <script src="<?= ROOT ?>/assets/JS/adminsearch.js"></script>

</body>
</html>
