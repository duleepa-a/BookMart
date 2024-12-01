<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/buyerTrackOrder.css">
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
    <div class="tracking-container">
        <div class="header">
            <div class="courier-info">
                <i class="fas fa-user-circle"></i>
                <div>
                <h4>Courier Info</h4>
                <p>Delivery Partner: Cainiao</p>
                </div>
            </div>
            <div class="tracking-number">
                <h4>Tracking Number</h4>
                <p>DXBLK000005389001 <i class="fas fa-copy" ></i></p>
            </div>
        </div>

        <div class="status-container">
            <div class="status">
                <i class="fas fa-spinner processing"></i>
                <p>Processing</p>
            </div>
            <div class="status">
                <i class="fas fa-box packed"></i>
                <p>Packed</p>
            </div>
            <div class="status">
                <i class="fas fa-truck shipped active"></i>
                <p>Shipped</p>
            </div>
            <div class="status">
                <i class="fas fa-check-circle delivered"></i>
                <p>Delivered</p>
            </div>
        </div>

        <div class="timeline">
            <div class="event">
                <div class="content">
                    <h4>22 Nov 20:13</h4>
                </div>
                <div class="dot active"></div>
                <div class="content">
                    <h4>Package Picked</h4>
                    <p>Our international delivery partner has picked up your order from the seller.</p>
                </div>
            </div>
        <div class="event">
            <div class="content">
                <h4>24 Nov 22:48</h4>
            </div>
            <div class="dot"></div>
            <div class="content">
                <h4>Package Handed over to Logistics Partner</h4>
                <p>Your order has been dropped off by the seller and will soon arrive at Daraz distribution center.</p>
            </div>
        </div>
        <div class="event">
            <div class="content">
                <h4>24 Nov 22:48</h4>
            </div>
            <div class="dot"></div>
            <div class="content">
                <h4>Processed an ready to Ship</h4>
                <p>Your order has been processed and will be with Daraz distribution center soon.</p>
            </div>
        </div>
        <div class="event">
            <div class="content">
                <h4>22 Nov 19:48</h4>
            </div>
            <div class="dot"></div>
            <div class="content">
                <h4>Order Received by the Seller</h4>
                <p>Your order has been received by the seller.</p>
            </div>
        </div>
        </div>
  </div>
                    
    </div>
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer>     
    <script src="<?= ROOT ?>/assets/JS/buyerTrackOrder.js"></script>
</body>
</html>