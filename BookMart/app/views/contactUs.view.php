<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/contactUs.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'homeNavBar.view.php'; ?>
    <!-- navBar division end -->
    <div class="container">
      <div class="contact-container">
        <h1>CONTACT US</h1>
        <p>
          Send us a message and we'll get back to you as soon as possible.<br>
          Looking forward to hearing from you.
        </p>
        <form class="contact-form" id="contactForm" action="<?= ROOT ?>/ContactUs/create" enctype="multipart/form-data" method="POST">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" placeholder="Enter your name" required>

          <label for="email">E-mail:</label>
          <input type="email" id="email" name="email" placeholder="Enter your e-mail" required>

          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>

          <input type="hidden" id="status" name="status" placeholder="0" required>

          <button type="submit" class="submit-btn">Send</button>
        </form>
      </div>
    </div>

  <!-- <?php if (isset($_SESSION['flash_message'])): ?>
    <div class="flash-message">
      <?=$_SESSION['flash_message']; ?>
      <?php unset($_SESSION['flash_message']); ?> 
    </div>
  <?php endif; ?> -->

  <footer class="footer">
        <div class="footer-content">
            <div class="footer-left">
                <h2><b>Book<span class="highlight">Mart</span></b></h2>
                <p><a href="<?= ROOT ?>/home"><b>Home</b></a><b> | </b><a href="<?= ROOT ?>/contactUs"><b>Contact Us</b></a><b>    |   </b><a href="<?= ROOT ?>/AboutUs"><b>About Us</b></a></p>
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
  <script src="script.js"></script>
</body>
</html>
