<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart UI</title>
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/cart.css">
</head>
<body>
  <div class="cart-container">
    <div class="cart-items">
      <div class="cart-header">
        <input type="checkbox"> SELECT ALL (3 ITEM(S))
        <button class="delete-btn"><i class="fas fa-trash"></i> DELETE</button>
      </div><hr>

      <!-- Item 1 -->
      <div class="cart-item">
        <input type="checkbox">
        <img src="b1.jpg" alt="Example Image" width="100" height="100">

        <div class="item-details">
          <h4>Sarasavi</h4>
          <p>Five Feet Apart</p>
          <p>Rs. <span class="price">2599.00</span> <span class="original-price">Rs. 2999.00</span></p>
        </div>
        <div class="quantity">
          <input type="button" value="-">
          <input type="text" value="1">
          <input type="button" value="+">
        </div>
        <button class="icon-btn"><i class="fas fa-trash-alt"></i></button>
      </div>

      <!-- Item 2 -->
      <div class="cart-item">
        <input type="checkbox">
        <img src="b2.jpg" alt="Example Image" width="100" height="100">
        <div class="item-details">
          <h4>Perfect Deals</h4>
          <p>Little Women</p>
          <p>Rs. <span class="price">4749.05</span> <span class="original-price">Rs. 4999.00</span></p>
        </div>
        <div class="quantity">
          <input type="button" value="-">
          <input type="text" value="1">
          <input type="button" value="+">
        </div>
        <button class="icon-btn"><i class="fas fa-trash-alt"></i></button>
      </div>

      <!-- Unavailable Item -->
      <div class="cart-item unavailable">
        <input type="checkbox" disabled>
        <img src="b3.jpg" alt="Example Image" width="100" height="100">
        <div class="item-details">
          <h4>Unavailable Item</h4>
          <p>It End Wih Us</p>
          <p class="out-of-stock">Out of stock</p>
        </div>
        <div class="quantity">
          <input type="button" value="-" disabled>
          <input type="text" value="1" disabled>
          <input type="button" value="+" disabled>
        </div>
        <button class="icon-btn"><i class="fas fa-trash-alt"></i></button>
      </div>
    </div>

    <div class="order-summary">
      <h3>Order Summary</h3>
      <p>Subtotal: <span>Rs. 0</span></p>
      <p>Shipping Fee: <span>Rs. 0</span></p>
      <input type="text" placeholder="Enter Voucher Code">
      <button class="apply-btn">APPLY</button>
      <hr>
      <h4>Total: <span>Rs. 0</span></h4>
      <button class="checkout-btn">PROCEED TO CHECKOUT</button>
    </div>
  </div>
</body>
</html>
