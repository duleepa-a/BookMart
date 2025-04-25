<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart UI</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/cart.css">
</head>
<body>
  <?php include 'homeNavBar.view.php'; ?>  
  <div class="container">
    <?php if (!empty($cart)): ?>
          <div class="cart-container">
            <div class="cart-items">
              <div class="cart-header">
                <div class="select-all">
                  <input type="checkbox" id="selectAll">
                  <label for="selectAll">SELECT ALL <?= count($cart) ?> ITEM(S)</label>
                </div>
                <button class="delete-btn"><i class="fas fa-trash"></i> Delete All</button>
              </div>
              <hr>

              <?php $subtotal = 0; ?>
              <?php foreach ($cart as $item): ?>
                <?php
                  $itemTotal = $item['price'] * $item['quantity'];
                  $subtotal += $itemTotal;
                ?>
                <div class="cart-item" data-id="<?= $item['book_id'] ?>">
                  <input type="checkbox">
                  <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($item['cover_image']) ?>" alt="Book Cover">

                  <div class="item-details">
                    <h4><?= htmlspecialchars($item['seller_username'] ?? 'Seller') ?></h4> <!-- Optional -->
                    <p><?= htmlspecialchars($item['title']) ?></p>
                    <p>
                      Rs. <span class="price"><?= number_format($item['price'], 2) ?></span>
                      <?php if ($item['discount'] > 0): ?>
                        <span class="original-price">Rs. <?= number_format($item['original_price'], 2) ?></span>
                      <?php endif; ?>
                    </p>
                  </div>

                  <div class="quantity">
                    <input type="button" value="-" class="qty-decrease" data-id="<?= $item['book_id'] ?>">
                    <input type="text" value="<?= $item['quantity'] ?>" readonly>
                    <input type="button" value="+" class="qty-increase" data-id="<?= $item['book_id'] ?>" data-quantity="<?= $item['max_quantity'] ?>">
                  </div>

                  <form action="<?= ROOT ?>/Payment/removeBook/<?= $item['book_id'] ?>" method="post">
                    <button class="icon-btn"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="order-summary">
              <h3>Order Summary</h3>
              <p>Subtotal: <span>Rs. <?= number_format($subtotal, 2) ?></span></p>
              <p>Shipping Fee: <span>Rs. <?= number_format(count($cart)*250,2) ?></span></p>
              <?php if (!empty($couponMessage)): ?>
                    <p style="color: <?= (strpos($couponMessage, 'applied') !== false) ? 'green' : 'red' ?>; margin-top: 5px; margin-bottom: 10px;">
                        <?= $couponMessage ?>
                    </p>
              <?php endif; ?>
              <form action="<?= ROOT ?>/Payment/cartView" method="post">
                <input type="text" placeholder="Enter Coupon Code" class="inuput-textbox" name="coupon-code">
                <button class="apply-btn">APPLY</button>
              </form>
              <hr>
              <h4>Total: <span>Rs. <?= number_format($subtotal + number_format(count($cart)*250,2), 2) ?></span></h4>
              <form action="<?= ROOT ?>/Payment/cartCheckout" method="post">
                <button class="checkout-btn">PROCEED TO CHECKOUT</button>
              </form>
            </div>
        </div>
    <?php else: ?>
        <div class="empty-cart">
          <h2>Your cart is currently empty.</h2>
      </div>
    <?php endif; ?>
  </div>
  <script>
    document.querySelectorAll('.qty-increase').forEach(button => {
      button.addEventListener('click', () => {
        const bookId = button.dataset.id;
        const quantity = button.dataset.quantity;
        window.location.href = `<?= ROOT ?>/Payment/increase/${bookId}/${quantity}`;
      });
    });

    document.querySelectorAll('.qty-decrease').forEach(button => {
      button.addEventListener('click', () => {
        const bookId = button.dataset.id;
        window.location.href = `<?= ROOT ?>/Payment/decrease/${bookId}`;
      });
    });
    const selectAll = document.getElementById('selectAll');
    selectAll.addEventListener('change', function() {
      document.querySelectorAll('.cart-item input[type="checkbox"]:not(:disabled)').forEach(cb => {
        cb.checked = this.checked;
      });
    });

    
    document.querySelector('.delete-btn').addEventListener('click', () => {
      const checked = document.querySelectorAll('.cart-item input[type="checkbox"]:checked');
      const ids = Array.from(checked).map(cb => cb.closest('.cart-item').dataset.id);
      if (ids.length > 0) {
        const form = document.createElement('form');
        form.method = 'post';
        form.action = '<?= ROOT ?>/Payment/deleteSelected';

        ids.forEach(id => {
          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'book_ids[]';
          input.value = id;
          form.appendChild(input);
        });

        document.body.appendChild(form);
        form.submit();
      }
    });


  </script>

</body>
</html>
