<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title><?= $book->title; ?> </title>
</head>
<body>

<!-- navBar division begin -->
<?php include 'homeNavBar.view.php'; ?>        
<!-- navBar division end -->

    <div class="large-container">
    <?php if (isset($book) && !empty($book)): ?>
      <div class="container">
          <div class="book-container">
              <div class="book-image">
                  <img src="<?= ROOT ?>/assets/Images/book cover images/<?= $book->cover_image; ?>" alt="<?= $book->title; ?>">
              </div>
              <div class="book-details">
                  <div class="book-title">
                      <h1><?= $book->title; ?></h1>
                      <a href="<?= ROOT ?>/BookstoreController/showProfile/<?= $seller->ID; ?>" style="text-decoration:none;"><p class="bookstore"><?= $seller->username; ?></p></a>
                  </div>
                  <div class="book-price-details">
                    <div class="book-details-availability-condition">
                          <div class="book-details-availability">
                              <?= $book->quantity > 0 ? 'In Stock' : 'Out of Stock'; ?>
                          </div>
                          <div class="book-details-condition">
                              Condition: 
                              <?= ucfirst($book->book_condition); ?>
                          </div>
                          <div class="condition-details">
                              <ul>
                                <li>
                                    <strong>New:</strong>
                                    <p>The book is in pristine condition, with no signs of wear or tear. It has never been read, and all original packaging (if applicable) is intact. Pages are crisp and unmarked, and the cover is free of any defects.</p>
                                </li>
                                <li>
                                    <strong>Like New:</strong>
                                    <p>The book appears almost new, with very minimal signs of handling. It may have been read once or twice but shows no wear on the cover or pages. There are no markings, and the spine is unbroken.</p>
                                </li>
                                <li>
                                    <strong>Good:</strong>
                                    <p>The book is in good condition but may show some signs of wear, such as minor creases on the cover or slightly dog-eared pages. There may be a few markings, highlighting, or notes, but these do not detract significantly from the reading experience.</p>
                                </li>
                                <li>
                                    <strong>Acceptable:</strong>
                                    <p>The book has noticeable wear, such as scuff marks, scratches, or a cracked spine. There may be significant highlighting, underlining, or notes in the margins. While the book is still readable, it may have some missing pages or loose binding.</p>
                                </li>
                                <li>
                                    <strong>Poor:</strong>
                                    <p>The book is heavily worn and may have significant damage, such as torn pages, a damaged cover, or extensive markings. It may be in a state where it is only suitable for reference or salvage. The content is likely still readable, but the book is not aesthetically pleasing.</p>
                                </li>
                            </ul>
                            </div>
                      </div>
                      <?php if ($book->discount > 0): ?>
                      <p class="old-price"><del>LKR <?= number_format($book->price); ?></del></p>
                      <?php else: ?>
                        <p class="old-price"><del></del></p>
                       <?php endif; ?>
                      <p class="price">LKR <?= number_format($book->price - ($book->price * $book->discount / 100)); ?></p>
                  </div>
                  <div class="book-info">
                      <h3>Book Info</h3>
                      <ul>
                          <li><strong>Language</strong>: <?= $book->language; ?></li>
                          <li><strong>Author</strong>: <?= $book->author; ?></li>
                          <li><strong>Genre</strong>: <?= ucfirst($book->genre); ?></li>
                          <li><strong>Publisher</strong>: <?= $book->publisher; ?></li>
                          <li><strong>ISBN</strong>: <?= $book->ISBN; ?></li>
                      </ul>
                  </div>
                  <?php if($book->quantity > 0): ?>
                  <div class="product-actions">
                            <div class="quantity-selector">
                                <button class="quantity-btn" onclick="changeQuantity(-1)">-</button>
                                <span class="quantity" id="quantity">1</span>
                                <button class="quantity-btn" onclick="changeQuantity(1)">+</button>
                            </div>
                        <button class="buy-now-btn" onclick="buyNow()">Buy now</button>
                        <button class="add-to-cart-btn" onclick="addToCart()">Add to cart</button>
                  </div>
                  <?php else: ?>
                    <div class="out-of-stock">
                        <p> Out of stock</p>
                    </div>
                  <?php endif;?>
              </div>
          </div>
      </div>
    <?php else: ?>
    <div class="message-div">
      <p>Book details are not available.</p>
    </div>
      <?php endif; ?>

    <br><br>
    <nav class="tabs">
        <button class="tab-button active first-child" onclick="showTab('book-reviews')">Book Reviews</button>
        <button class="tab-button" onclick="showTab('book-view-description')">Description</button>
    </nav>

    <div class="tab-content" id="book-reviews">
    <div class="review-container">
            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="card">
                        <div class="card-header">
                            <span class="user-name"><?= htmlspecialchars($review->username) ?></span>
                            <span class="date"><?= date('Y/m/d', strtotime($review->review_date)) ?></span>
                        </div>
                        <div class="card-content">
                            <div class="rating-stars">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star" style="color: <?= $i <= $review->rating ? '#ffc107' : '#e4e5e9' ?>;"></i>
                                <?php endfor; ?>
                            </div>
                            <p><?= nl2br(htmlspecialchars($review->comment)) ?></p>
                        </div>
                        <div class="card-footer">
                            <span class="like-icon <?= $review->liked == 1 ? 'liked' : '' ?>" data-review-id="<?= $review->id ?>">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </span>
                            <span class="like-count"><?= htmlspecialchars($review->likes) ?></span>
                        </div>
                    </div>
                    <?php if(!empty($review->reply)): ?>
                        <div class="card reply">
                            <div class="card-header">
                                <span class="user-name"><?= htmlspecialchars($seller->username) ?></span>
                            </div>
                            <div class="card-content">
                                <p><?= nl2br(htmlspecialchars($review->reply)) ?></p>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach; ?>
            <?php else: ?>
            <div class="message-div">
                <p>No reviews yet for this book.</p> <i class="fa-regular fa-face-frown fa-lg"></i>
            </div>
            <?php endif; ?>
        </div>
        <br><br><br>
    </div>
    <div class="tab-content" id="book-view-description" style="display: none;">
      <div class="book-description">
        <p class="book-description-text"><?= nl2br(htmlspecialchars($book->description)); ?></p>
      </div>
    </div>
    
    <h2 class="heading">Recommend for you</h2>
    <div class="carousel">
                <div class="book-cards">
                    <?php if (isset($recommended) && !empty($recommended)): ?>
                        <?php foreach ($recommended as $recbook): ?>
                            <div class="book-card">
                                <?php if ($recbook->discount != 0 ) : ?>
                                    <div class="bookcard-discount"><?= htmlspecialchars($recbook->discount) ?>%</div>
                                <?php endif; ?>
                                <a href="<?= ROOT ?>/BookView/index/<?= $recbook->id ?>" class="book-card-link">
                                <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($recbook->cover_image) ?>" alt="<?= htmlspecialchars($recbook->title) ?>">
                                <p><?= htmlspecialchars($recbook->title) ?></p>
                                <p class="bookcard-price">
                                    <?php if ($recbook->discount != 0 ): ?>
                                        <span class="bookcard-old-price">Rs. <?= htmlspecialchars($recbook->price) ?></span><br>
                                        Rs. <?= htmlspecialchars($recbook->price - ($recbook->price)*($recbook->discount)/100) ?>
                                    <?php else: ?>
                                        Rs. <?= htmlspecialchars($recbook->price) ?>
                                    <?php endif; ?>
                                </p>
                                <br>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                    <div class="message-div">
                        <p>No recommendations at the moment.</p>
                    </div>
                    <?php endif; ?>
                </div>
    </div>

    <!-- footer begin -->
    <?php include 'footer.view.php'; ?>   
    <!-- footer end --> 
    </div>
    <div id="custom-alert" class="error" style="display: none;">
        <div class="error__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
            </svg>
        </div>
        <div class="error__title" id="alert-message">Alert message goes here</div>
        <div class="error__close" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
            </svg>
        </div>
    </div>

    <script src="<?= ROOT ?>/assets/JS/bookView.js"></script>
    <script>
        const isLoggedIn = <?= isset($_SESSION['user_id']) ? 'true' : 'false' ?>;
        const isBuyer = <?= isset($_SESSION['user_id']) && ($_SESSION['user_role'] == 'buyer' || $_SESSION['user_role'] == 'bookSeller' ) ? 'true' : 'false'?>;
        const isAvailable = <?= isset($book->status) && $book->status == 'available' ? 'true' : 'false' ?>;

        function showAlert(message) {
            const alertBox = document.getElementById("custom-alert");
            const alertMsg = document.getElementById("alert-message");
            alertMsg.textContent = message;
            alertBox.style.display = "flex";

            setTimeout(() => {
                closeAlert();
            }, 4000);
        }

        function closeAlert() {
            document.getElementById("custom-alert").style.display = "none";
        }

        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.like-icon').forEach(function (icon) {
                icon.addEventListener('click', function () {
                    const reviewId = this.getAttribute('data-review-id');
                    const likeCountElem = this.nextElementSibling;
                    const iconElem = this;

                    fetch('http://localhost/BookMart/public/user/like', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                        body: 'id=' + encodeURIComponent(reviewId)
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            likeCountElem.textContent = data.likes;
                            iconElem.classList.toggle('liked', data.liked);
                        } else {
                        
                        }
                    });
                });
            });
        });
        let maxQuantity = <?php echo $book->quantity; ?>; 

        function changeQuantity(amount) {
            let quantityElement = document.getElementById("quantity");
            let quantity = parseInt(quantityElement.innerText);

            quantity = Math.min(maxQuantity, Math.max(1, quantity + amount));

            quantityElement.innerText = quantity;
        }


        function buyNow() {
            if (!isLoggedIn) {
                showAlert("Please log in to buy this item.");
                return;
            }
            if (!isBuyer) {
                showAlert("You must be logged in as a Buyer account.");
                return;
            }

            if (!isAvailable) {
                showAlert("This Item is not Available at the moment.");
                return;
            }
            let quantity = document.getElementById("quantity").innerText;
            let productId = <?php echo $book->id; ?>; 
            
            window.location.href = "<?= ROOT ?>/payment/checkOut/" + productId + "/" +quantity;
        }
        function addToCart() {
            if (!isLoggedIn) {
                showAlert("Please log in to add this item to the cart.");
                return;
            }
            if (!isBuyer) {
                showAlert("You must be logged in as a Buyer account.");
                return;
            }
            if (!isAvailable) {
                showAlert("This Item is not Available at the moment.");
                return;
            }
            let quantity = document.getElementById("quantity").innerText;
            let productId = <?php echo $book->id; ?>; 
            
            window.location.href = "<?= ROOT ?>/payment/addToCart/" + productId + "/" +quantity;
        }
    </script>
</body>
</html>