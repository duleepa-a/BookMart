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
    <?php include 'courierNavbar.view.php'; ?> 
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Welcome Back Courier!</h1>
            <li><a href="<?= ROOT ?>/" ><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?= ROOT ?>/courierEarns"><i class="fa fa-money"></i> Earnings</a></li>
            <li><a href="<?= ROOT ?>/courierOrders" class="active"><i class="fa fa-clock"></i> Orders</a></li>
            <li><a href="<?= ROOT ?>/courierProfile"><i class="fa fa-user"></i> Profile</a></li>
        </ul>   
    </div>
    <div class="container">
        
            <h1 class="mtopic">Orders</h1> <br><br>
            
            <br>
            <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('all-orders')">All</button>
                <button class="tab-button" onclick="showTab('accepted-orders')">Accepted</button>
                <button class="tab-button" onclick="showTab('pending-orders')">Pending</button>
                <button class="tab-button last-child" onclick="showTab('completed-orders')">Completed</button>
            </nav>
    
            <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/registerCourier"  >
                <div class="tab-content" id="all-orders">
                    
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
                    

                    <br><br><br><br>
                
                </div>
    
    
                <div class="tab-content" id="accepted-orders" style="display: none;">
                    
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
    
                    
                    <br><br><br><br>
    
                </div>
    
                <div class="tab-content" id="pending-orders" style="display: none;">
                    
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
        
                
                    <br><br><br><br>
    
                </div>
    
                <div class="tab-content" id="completed-orders" style="display: none;">
                    
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
    
                    <br>
                    <br>
                </div>
            </form>
    </div>


    <script src="<?= ROOT ?>/assets/JS/courierOrders.js"></script>
</body>
</html>