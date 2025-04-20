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

    <?php include 'homeNavBar.view.php'; ?>
    
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Welcome Back Courier!</h1>
            <li><a href="<?= ROOT ?>/"  class="active"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= ROOT ?>/courierEarns"><i class="fa fa-money"></i> Earnings</a></li>
            <li><a href="<?= ROOT ?>/CourierOrderDetails/OrderPage"><i class="fa fa-clock"></i> My Orders</a></li>
            <li><a href="<?= ROOT ?>/courierComplains"><i class="fa-solid fa-circle-exclamation"></i> Complains</a></li>
            <li><a href="<?= ROOT ?>/courierProfile"><i class="fa fa-user"></i> Profile</a></li>
        </ul>
    </div>
    <main>
        <section class="orders-section">
            <h2>Available Orders</h2>
            <div class="sort-by">
                <select id="sort-by" name="sort-by" class="sort-bttn">
                    <option value="" disabled selected>Sort by</option>
                    <option value="date">Date</option>
                    <option value="distance">Distance</option>
                </select>
            </div>

            <div class="order-list" >
                
                <?php if(!empty($orders)): ?>
                    <?php foreach ($orders as $orderOne ): ?>

                    <div class="order-card">
                        <h3>Order ID    : <?= $orderOne->order_id?></h3>
                        <p>Pickup location:  <?= $orderOne->pickup_location ?></p>
                        <p>Delivery location:  <?= $orderOne->shipping_address ?></p>
                        <div class="form-group-row">
                        <div class="form-group">
                            <p><i><small>Deadline: <?= $orderOne->created_on ?></small></i></p>
                        </div>
                        <div class="form-group">
                            <p>Estimated Distance: <?= $orderOne->estimate_distance?> km</p> 
                        </div>

                        <div class="form-group">
                            <form id="viewDetails" method="POST"  action="<?= ROOT ?>/map/index">
                            <input type="hidden" name="order_id" value="<?= $orderOne->order_id ?>">
                            <button class="map-btn">Map</button>
                            </form>
                        </div>

                        <div class="form-group">
                            <form id="viewDetails" method="POST"  action="<?= ROOT ?>/courierOrderDetails/index">
                            <input type="hidden" name="order_id" value="<?= $orderOne->order_id ?>">
                            <input type="hidden" name="buyer_id" value="<?= $orderOne->buyer_id ?>">

                            <button class="view-btn">View</button>
                            </form>
                        </div>

                        </div>
                    </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No orders</p>
                <?php endif; ?>
                
        
        </section>
    </main>
    

    <script src="<?= ROOT ?>/assets/JS/courierHome.js"></script>
</body>
</html>