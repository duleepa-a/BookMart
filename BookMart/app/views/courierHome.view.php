<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Available Orders</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierHome.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>

    <?php include 'courierNavbar.view.php'; ?> 
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Welcome Back Courier!</h1>
            <li><a href="<?= ROOT ?>/"  class="active"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= ROOT ?>/courierEarns"><i class="fa fa-money"></i> Earnings</a></li>
            <li><a href="<?= ROOT ?>/courierOrders"><i class="fa fa-clock"></i> Orders</a></li>
            <li><a href="<?= ROOT ?>/courierProfile"><i class="fa fa-user"></i> Profile</a></li>
        </ul>   
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
                    <h3>Order ID    : 001</h3> 
                    <p>Pickup location:  Sarasavi Bookshop , Thibirigasyaya , Colombo 05</p>
                    <p>Delivery location:  22/3 , D.S Fonseka Road , Thibirigasyaya , Colombo 05</p>
                    <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>Deadline: 29/12/2024</small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: 10km</p>
                        </div>
                        <div class="form-group">
                            <form action="<?= ROOT ?>/courierOrderDetails">
                            <button class="view-btn">View</button>
                            </form>
                        </div>
                    </div>
                </div>
            
                <div class="order-card">
                    <h3>Order ID    : 002</h3>
                    <p>Pickup location:  Nanara , Kirulapana ,Colombo 05</p>
                    <p>Delivery location: 22/9 , wajira Road , Colombo 05</p>
                    <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>Deadline: 13/12/2024</small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: 13.5km</p>
                        </div>
                        <div class="form-group">
                            <form action="<?= ROOT ?>/courierOrderDetails">
                            <button class="view-btn">View</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="order-card">
                    <h3>Order ID    : 003</h3>
                    <p>Pickup location:  Sathpiyum Prakashakayo, Nugegoda</p>
                    <p>Delivery location:  12/1 , Galewela , Nugegoda</p>
                    <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>Deadline: 17/12/2024</small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: 22.3km</p>
                        </div>
                        <div class="form-group">
                            <form action="<?= ROOT ?>/courierOrderDetails">
                            <button class="view-btn">View</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="order-card">
                    <h3>Order ID    : 004</h3>
                    <p>Pickup location: Gayan Bookshop , kirulapana , Nugegoda</p>
                    <p>Delivery location:  32/12 , Jaya Mawatha , Nugegoda</p>
                    <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>30/11/2024</small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: 13.2km</p>
                        </div>
                        <div class="form-group">
                            <form action="<?= ROOT ?>/courierOrderDetails">
                            <button class="view-btn">View</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    

    <script src="<?= ROOT ?>/assets/JS/courierHome.js"></script>
</body>
</html>