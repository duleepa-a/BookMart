<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Available Orders</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierOrderDetails.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <?php include 'courierNavbar.view.php'; ?> 
    <main>
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h3>Order ID: <input type="text" value="4001" readonly></h3>
            
            <form>
                <label>Pickup Location:</label>
                <input type="text" value="No. 22, Colombo 07" readonly>

                <label>Delivery Location:</label>
                <input type="text" value="No. 22, Colombo 07" readonly>

                <label>Customer Name:</label>
                <input type="text" value="Kusal" readonly>

                <label>Contact Number:</label>
                <input type="text" value="071 2199278" readonly>

                <label>Payment Amount:</label>
                <input type="text" value="Rs. 950.00" readonly>

                <label>Estimated Distance:</label>
                <input type="text" value="22 km" readonly>

                <label>Delivery Timeframe:</label>
                <input type="text" value="12/09/2024" readonly>
                
                <button type="button" class="accept-button">Accept</button>
            </form>
        </div>
    </div>    


    </main>

    <footer class="footer">
        <hr>
        <div class="footer-content">
            <div class="footer-left">
                <h2><b>Book<span class="highlight">Mart</span></b></h2>
                <p><a href="#"><b>Home</b></a><b> | </b><a href="#"><b>Contact Us</b></a><b>    |   </b><a href="#"><b>About Us</b></a></p>
                <p>&copy; 2024 BookMart, all rights reserved.</p>
            </div>
            <div class="footer-center">
                <p><b><span>&#128222;</span> +1.555.555.5555</b></p>
                <p><b><span>&#9993;</span> bookmart@gmail.com</b></p>
            </div>
            <div class="footer-right">
                <h4 style="padding-left: 60px;">OUR VISION</h4>
                <p>"To revolutionize the online book market in Sri Lanka by providing an inclusive platform <br>where bookstores, sellers, and buyers can seamlessly connect, fostering a culture of reading<br>and promoting sustainable practices through second-hand book trading."</p>
                <p style="padding-left: 40px;"><b>BookMart &copy; 2024</b></p>
                <br><br>
            </div>
        </div>
    </footer>

    <script src="<?= ROOT ?>/assets/JS/courierOrderDetails.js"></script>
</body>
</html>