<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Book Mart</title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
        <span class = "logIn">
            <p><a class="transperant-bttn" href="<?= ROOT ?>/Login">Log in</a></p>
        </span>
    </div>
    <div class="container ">
        <center>
        <h1 class="heading">Get Started On Book<span class="highlight">Mart</span></h1>
        
        <div class="cards-container">
            <div class="card">
            <a class="bookstore-card-link" href="<?= ROOT ?>/Buyer/register">
                <img src="<?= ROOT ?>/assets/Images/buyer-icon.png" alt="Buyer Icon">
                <p>I'm a <span class="highlight-card">buyer</span> searching for books to buy</p>
            </a>
            </div>
            <div class="card">
            <a class="bookstore-card-link" href="<?= ROOT ?>/BookSellerRegister">
                <img src="<?= ROOT ?>/assets/Images/bookseller-icon.png" alt="Bookseller Icon">
                <p>I'm a <span class="highlight-card">bookseller</span>, offering second-hand books</p>
            </a>
            </div>
            <div class="card">
            <a class="bookstore-card-link" href="<?= ROOT ?>/BookstoreRegister">
                <img src="<?= ROOT ?>/assets/Images/bookstore-icon.png" alt="Bookstore Icon">
                <p>I'm a <span class="highlight-card">bookstore</span>, ready to list my books</p>
            </a>
            </div>
            <div class="card">
                <a class="bookstore-card-link" href="<?= ROOT ?>/CourierRegister">
                <img src="<?= ROOT ?>/assets/Images/courier-icon.png" alt="Courier Icon">
                <p>I'm a <span class="highlight-card">courier</span>, providing delivery services</p>
                </a>
            </div>
        </div>
        <p class="login-text">Already have an account? <a href="<?= ROOT ?>/Login">Login here</a></p>
        </center>
    </div>
</body>
</html>