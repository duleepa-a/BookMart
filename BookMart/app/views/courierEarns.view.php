<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Available Orders</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierEarns.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
  <?php include 'homeNavBar.view.php'; ?>
    
  <?php include 'commonSidebar.view.php'; ?>
    
    <div class="container">
          <h1 class="earnings-title">Earnings</h1>
          <div class="earnings-summary">
              <div class="earnings-box">
                <h2>Rs.</h2><br>
                <p class="amount"><b>1526.73</b></p><br><br><brS>
                <h3>Today Earns</h3>
              </div>
              <div class="earnings-box">
                <br><br><p class="amount"><b>32</b></p><br><br>
                <h3>Completed Orders</h3>
              </div>
          </div>
          <br><br>
          <section class="last-days">
              <h3>Last 5 Days</h3>
              <div class="days-table">
                <div class="table-header">
                  <span><b>Completed</b></span>
                  <span><b>Earnings</b></span>
                </div>
                <div class="table-row">
                  <span>33</span>
                  <span>2098.36</span>
                </div>
                <div class="table-row">
                  <span>33</span>
                  <span>2098.36</span>
                </div>
                <div class="table-row">
                  <span>33</span>
                  <span>2098.36</span>
                </div>
                <div class="table-row">
                  <span>33</span>
                  <span>2098.36</span>
                </div>
                <div class="table-row">
                  <span>33</span>
                  <span>2098.36</span>
                </div>
              </div>
          </section>
    </div>
    <script src="<?= ROOT ?>/assets/JS/courierHome.js"></script>
</body>
</html>