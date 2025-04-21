<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminsearch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Search Books</title>
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
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks" class="active"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminViewContactUs"><i class="fa-solid fa-envelope"></i>Inquiries</a></li>
            <li><a href="<?= ROOT ?>/adminViewCourierComplains"><i class="fa-solid fa-circle-exclamation"></i>Complains</a></li>
            <li><a href="<?= ROOT ?>/admin/payRolls" ><i class="fa-solid fa-money-bill"></i>Payrolls</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile" ><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <!-- navBar division end -->
    <div class="container">
        <div class="box">
            <div class="search-row">
                <h2>Search Books</h2>
                <input type="text" class="search-input" placeholder="Search books by Title, Author..." id="searchInput">
                <select class="sort-by">
                    <option value="">Sort by</option>
                    <option value="id">Book Title</option>
                    <option value="name">Author</option>
                    <option value="email">Book store/Seller</option>
                </select>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Book store/Seller</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Example array of books fetched from your database
                        $books = [
                            ['isbn' => '123456', 'title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'store' => 'BookStore1', 'price' => '$10.99', 'quantity' => 20],
                            ['isbn' => '789101', 'title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'store' => 'BookStore2', 'price' => '$8.99', 'quantity' => 15],
                            ['isbn' => '112131', 'title' => '1984', 'author' => 'George Orwell', 'store' => 'BookStore3', 'price' => '$9.99', 'quantity' => 30],
                            ['isbn' => '415161', 'title' => 'Moby Dick', 'author' => 'Herman Melville', 'store' => 'BookStore1', 'price' => '$11.99', 'quantity' => 10],
                            ['isbn' => '718192', 'title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'store' => 'BookStore2', 'price' => '$7.99', 'quantity' => 25],
                        ];

                        // Loop through each book and create a row
                        foreach ($books as $book) {
                            echo "<tr onclick='window.location.href=\"" . ROOT . "/viewBook/{$book['isbn']}\"'>";
                            echo "<td>" . htmlspecialchars($book['title']) . "</td>";
                            echo "<td>" . htmlspecialchars($book['author']) . "</td>";
                            echo "<td>" . htmlspecialchars($book['isbn']) . "</td>";
                            echo "<td>" . htmlspecialchars($book['store']) . "</td>";
                            echo "<td>" . htmlspecialchars($book['price']) . "</td>";
                            echo "<td>" . htmlspecialchars($book['quantity']) . "</td>";
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
