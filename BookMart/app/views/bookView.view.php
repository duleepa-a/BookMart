<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>BookMart </title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
            <h2>Book<span class="highlight">Mart</span></h2>
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
                <a href="./Login.html" class="navbar-links">My Profile</a>
                <a href="./Login.html" class="navbar-links">Orders</a>
                <a href="./Login.html" class="navbar-links">Chat</a>
                <a href="./Login.html" class="navbar-links"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="./Login.html" class="navbar-links"><i class="fa-solid fa-bell"></i></a>
                <button class="navbar-links-select">Log Out</button>
            </div>
    </div>
    <div class="container">
            <div class="book-container">
                <div class="book-image">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/Harry_Potter_and_the_Cursed_Child_Special_Rehearsal_Edition_Book_Cover.jpg" alt="Daughter of Man">
                </div>
                <div class="book-details">
                    <div class="book-title">
                        <h1>Harry Potter and the Cursed Child</h1> 
                        <p class="bookstore">sarasavi bookshop</p>
                    </div>
                    <div class="book-price-details">
                      <div class="book-details-availabitiy-condition">
                        <div class="book-details-availability">
                            In Stock
                        </div> 
                        <div class="book-details-condition">
                          Brand new
                        </div>
                      </div>
                        <p class="old-price"><del>LKR 2000.00</del></p> 
                        <p class="price">LKR 1500.00</p>
                    </div>
                    <div class="book-info">
                        <h3>Book Info</h3>
                        <ul>
                            <li><strong>Language</strong>: English</li>
                            <li><strong>Author</strong>: L.J. Sysco</li>
                            <li><strong>Genre</strong>: Fiction</li>
                            <li><strong>Publisher</strong>: sdsds</li>
                            <li><strong>ISBN</strong>: 2003132</li>
                        </ul>
                    </div>
                </div>
            </div>
        <div class="product-actions">
        <div class="quantity-selector">
            <button class="quantity-btn">-</button>
            <span class="quantity">1</span>
            <button class="quantity-btn">+</button>
        </div>
        <button class="buy-now-btn">Buy now</button>
        <button class="add-to-cart-btn">Add to cart</button>
        </div>
    </div>
    <nav class="tabs">
        <button class="tab-button active first-child" onclick="showTab('book-reviews')">Book Reviews</button>
        <button class="tab-button" onclick="showTab('book-view-description')">Description</button>
    </nav>

    <div class="tab-content" id="book-reviews">
        <div class="review-container">
            <div class="sort-section">
              <span class="sortby">Sort By:</span>
              <select>
                <option>Select sort</option>
                <!-- Add sort options here -->
              </select>
            </div>
          
            <div class="card">
              <div class="card-header">
                <span class="user-name">User name</span>
                <span class="date">2024/08/24</span>
              </div>
              <div class="card-content">
                Content..........................................................................................................
                .....................................................................................................................
                .....................................................................................................................
              </div>
              <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">0</span>
              </div>
            </div>
          
            <div class="card">
              <div class="card-header">
                <span class="user-name">User name</span>
                <span class="date">2024/08/24</span>
              </div>
              <div class="card-content">
                Content..........................................................................................................
                .....................................................................................................................
                .....................................................................................................................
              </div>
              <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">0</span>
              </div>
            </div>
          
            <div class="card">
              <div class="card-header">
                <span class="user-name">User name</span>
                <span class="date">2024/08/24</span>
              </div>
              <div class="card-content">
                Content..........................................................................................................
                .....................................................................................................................
                .....................................................................................................................
              </div>
              <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">0</span>
              </div>
            </div>
          </div>
          
    </div>
    <div class="tab-content" id="book-view-description" style="display: none;">
        <p class="book-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti consectetur asperiores vero harum! Obcaecati tenetur, corporis blanditiis labore molestias velit sapiente illum? Facere ex, laborum ducimus quo sequi tempore a!</p>
        <br><br>
    </div>

    <div class="footer">
        <div class="links">
            <a href="./contactUs.html">Contact Us</a><br><br>
            <a href="./aboutUs.html">About Us</a>
        </div>
        <br>
        <div class="copyright">
            &copy; 2024 BookMart. All rights reserved.
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/bookView.js"></script>
</body>
</html>