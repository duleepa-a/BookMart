<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart Payment Canceled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/paymentMessage.css">
</head>
<body>

    <div class="payment-card">
        <div class="error-icon">
            <i class="fas fa-times"></i>
        </div>
        
        <h1 class="card-title">Payment Canceled</h1>
        <p class="card-message">Your payment was not completed. You can try again or return to the home page.</p>
        
        <div class="divider"></div>
        
        <div class="payment-details">
            <span class="detail-label">Payment Status:</span>
            <span class="detail-value">Canceled</span>
        </div>

        <div class="payment-details">
            <span class="detail-label">Date & Time:</span>
            <span class="detail-value"><?= date("Y-m-d H:i:s") ?></span>
        </div>
        
        <a href="<?= ROOT ?>/" class="home-button">HOME</a>
    </div>

</body>
</html>
