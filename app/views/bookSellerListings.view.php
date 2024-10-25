<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerListings.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>My Listings</title> 
</head>

<body>
    
    <div class="navBar">        <!-- navBar division begin -->
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
                <a href="" class="navbar-links">My Profile</a>
                <a href="./bookSellerListings" class="navbar-links">Listings</a>
                <a href="./bookSellerSales" class="navbar-links">Sales</a>
                <a href="" class="navbar-links">Chat</a>
                <a href="" class="navbar-links"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="" class="navbar-links"><i class="fa-solid fa-bell"></i></a>
                <button id="logoutButton" class="navbar-links-select">Log Out</button>
        </div>
    </div>                  <!-- navBar division end -->
    
    <br><br>
    <center>
    <div class="background-box">    <!-- inner background box begin -->        
        <h1 class="title-text">My Listings</h1>

        <br><br>

        <div class="controls">      <!-- First row division begin -->
            <input type="text" placeholder="Search..." class="search-bar">
            <button>Search</button>
        </div>                      <!-- First row division end -->

        <div class="controls">      <!-- Button row division begin -->
            <button>Select All</button>
            <button>Edit</button>
            <button>Update Status</button>
            <button>Delete</button>
            <button>Filter</button>
            <button>Sort</button>
        </div>                      <!-- Button row division end -->

        <table class="styled-table">    <!-- Table division begin -->
            <thead>
                <tr>
                    <th></th>
                    <th>Book Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Condition</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>The Great Gatsby</td>
                    <td>F. Scott Fitzgerald</td>
                    <td>Fiction</td>
                    <td>Rs.2000.00</td>
                    <td>Good</td>
                    <td>Available</td>
                    <td><button class="view-button">View</button></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>To Kill a Mockingbird</td>
                    <td>Harper Lee</td>
                    <td>Classic</td>
                    <td>Rs.1000.00</td>
                    <td>Like New</td>
                    <td>Delivering</td>
                    <td><button class="view-button">View</button></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>1984</td>
                    <td>George Orwell</td>
                    <td>Science Fiction</td>
                    <td>Rs.1500.00</td>
                    <td>Fair</td>
                    <td>Available</td>
                    <td><button class="view-button">View</button></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>Harry Potter and the Sorceror's Stone</td>
                    <td>J. K. Rowling</td>
                    <td>Fiction</td>
                    <td>Rs.3500.00</td>
                    <td>Fair</td>
                    <td>Available</td>
                    <td><button class="view-button">View</button></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>Percy Jackson and the Lighting Thief</td>
                    <td>Rick Riordan</td>
                    <td>Fiction</td>
                    <td>Rs.2500.00</td>
                    <td>Good</td>
                    <td>Available</td>
                    <td><button class="view-button">View</button></td>
                </tr>
            </tbody>
        </table>                        <!-- Table division end -->

        <div class="controls">
            <button class="single-button">View More</button>
        </div>

    </div>                          <!-- inner background box end -->

    <br><br>

    <div class="footer">    <!-- Footer divison begin -->
        <div class="links">
            <a href="./contactUs.html">Contact Us</a><br><br>
            <a href="./aboutUs.html">About Us</a>
        </div>
        <br>
        <div class="copyright">
            &copy; 2024 BookMart. All rights reserved.
        </div>
    </div>                  <!-- Footer divison end -->

    <script src="<?= ROOT ?>/assets/JS/bookSellerlistings.js"></script>

</body>