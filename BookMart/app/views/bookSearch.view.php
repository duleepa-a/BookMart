<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookByGenres.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title> Search Results | <?= $keyword; ?></title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
        <div class="search-bar-div">
            <form action="<?= ROOT ?>/book/search" method="GET" class="search-form ">
                <input 
                    type="text" 
                    name="keyword" 
                    class="search-bar" 
                    placeholder="Search your book, bookstore"
                    required  
                />
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
            </form>
        </div>
        <div class="nav-links">
                <select id="genres" name="genres" class="navbar-links-select" >
                    <option value="" disabled selected>Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="novels">Novels</option>
                    <option value="history">History</option>
                   </select>
                <?php if(!isset($_SESSION['user_status'])):?>
                  <a href="<?= ROOT ?>/Login" class="navbar-links">Log In</a>
                  <a href="<?= ROOT ?>/Register" class="navbar-links">Sign In</a>
                <?php else: ?>
                  <a href="./Login.html" class="navbar-links">My Profile</a>
                  <a href="./Login.html" class="navbar-links">Orders</a>
                  <a href="./Login.html" class="navbar-links">Chat</a>
                  <a href="./Login.html" class="navbar-links"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
                  <a href="./Login.html" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                  <button id="logoutButton" class="navbar-links-select">Log Out</button>
                <?php endif; ?>
        </div>     
    </div>
    <div class="container">
        <h2 class="container-heading">
            Search results for <span class="keyword-heading">keyword "<?= $keyword; ?>"</span>
        </h2>
        <?php if (!empty($books)): ?>
            <div class="result-container">
                <?php foreach ($books as $book): ?>
                    <div class="book-card">
                        <div class="book-image">
                            <a href="<?= ROOT ?>/BookView/index/<?= $book->id ?>" class="book-card-link">
                            <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($book->cover_image) ?>" 
                                alt="<?= htmlspecialchars($book->title) ?> Book Cover">
                            <?php if (!empty($book->discount)): ?>
                                <div class="discount-badge"><?= htmlspecialchars($book->discount) ?>%</div>
                            <?php endif; ?>
                            </a>
                        </div>
                        <div class="book-info">
                            <h3><?= htmlspecialchars(strtoupper($book->title)) ?></h3>
                            <p class="original-price">LKR <?= number_format($book->price, 2) ?></p>
                            <?php if (!empty($book->discount)): ?>
                                <?php 
                                    $discountedPrice = $book->price - ($book->price * ($book->discount / 100)); 
                                ?>
                                <p class="discounted-price">LKR <?= number_format($discountedPrice, 2) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="not-found">
                <h1>No books available in this genre.</h1>
            </div>
                <?php endif; ?>
    </div>
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <h2><b>Book<span class="highlight">Mart</span></b></h2>
                <p><a href="#"><b>Home</b></a><b> | </b><a href="#"><b>Contact Us</b></a><b>    |   </b><a href="#"><b>About Us</b></a></p>
                <p>&copy; 2024 BookMart, all rights reserved.</p>
            </div>
            <div class="footer-center">
                <p><b><span>&#128222;</span> +1.555.555.5555</b></p>
                <p><b><span>&#9993;</span> bookmart@gmail.com</b></p>
            </div>
            <div class="footer-right">
                <h4 style="padding-left: 60px;">OUR VISION</h4>
                <p>"To revolutionize the online book market in Sri Lanka by providing an inclusive platform <br>where bookstores, sellers, and buyers can seamlessly connect, fostering a culture of reading<br>and promoting sustainable practices through second-hand book trading."</p>
                <p style="padding-left: 40px;"><b>BookMart &copy; 2024</b></p>
                <br><br>
            </div>
        </div>
    </footer>

    
    <script src="<?= ROOT ?>/assets/JS/bookByGenres.js"></script>
</body>
</html>