<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/buyerOrders.css">
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
            <li><a href="<?= ROOT ?>/buyerOrders" class="active"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/buyerReview"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/buyerProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <div class="container">
        <h1 class="heading">My Orders</h1>
        <nav class="tabs">
            <button class="tab-button active" onclick="showTab('all')">All</button>
            <button class="tab-button" onclick="showTab('to-deliver')">To-Deliver</button>
            <button class="tab-button" onclick="showTab('to-receive')">To-Receive</button>
            <button class="tab-button last-child" onclick="showTab('to-review')">To-Review</button>
        </nav>

        <div class="tab-content" id="all" >
            <div class="order-card">
                <div class="store-header">
                    <div class="store-name">
                        <i class="fa-solid fa-store store-icon"></i>
                        <span>sarasavi</span>
                    </div>
                    <div class="shipped-status">
                        <i class="fa-solid fa-truck-fast"></i>
                        Shipped
                    </div>
                </div>
                <div class="product">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="notebook.jpg">
                    <div class="product-details">
                        <p class="product-title">The Notebook</p>
                        <p class="product-specs">Nicholas Sparks</p>
                    </div>
                    <div class="price-qty-section">
                        <div class="price-container">
                            <p class="label">
                                <i class="fa-solid fa-tag icon"></i>
                                Price
                            </p>
                            <p class="value">Rs. 662</p>
                        </div>
                        <div class="qty-containers">
                            <div class="qty-container">
                                <p class="label">
                                    <i class="fa-solid fa-box icon"></i>
                                    Quantity
                                </p>
                                <p class="value">1</p>
                            </div>
                            <a href="<?= ROOT ?>/buyerOrders/trackOrder" class="order-card-link">
                            <button class="btn btn-details">
                                <i class="fa-solid fa-magnifying-glass-location"></i>
                                Track Order
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-card">
                <div class="store-header">
                    <div class="store-name">
                        <i class="fa-solid fa-store store-icon"></i>
                        <span>sarasavi</span>
                    </div>
                    <div class="shipped-status">
                        <i class="fa-solid fa-truck-fast"></i>
                        Shipped
                    </div>
                </div>
                <div class="product">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="notebook.jpg">
                    <div class="product-details">
                        <p class="product-title">The Notebook</p>
                        <p class="product-specs">Nicholas Sparks</p>
                    </div>
                    <div class="price-qty-section">
                        <div class="price-container">
                            <p class="label">
                                <i class="fa-solid fa-tag icon"></i>
                                Price
                            </p>
                            <p class="value">Rs. 662</p>
                        </div>
                        <div class="qty-containers">
                            <div class="qty-container">
                                <p class="label">
                                    <i class="fa-solid fa-box icon"></i>
                                    Quantity
                                </p>
                                <p class="value">1</p>
                            </div>
                            <a href="<?= ROOT ?>/buyerOrders/trackOrder" class="order-card-link">
                            <button class="btn btn-details">
                                <i class="fa-solid fa-magnifying-glass-location"></i>
                                Track Order
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-card">
                <div class="store-header">
                    <div class="store-name">
                        <i class="fa-solid fa-store store-icon"></i>
                        <span>sarasavi</span>
                    </div>
                    <div class="shipped-status">
                        <i class="fa-solid fa-truck-fast"></i>
                        Shipped
                    </div>
                </div>
                <div class="product">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="notebook.jpg">
                    <div class="product-details">
                        <p class="product-title">The Notebook</p>
                        <p class="product-specs">Nicholas Sparks</p>
                    </div>
                    <div class="price-qty-section">
                            <div class="price-container">
                                <p class="label">
                                    <i class="fa-solid fa-tag icon"></i>
                                    Price
                                </p>
                                <p class="value">Rs. 662</p>
                            </div>
                        <div class="qty-containers">
                            <div class="qty-container">
                                <p class="label">
                                    <i class="fa-solid fa-box icon"></i>
                                    Quantity
                                </p>
                                <p class="value">1</p>
                            </div>
                            <a href="<?= ROOT ?>/buyerOrders/trackOrder" class="order-card-link">
                            <button class="btn btn-details">
                                <i class="fa-solid fa-magnifying-glass-location"></i>
                                Track Order
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="to-deliver" style="display: none;">
        <div class="order-card">
                <div class="store-header">
                    <div class="store-name">
                        <i class="fa-solid fa-store store-icon"></i>
                        <span>sarasavi</span>
                    </div>
                    <div class="shipped-status">
                        <i class="fa-solid fa-truck-fast"></i>
                        Shipped
                    </div>
                </div>
                <div class="product">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="notebook.jpg">
                    <div class="product-details">
                        <p class="product-title">The Notebook</p>
                        <p class="product-specs">Nicholas Sparks</p>
                    </div>
                    <div class="price-qty-section">
                        <div class="price-container">
                            <p class="label">
                                <i class="fa-solid fa-tag icon"></i>
                                Price
                            </p>
                            <p class="value">Rs. 662</p>
                        </div>
                        <div class="qty-containers">
                            <div class="qty-container">
                                <p class="label">
                                    <i class="fa-solid fa-box icon"></i>
                                    Quantity
                                </p>
                                <p class="value">1</p>
                            </div>
                            <a href="<?= ROOT ?>/buyerOrders/trackOrder" class="order-card-link">
                            <button class="btn btn-details">
                                <i class="fa-solid fa-magnifying-glass-location"></i>
                                Track Order
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-card">
                <div class="store-header">
                    <div class="store-name">
                        <i class="fa-solid fa-store store-icon"></i>
                        <span>sarasavi</span>
                    </div>
                    <div class="shipped-status">
                        <i class="fa-solid fa-truck-fast"></i>
                        Shipped
                    </div>
                </div>
                <div class="product">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="notebook.jpg">
                    <div class="product-details">
                        <p class="product-title">The Notebook</p>
                        <p class="product-specs">Nicholas Sparks</p>
                    </div>
                    <div class="price-qty-section">
                        <div class="price-container">
                            <p class="label">
                                <i class="fa-solid fa-tag icon"></i>
                                Price
                            </p>
                            <p class="value">Rs. 662</p>
                        </div>
                        <div class="qty-containers">
                            <div class="qty-container">
                                <p class="label">
                                    <i class="fa-solid fa-box icon"></i>
                                    Quantity
                                </p>
                                <p class="value">1</p>
                            </div>
                            <a href="<?= ROOT ?>/buyerOrders/trackOrder" class="order-card-link">
                            <button class="btn btn-details">
                                <i class="fa-solid fa-magnifying-glass-location"></i>
                                Track Order
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="to-receive" style="display: none;">
        <div class="order-card">
                <div class="store-header">
                    <div class="store-name">
                        <i class="fa-solid fa-store store-icon"></i>
                        <span>sarasavi</span>
                    </div>
                    <div class="shipped-status">
                        <i class="fa-solid fa-truck-fast"></i>
                        Shipped
                    </div>
                </div>
                <div class="product">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="notebook.jpg">
                    <div class="product-details">
                        <p class="product-title">The Notebook</p>
                        <p class="product-specs">Nicholas Sparks</p>
                    </div>
                    <div class="price-qty-section">
                        <div class="price-container">
                            <p class="label">
                                <i class="fa-solid fa-tag icon"></i>
                                Price
                            </p>
                            <p class="value">Rs. 662</p>
                        </div>
                        <div class="qty-containers">
                            <div class="qty-container">
                                <p class="label">
                                    <i class="fa-solid fa-box icon"></i>
                                    Quantity
                                </p>
                                <p class="value">1</p>
                            </div>
                            <a href="<?= ROOT ?>/buyerOrders/trackOrder" class="order-card-link">
                            <button class="btn btn-details">
                                <i class="fa-solid fa-magnifying-glass-location"></i>
                                Track Order
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="to-review" style="display: none;">
        <div class="order-card">
                <div class="store-header">
                    <div class="store-name">
                        <i class="fa-solid fa-store store-icon"></i>
                        <span>sarasavi</span>
                    </div>
                    <div class="shipped-status">
                        <i class="fa-solid fa-truck-fast"></i>
                        Shipped
                    </div>
                </div>
                <div class="product">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/674455351cb0d.jpg" alt="notebook.jpg">
                    <div class="product-details">
                        <p class="product-title">The Notebook</p>
                        <p class="product-specs">Nicholas Sparks</p>
                    </div>
                    <div class="price-qty-section">
                        <div class="price-container">
                            <p class="label">
                                <i class="fa-solid fa-tag icon"></i>
                                Price
                            </p>
                            <p class="value">Rs. 662</p>
                        </div>
                        <div class="qty-containers">
                            <div class="qty-container">
                                <p class="label">
                                    <i class="fa-solid fa-box icon"></i>
                                    Quantity
                                </p>
                                <p class="value">1</p>
                            </div>
                            <a href="<?= ROOT ?>/buyerOrders/trackOrder" class="order-card-link">
                            <button class="btn btn-details">
                                <i class="fa-solid fa-magnifying-glass-location"></i>
                                Track Order
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer>    
    <script src="<?= ROOT ?>/assets/JS/buyerOrders.js"></script>
</body>
</html>