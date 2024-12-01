<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/buyerReviews.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart</title>
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
                <a href="" class="navbar-links">Chat</a>
                <a href="" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <button id="logoutButton" class="navbar-links-select">Log Out</button>
        </div>
    </div>
    <div class="sidebar">
        <h3 class="sidebar-heading">Welcome back,<br>Duleepa Edirisinghe</h3>
        <ul>
            <li><a href="<?= ROOT ?>/buyerOrders" ><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/buyerReview" class="active"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/buyerProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <div class="container">
        <h1 class="heading">My Reviews</h1>
        <nav class="tabs">
            <button class="tab-button active" onclick="showTab('to-be-review')">To-Review</button>
            <button class="tab-button" onclick="showTab('history')">History</button>
        </nav>

        <div class="tab-content" id="to-be-review" >
            <div class="purchase-card">
                <div class="purchase-details">
                    <p class="purchase-header">Purchased on : 2024-11-22</p>
                    <div class="item-details">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="Ring" class="item-image" />
                    <div class="item-description">
                        <p class="item-title">
                        The Notebook
                        </p>
                        <p class="item-specs">By Nicholas, Condition : New</p>
                    </div>
                    </div>
                </div>
                <div class="seller-section">
                    <p class="seller-header">Sold by</p>
                    <button class="review-button">REVIEW</button>
                </div>
            </div>
        </div>
        <div class="tab-content" id="history" style="display: none;" >
            <div class="review-card-unique">
                <div class="purchase-details">
                    <p class="purchase-header">Purchased on : 2024-08-09</p>
                    <div class="item-details-unique">
                        <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="Product" class="item-image" />
                        <div class="item-description-unique">
                            <p class="item-title">
                                The Notebook
                            </p>
                            <p class="item-specs">By Nicholas, Condition : New</p>
                            <div class="rating-section-unique">
                                <span class="stars-unique">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-text-unique">Delightful</span>
                            </div>
                            <div class="review-box-unique">
                                <p>Good Quality product! Highly recommended.</p>
                                <div class="likes-unique">
                                    <i class="fas fa-thumbs-up"></i>
                                    <span>0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seller-section">
                    <p class="seller-header">Sold by</p>
                    <p class="seller-review-header">Your seller review:</p>
                    <div class="seller-review-icons-unique">
                    <i class="fas fa-frown"></i>
                    <i class="fas fa-meh"></i>
                    <i class="fas fa-smile"></i>
                    </div>
                </div>
            </div>           
        </div>
    </div>    
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer> 
    <script src="<?= ROOT ?>/assets/JS/buyerReview.js"></script>
</body>
</html>