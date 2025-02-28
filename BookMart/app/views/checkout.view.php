<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check out</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/checkout.css">
</head>
<body>

    <!-- navBar division begin -->
    <?php include 'homeNavBar.view.php'; ?>
    <!-- navBar division end -->

    <div class="container">
        <header>
            <div class="logo">BookStore</div>
            <div class="cart-icon"><i class="fa-solid fa-shop"></i></div>
        </header>

        <div class="checkout-container">
            <div class="order-details">
                <div class="section-title">Order Details</div>

                <div class="book-item">
                    <div class="book-image">
                        <!-- Add actual book image -->
                        <img src="<?= ROOT ?>/assets/Images/book cover images/<?= $book->cover_image; ?>" alt="<?= $book->title ?>" class="book-img" >
                    </div>
                    <div class="book-info">
                        <div class="book-title"><?= htmlspecialchars($book->title) ?></div>
                        <div class="book-author">by <?= htmlspecialchars($book->author) ?></div>
                        <div class="price-info">
                            <span class="discounted-price">Rs. <?= number_format($discountedPrice, 2) ?></span>
                            <span class="original-price">Rs. <?= number_format($book->price, 2) ?></span>
                            <span class="discount-tag">-<?= $book->discount ?>%</span>
                        </div>
                        <div class="qty-info">Qty: <?= $quantity ?></div>
                    </div>
                </div>

                <div class="section-title">Delivery Address</div>
                <div class="address-form">
                    <div class="form-group">
                        <label for="street">Street Address</label>
                        <input type="text" id="street" value="<?= htmlspecialchars($buyer->street_address) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" value="<?= htmlspecialchars($buyer->city) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" id="province" value="<?= htmlspecialchars($buyer->province) ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="district">District</label>
                        <input type="text" id="district" value="<?= htmlspecialchars($buyer->district) ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="order-summary">
                <div class="section-title">Order Summary</div>

                <div class="promo-box">
                    <input type="text" class="promo-input" placeholder="Enter Store/BookMart Code">
                    <button class="promo-btn">APPLY</button>
                </div>

                <div class="summary-row">
                    <span>Items Total (<?= $quantity ?> items)</span>
                    <span>Rs. <?= number_format($discountedPrice * $quantity, 2) ?></span>
                </div>
                <div class="summary-row">
                    <span>Delivery Fee</span>
                    <span>Rs. <?= number_format($deliveryFee, 2) ?></span>
                </div>
                <div class="summary-total">
                    <span>Total:</span>
                    <span class="total-price">Rs. <?= number_format($totalPrice + $deliveryFee, 2) ?></span>
                </div>
                <div class="vat-text">VAT included, where applicable</div>

                <button class="checkout-btn">Proceed to Pay</button>
            </div>
        </div>

    </div>

    <!-- Footer division begin -->
    <?php include 'smallFooter.view.php'; ?>
    <!-- Footer division end -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.querySelector(".checkout-btn").addEventListener("click", function () {
        fetch("<?= ROOT ?>/Payment/process", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                amount: <?= ($totalPrice + $deliveryFee) * 100 ?>, // Stripe uses cents
                book_title: <?= json_encode($book->title) ?>
            }),
        })
        .then(response => response.json())
        .then(data => {
            console.log("Response:", data); // Log response in the browser console
            if (data.error) {
                alert("Payment Error: " + data.error.message);
            } else if (data.id) {
                window.location.href = data.url; // Redirect to Stripe checkout page
            } else {
                alert("Unexpected error occurred.");
            }
        })
        .catch(error => console.error("Fetch error:", error));
    });

    </script>

</body>
</html>
