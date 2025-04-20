<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Courier Orders</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierOrders.css">
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
            <li><a href="<?= ROOT ?>/" ><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= ROOT ?>/courierEarns"><i class="fa fa-money"></i> Earnings</a></li>
            <li><a href="<?= ROOT ?>/CourierOrderDetails/OrderPage" class="active"><i class="fa fa-clock"></i> My Orders</a></li>
            <li><a href="<?= ROOT ?>/courierComplains"><i class="fa-solid fa-circle-exclamation"></i> Complains</a></li>
            <li><a href="<?= ROOT ?>/courierProfile"><i class="fa fa-user"></i> Profile</a></li>
        </ul>   
    </div>
    <div class="container">
        
            <h1 class="mtopic">My Orders</h1> 
            
            <br>
            <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('all-orders')">All</button>
                <button class="tab-button" onclick="showTab('accepted-orders')">Accepted</button>
                <button class="tab-button" onclick="showTab('pending-orders')">Received From the bookstore</button>
                <button class="tab-button last-child" onclick="showTab('completed-orders')">Completed</button>
            </nav>
    
                <div class="tab-content" id="all-orders">
                    
                    <div class="order-list" >
                        <?php if(!empty($Order)): ?>
                            <?php foreach ($Order as $contactdetails): ?>
                            <div class="order-card">
                            
                                    
                                <h3>Order ID :<?= $contactdetails->order_id ?></h3>
                                <p>Pickup location:<?= $contactdetails->pickup_location ?></p>
                                <p>Delivery location:<?= $contactdetails->shipping_address ?></p>
                                <div class="form-group-row">
                                    <div class="form-group">
                                        <p><i><small>Deadline: <?= $contactdetails->timeframe ?></small></i></p>
                                    </div>
                                    <div class="form-group">
                                        <p>Estimated Distance: <?= $contactdetails->distance ?>km</p>
                                    </div>

                                    <div class="form-group">
                                        <form id="viewDetails" method="POST"  action="<?= ROOT ?>/map/index">
                                        <input type="hidden" name="order_id" value="<?= $contactdetails->order_id ?>">
                                        <button class="map-btn" type="submit">Map</button>
                                    </form>
                                    </div>

                                    <div class="form-group">

                                        <form id="viewDetails" method="POST"  action="<?= ROOT ?>/CourierOrderDetails/">
                                            <input type="hidden" name="order_id" value="<?= $contactdetails->order_id ?>">
                                            <button class="view-btn" type="submit">View</button>
                                        </form>

                                    </div>
                                </div>
                                
                            </div>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <div class="message-div">
                                <p>No Orders</p>
                            </div>
                            <?php endif; ?>
                    </div>
                    

                    <br><br><br><br>
                
                </div>
    
    
                <div class="tab-content" id="accepted-orders" style="display: none;">
                    
                    <div class="order-list" >
                    <?php if(!empty($acceptorders)): ?>
                        <?php foreach ($acceptorders as $contactdetails): ?>
                        <div class="order-card">
                            <h3>Order ID :<?= $contactdetails->order_id ?></h3>
                            <p>Pickup location:<?= $contactdetails->pickup_location ?></p>
                            <p>Delivery location:<?= $contactdetails->shipping_address ?></p>
                            <div class="form-group-row">
                                <div class="form-group">
                                    <p><i><small>Deadline: <?= $contactdetails->timeframe ?></small></i></p>
                                </div>
                                <div class="form-group">
                                    <p>Estimated Distance: <?= $contactdetails->distance ?>km</p>
                                </div>

                                <div class="form-group">
                                <form id="viewDetails" method="POST"  action="<?= ROOT ?>/map/index">
                                    <input type="hidden" name="order_id" value="<?= $contactdetails->order_id ?>">
                                    <button class="map-btn" type="submit">Map</button>
                                </form>
                                </div>

                                <div class="form-group">
                                    <form id="viewDetails" method="POST"  action="<?= ROOT ?>/CourierOrderDetails/">
                                                <input type="hidden" name="order_id" value="<?= $contactdetails->order_id ?>">
                                                <button class="view-btn" type="submit">View</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="message-div">
                            <p>No Orders</p>
                        </div>
                        <?php endif; ?>
                    
                    
                    </div>
    
                    
                    <br><br><br><br>
    
                </div>
    
                <div class="tab-content" id="pending-orders" style="display: none;">
                    
                    <div class="order-list" >
                    <?php if(!empty($pendingorders)): ?>
                        <?php foreach ($pendingorders as $contactdetails): ?>
                        <div class="order-card">
                            <h3>Order ID :<?= $contactdetails->order_id ?></h3>
                            <p>Pickup location:<?= $contactdetails->pickup_location ?></p>
                            <p>Delivery location:<?= $contactdetails->shipping_address ?></p>
                            <div class="form-group-row">
                                <div class="form-group">
                                    <p><i><small>Deadline: <?= $contactdetails->timeframe ?></small></i></p>
                                </div>
                                <div class="form-group">
                                    <p>Estimated Distance: <?= $contactdetails->distance ?>km</p>
                                </div>

                                <div class="form-group">
                                <form id="viewDetails" method="POST"  action="<?= ROOT ?>/map/index">
                                    <input type="hidden" name="order_id" value="<?= $contactdetails->order_id ?>">
                                    <button class="map-btn" type="submit">Map</button>
                                </form>
                                </div>

                                <div class="form-group">
                                        <form id="viewDetails" method="POST"  action="<?= ROOT ?>/CourierOrderDetails/">
                                            <input type="hidden" name="order_id" value="<?= $contactdetails->order_id ?>">
                                            <button class="view-btn" type="submit">View</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <div class="message-div">
                        <p>No Orders</p>
                    </div>
                    <?php endif; ?>
                    </div>
        
                
                    <br><br><br><br>
    
                </div>
    
                <div class="tab-content" id="completed-orders" style="display: none;">
                    
                    <div class="order-list" >
                    <?php if(!empty($completedorders)): ?>
                        <?php foreach ($completedorders as $contactdetails): ?>
                        <div class="order-card">
                            <h3>Order ID :<?= $contactdetails->order_id ?></h3>
                            <p>Pickup location:<?= $contactdetails->pickup_location ?></p>
                            <p>Delivery location:<?= $contactdetails->shipping_address ?></p>
                            <div class="form-group-row">
                                <div class="form-group">
                                    <p><i><small>Deadline: <?= $contactdetails->timeframe ?></small></i></p>
                                </div>
                                <div class="form-group">
                                    <p>Estimated Distance: <?= $contactdetails->distance ?>km</p>
                                </div>
                                <div class="form-group">
                                        <form id="viewDetails" method="POST"  action="<?= ROOT ?>/CourierOrderDetails/">
                                            <input type="hidden" name="order_id" value="<?= $contactdetails->order_id ?>">
                                            <button class="view-btn" type="submit">View</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    
                        <?php endforeach; ?>
                    <?php else: ?>
                    <div class="message-div">
                        <p>No Orders</p>
                    </div>
                    <?php endif; ?>    
                    </div>
                    <br>
                    <br>
                </div>
   
    </div>


    <script src="<?= ROOT ?>/assets/JS/courierOrders.js"></script>
</body>
</html>