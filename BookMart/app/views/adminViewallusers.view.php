<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminsearchusers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>View All Users</title>
</head>
<body>
<!-- navBar division begin -->
<?php include 'adminNavBar.view.php'; ?>
<div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers" class="active"  ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
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
                <h2>Find Users</h2>
                    <input type="text" class="search-input" placeholder="Filter users..." id="searchInput">
                    <select class="sort-by">
                        <option value="">Buyers</option>
                        <option value="id">Sellers</option>
                        <option value="name">Shops</option>
                        <option value="email">Couriers</option>
                    </select>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Example array of users fetched from your database
                        $users = [
                            ['id' => '001', 'name' => 'D.W.C. Sameera', 'email' => 'sameeradwc67@gmail.com'],
                            ['id' => '002', 'name' => 'John Doe', 'email' => 'johndoe@example.com'],
                            ['id' => '003', 'name' => 'Jane Smith', 'email' => 'janesmith@example.com'],
                            ['id' => '004', 'name' => 'Mike Ross', 'email' => 'mikeross@example.com'],
                            ['id' => '005', 'name' => 'Rachel Zane', 'email' => 'rachels@example.com'],
                            ['id' => '006', 'name' => 'Harvey Specter', 'email' => 'harveyspecter@example.com'],
                        ];

                        // Loop through each user and create a row
                        foreach ($users as $user) {
                            echo "<tr onclick='window.location.href=\"" . ROOT . "/adminViewbuyer\"'>";
                            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div><br><br><br>

            <div class="pagination">
                <button class="page-button previous">&lt;</button>
                <button class="page-button">4</button>
                <button class="page-button">5</button>
                <button class="page-button">6</button>
                <button class="page-button">7</button>
                <button class="page-button">8</button>
                <button class="page-button">9</button>
                <button class="page-button next">&gt;</button>
            </div>

        </div>
    </div>
    <br><br>

<script src="<?= ROOT ?>/assets/JS/adminsearch.js"></script>

</body>
</html>
