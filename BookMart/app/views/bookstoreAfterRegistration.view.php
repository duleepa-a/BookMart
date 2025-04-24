<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/paymentMessage.css">
</head>
<body>

    <div class="payment-card">
        <div class="success-icon" style="background-color: #ffefd5;">
            <i class="fas fa-clock" style="color: #ff9800;"></i>
        </div>
        
        <h1 class="card-title">Registration Submitted</h1>
        <p class="card-message">Thank you for registering your bookstore with BookMart. Your application is being reviewed by our team. You will receive an email regarding your approval status soon.</p>
        
        <div class="divider"></div>
        
        <div class="payment-details">
            <span class="detail-label">Bookstore Name:</span>
            <span class="detail-value"><?= htmlspecialchars($bookstore['store_name']) ?></span>
        </div>
        
        <div class="payment-details">
            <span class="detail-label">Registration Date:</span>
            <span class="detail-value"><?= date("Y-m-d H:i:s") ?></span>
        </div>
        
        <div class="payment-details">
            <span class="detail-label">Email:</span>
            <span class="detail-value"><?= htmlspecialchars($bookstore['owner_email']) ?></span>
        </div>
        
        <a href="<?= ROOT ?>/" class="home-button">RETURN HOME</a>
    </div>

</body>
</html>