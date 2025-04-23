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
        <form class="contact-form" id="contactForm" action="<?= ROOT ?>/ContactUs/create" method="POST">
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

  <!-- footer begin -->
  <?php include 'footer.view.php'; ?>   
    <!-- footer end -->
  <script src="script.js"></script>
</body>
</html>
