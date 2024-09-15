<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Available Orders</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierHome.css">
</head>
<body>
    <div class="navBar">
        <span class = "title">
            <h2>Book<span class="highlight">Mart</span></h2>
        </span>
        
        <div class="nav-links">
                <select id="orders" name="orders" class="navbar-links-select" >
                    <option value="" disabled selected>Orders</option>
                    <option value="all">All Orders</option>
                    <option value="accepted">Accepted Orders</option>
                    <option value="pending">Pending Orders</option>
                    <option value="completed">Completed Orders</option>
                </select>
                <a href="<?= ROOT ?>/CourierProfile" class="navbar-links">My Profile</a>
                <a href="<?= ROOT ?>/Login" class="navbar-links"><i class="fa-solid fa-bell"></i></a>
                <button class="navbar-links-select">Log Out</button>
            </div>
    </div>

    <main>
        <section class="orders-section">
            <h2>Available Orders</h2>
            <div class="sort-by">
                <!-- <button>Sort by</button> -->
                <select id="sort-by" name="sort-by" class="sort-bttn">
                    <option value="" disabled selected>Sort by</option>
                    <option value="date">Date</option>
                    <option value="distance">Distance</option>
                </select>
            </div>
            <div class="order-list" >
                <div class="order-card">
                    <h3>Order ID</h3>
                    <p>Pickup location:</p>
                    <p>Delivery location:</p>
                    <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>Deadline: date of the deadline</small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: 10km</p>
                        </div>
                        <div class="form-group">
                            <button class="view-btn">View</button>
                        </div>
                    </div>
                </div>
            
                <div class="order-card">
                    <h3>Order ID</h3>
                    <p>Pickup location:</p>
                    <p>Delivery location:</p>
                    <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>Deadline: date of the deadline</small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: 10km</p>
                        </div>
                        <div class="form-group">
                            <button class="view-btn">View</button>
                        </div>
                    </div>
                </div>

                <div class="order-card">
                    <h3>Order ID</h3>
                    <p>Pickup location:</p>
                    <p>Delivery location:</p>
                    <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>Deadline: date of the deadline</small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: 10km</p>
                        </div>
                        <div class="form-group">
                            <button class="view-btn">View</button>
                        </div>
                    </div>
                </div>

                <div class="order-card">
                    <h3>Order ID</h3>
                    <p>Pickup location:</p>
                    <p>Delivery location:</p>
                    <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>Deadline: date of the deadline</small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: 10km</p>
                        </div>
                        <div class="form-group">
                            <button class="view-btn">View</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

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

    <script src="<?= ROOT ?>/1.js"></script>
</body>
</html>