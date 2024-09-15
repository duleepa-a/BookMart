<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/register.css">
    <title>Book Mart</title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
            <h2>Book<span class="highlight">Mart</span></h2>
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
            <a class="bookstore-card-link" href="<?= ROOT ?>/BuyerRegister">
                <img src="<?= ROOT ?>/assets/Images/buyer-icon.png" alt="Buyer Icon">
                <p>I'm a <span class="highlight">buyer</span> searching for books to buy</p>
            </a>
            </div>
            <div class="card">
            <a class="bookstore-card-link" href="<?= ROOT ?>/BookSellerRegister">
                <img src="<?= ROOT ?>/assets/Images/bookseller-icon.png" alt="Bookseller Icon">
                <p>I'm a <span class="highlight">bookseller</span>, offering second-hand books</p>
            </a>
            </div>
            <div class="card">
            <a class="bookstore-card-link" href="<?= ROOT ?>/BookstoreRegister">
                <img src="<?= ROOT ?>/assets/Images/bookstore-icon.png" alt="Bookstore Icon">
                <p>I'm a <span class="highlight">bookstore</span>, ready to list my books</p>
            </a>
            </div>
            <div class="card">
                <a class="bookstore-card-link" href="<?= ROOT ?>/CourierRegister">
                <img src="<?= ROOT ?>/assets/Images/courier-icon.png" alt="Courier Icon">
                <p>I'm a <span class="highlight">courier</span>, providing delivery services</p>
                </a>
            </div>
        </div>
        <p class="login-text">Already have an account? <a href="<?= ROOT ?>/Login">Login here</a></p>
        </center>
    </div>
</body>
</html>