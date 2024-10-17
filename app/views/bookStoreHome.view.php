<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>BookMart</title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
        <div class="search-bar-div">
            <input type="text" class="search-bar" placeholder="Search your book, bookstore" />
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
        </div>
        <div class="nav-links">
                <select id="genres" name="genres" class="navbar-links-select" >
                    <option value="" disabled selected>Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="novels">Novels</option>
                    <option value="history">History</option>
                </select>
                <select id="menu" name="menu" class="navbar-links-select" >
                    <option value="" disabled selected>Menu</option>
                    <option value="My-Inventory">My Inventory</option>
                    <option value="Analytics">Analytics</option>
                    <option value="Orders">Orders</option>
                    <option value="Reviews">Reviews</option>
                    <option value="Ads">Ads & Offers</option>
                </select>
                <a href="" class="navbar-links">My Profile</a>
                <a href="" class="navbar-links">Chat</a>
                <a href="" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <button id="logoutButton" class="navbar-links-select">Log Out</button>
        </div>
    </div>
    <div class="container"> 
        <div class="dashboard">
            <div class="card">
                <div class="icon"><img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/Revenue.png" alt=""></div>
                <div class="value">
                    <h3>Net Revenue</h3>
                    <span class="span-value">$136.4k</span>
                </div>
            </div>
            <div class="card">
                <div class="icon"><img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/Orders.png"></div>
                <div class="value">
                    <h3>Orders</h3>
                    <span class="span-value">600M</span>
                </div>
            </div>
            <div class="card">
                <div class="icon"><img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/Customers.png"></div>
                <div class="value">
                    <h3>Customers</h3>
                    <span class="span-value">100k</span>
                </div>
            </div>
            <div class="card">
                <div class="icon"><img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/Inventory.png"></div>
                <div class="value">
                    <h3>Inventory</h3>
                    <span class="span-value">500</span>
                </div>
            </div>
        </div>
        <br><br>
        <div class="hero-section">
            <div class="hero left">
                <h2>Sarasavi Publications</h2>
                <p>"Discover new horizons with Sarasavi Publications  Your gateway to knowledge."</p>
                <div class="book-images">
                    <img src="book1.jpg" alt="Book 1">
                    <img src="book2.jpg" alt="Book 2">
                </div>
                <button class="hero-button">SHOP NOW</button>
            </div>

            <div class="hero right">
                <h2>Sumitha Publications</h2>
                <p>Unlock your creativity with Sumitha Publications - Where imagination meets innovation.</p>
                <div class="book-images">
                    <img src="book3.jpg" alt="Book 3">
                    <img src="book4.jpg" alt="Book 4">
                </div>
                <button class="hero-button">SHOP NOW</button>
            </div> 
        </div>
        <br><br>
        <div class="low-stock-div">
            <div class="header">
                <h2>Books low on stock</h2>
                <button>Go to Inventory</button>
            </div>
            <table class="low-stock-table">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Date</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>ISBN</th>
                        <th>Stock Count</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#TZ5625</td>
                        <td>29 April 2024</td>
                        <td>Anna M. Hines</td>
                        <td>anna.hines@mail.com</td>
                        <td>Credit Card</td>
                        <td><span class="status-label status-bad">11</span></td>
                    </tr>
                    <tr>
                        <td>#TZ9652</td>
                        <td>25 April 2024</td>
                        <td>Judith H. Fritsche</td>
                        <td>judith.fritsche.com</td>
                        <td>Credit Card</td>
                        <td><span class="status-label status-critical">5</span></td>
                    </tr>
                    <tr>
                        <td>#TZ5984</td>
                        <td>25 April 2024</td>
                        <td>Peter T. Smith</td>
                        <td>peter.smith@mail.com</td>
                        <td>Pay Pal</td>
                        <td><span class="status-label status-bad">18</span></td>
                    </tr>
                    <tr>
                        <td>#TZ3625</td>
                        <td>21 April 2024</td>
                        <td>Emmanuel J. Delcid</td>
                        <td>emmanuel.delcid@mail.com</td>
                        <td>Pay Pal</td>
                        <td ><span class="status-label status-critical">5</span></td>
                    </tr>
                    <tr>
                        <td>#TZ8652</td>
                        <td>18 April 2024</td>
                        <td>William J. Cook</td>
                        <td>william.cook@mail.com</td>
                        <td>Credit Card</td>
                        <td ><span class="status-label status-critical">4</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br>
        <div class="inventory-count">
            <div class="header">
                <h2>Inventory Count</h2>
            </div>
            <div class="inventory-item">
            <div class="inventory-card">
                <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                <p>Fiction</p>
                <span>10</span>
            </div>
            <div class="inventory-card">
                <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                <p>History</p>
                <span>50</span>
            </div>
            <div class="inventory-card">
            <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                <p>Romance</p>
                <span>40</span>
            </div>
            <div class="inventory-card">
            <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                <p>Novel</p>
                <span>20</span>
            </div>
            <div class="inventory-card">
            <img src="<?= ROOT ?>/assets/Images/bookstore-home-icons/book-icon.png">
                <p>Sci-Fi</p>
                <span>30</span>
            </div>
        </div>
        </div>
    </div>
    <br><br><br>
    <div class="footer">
        <div class="links">
            <a href="<?= ROOT ?>/contactUs">Contact Us</a><br><br>
            <a href="<?= ROOT ?>/aboutUs">About Us</a>
        </div>
        <br>
        <div class="copyright">
            &copy; 2024 BookMart. All rights reserved.
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/bookstoreHome.js"></script>
</body>
</html>