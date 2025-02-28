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
                      <p class="bookstore"><?= $seller->username; ?></p>
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
                  <div class="product-actions">
                        <div class="quantity-selector">
                            <button class="quantity-btn" onclick="changeQuantity(-1)">-</button>
                              <span class="quantity" id="quantity">1</span>
                            <button class="quantity-btn" onclick="changeQuantity(1)">+</button>
                        </div>
                      <button class="buy-now-btn" onclick="buyNow()">Buy now</button>
                      <button class="add-to-cart-btn">Add to cart</button>
                  </div>
              </div>
          </div>
      </div>
    <?php else: ?>
      <p>Book details are not available.</p>
    <?php endif; ?>

    <br><br>
    <nav class="tabs">
        <button class="tab-button active first-child" onclick="showTab('book-reviews')">Book Reviews</button>
        <button class="tab-button" onclick="showTab('book-view-description')">Description</button>
    </nav>

    <div class="tab-content" id="book-reviews">
        <div class="review-container">
        <div class="card">
            <div class="card-header">
                <span class="user-name">Duleepa Edirisinghe</span>
                <span class="date">2024/08/20</span>
            </div>
            <div class="card-content">
                "The Great Gatsby" is a timeless classic. Fitzgerald's writing style is captivating, and the themes of ambition and love still resonate today. Highly recommended for literature enthusiasts!
            </div>
            <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">12</span>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <span class="user-name">Nimantha Madushan</span>
                <span class="date">2024/08/18</span>
            </div>
            <div class="card-content">
                I recently read "1984" by George Orwell, and it blew my mind! The dystopian world Orwell creates is terrifying yet thought-provoking. A must-read for anyone who enjoys science fiction with deep societal commentary.
            </div>
            <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">9</span>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <span class="user-name">Rasheen Mohommad</span>
                <span class="date">2024/08/16</span>
            </div>
            <div class="card-content">
                "To Kill a Mockingbird" is an incredible read! Harper Lee's portrayal of racial injustice in the Deep South is both heartbreaking and inspiring. The characters, especially Atticus Finch, are unforgettable.
            </div>
            <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">15</span>
            </div>
            </div>
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
                <button class="prev"><i class="fa-solid fa-chevron-left fa-lg"></i></button>
                <div class="book-cards">
                    <?php if (isset($recommended) && !empty($recommended)): ?>
                        <?php foreach ($recommended as $recbook): ?>
                            <div class="book-card">
                                <?php if ($recbook->discount != 0 ) : ?>
                                    <div class="bookcard-discount"><?= htmlspecialchars($recbook->discount) ?>%</div>
                                <?php endif; ?>
                                <a href="<?= ROOT ?>/BookView/index/<?= $book->id ?>" class="book-card-link">
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
                        <p>No new arrivals at the moment.</p>
                    <?php endif; ?>
                </div>
                <button class="next"><i class="fa-solid fa-chevron-right fa-lg"></i></button>
  </div>

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
    </div>
    <script src="<?= ROOT ?>/assets/JS/bookView.js"></script>
    <script>
        let maxQuantity = <?php echo $book->quantity; ?>; 

        function changeQuantity(amount) {
            let quantityElement = document.getElementById("quantity");
            let quantity = parseInt(quantityElement.innerText);

            quantity = Math.min(maxQuantity, Math.max(1, quantity + amount));

            quantityElement.innerText = quantity;
        }


        function buyNow() {
            let quantity = document.getElementById("quantity").innerText;
            let productId = <?php echo $book->id; ?>; 
            
            window.location.href = "<?= ROOT ?>/payment/checkOut/" + productId + "/" +quantity;
        }
    </script>
</body>
</html>