<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Available Orders</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierComplains.css">
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
            <li><a href="<?= ROOT ?>/courierEarns" ><i class="fa fa-money"></i> Earnings</a></li>
            <li><a href="<?= ROOT ?>/CourierOrderDetails/OrderPage"><i class="fa fa-clock"></i> My Orders</a></li>
            <li><a href="<?= ROOT ?>/courierComplains" class="active"><i class="fa-solid fa-circle-exclamation"></i> Complains</a></li>
            <li><a href="<?= ROOT ?>/courierProfile"><i class="fa fa-user"></i> Profile</a></li>
        </ul>   
    </div>
    
    <div class="container">
    <div class="profile-container">
        <h1 class="earnings-title">Complain</h1>
        <br><br>
        <h4>
        If you're facing any issues during your delivery tasks—whether<br>
        it's related to parcel pickup, delivery location, customer behavior,<br>
        system errors, or any other difficulty—please let us know here.
        </h4>
        <br>
    <form class="contact-form" id="courierComplains" action="<?= ROOT ?>/CourierComplains/create" enctype="multipart/form-data" method="POST">
        <div>
            <label for="name"><bl>Order ID:</bl></label><br>
            <input type="text" id="order_id" name="order_id" placeholder="Enter order Id" required>
        </div>
<br>
        <div>
            <label for="message">Problem:</label><br>
            <textarea id="message" name="message" rows="5" placeholder="Enter your problem" required></textarea>
        </div>
<br>
        <div>
            <label  for="status"></label>
            <input type="hidden" id="status" name="status" placeholder="0" required>
        </div>

      <button type="submit" class="submit-btn">Complain</button>
    </form>
    </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/courierHome.js"></script>
</body>
</html>