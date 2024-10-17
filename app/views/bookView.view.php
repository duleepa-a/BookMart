<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?= $book->title; ?> </title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
        <div class="search-bar-div">
            <input type="text" class="search-bar" placeholder="Search your book, bookstore" />
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
        </div>
        <div class="nav-links">
                <?php if(!isset($_SESSION['user_status'])):?>
                  <select id="genres" name="genres" class="navbar-links-select" >
                    <option value="" disabled selected>Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="novels">Novels</option>
                    <option value="history">History</option>
                   </select>
                  <a href="<?= ROOT ?>/Login" class="navbar-links">Log In</a>
                  <a href="<?= ROOT ?>/Register" class="navbar-links">Sign In</a>
                <?php else: ?>
                  <select id="genres" name="genres" class="navbar-links-select">
                    <option value="" disabled selected>Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="novels">Novels</option>
                    <option value="history">History</option>
                   </select>
                  <a href="./Login.html" class="navbar-links">My Profile</a>
                  <a href="./Login.html" class="navbar-links">Orders</a>
                  <a href="./Login.html" class="navbar-links">Chat</a>
                  <a href="./Login.html" class="navbar-links"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
                  <a href="./Login.html" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                  <button id="logoutButton" class="navbar-links-select">Log Out</button>
                <?php endif; ?>
          </div>     
    </div>
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
                            <button class="quantity-btn">-</button>
                              <span class="quantity">1</span>
                            <button class="quantity-btn">+</button>
                        </div>
                      <button class="buy-now-btn">Buy now</button>
                      <button class="add-to-cart-btn">Add to cart</button>
                  </div>
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
            <!-- <div class="sort-section">
              <span class="sortby">Sort By:</span>
              <select>
                <option>Select sort</option>
              </select>
            </div> -->
          
            <div class="card">
              <div class="card-header">
                <span class="user-name">User name</span>
                <span class="date">2024/08/24</span>
              </div>
              <div class="card-content">
                Content..........................................................................................................
                .....................................................................................................................
                .....................................................................................................................
              </div>
              <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">0</span>
              </div>
            </div>
          
            <div class="card">
              <div class="card-header">
                <span class="user-name">User name</span>
                <span class="date">2024/08/24</span>
              </div>
              <div class="card-content">
                Content..........................................................................................................
                .....................................................................................................................
                .....................................................................................................................
              </div>
              <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">0</span>
              </div>
            </div>
          
            <div class="card">
              <div class="card-header">
                <span class="user-name">User name</span>
                <span class="date">2024/08/24</span>
              </div>
              <div class="card-content">
                Content..........................................................................................................
                .....................................................................................................................
                .....................................................................................................................
              </div>
              <div class="card-footer">
                <span class="like-icon"><i class="fa-solid fa-thumbs-up"></i></span>
                <span class="like-count">0</span>
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
    

    <div class="footer">
        <div class="links">
            <a href="./contactUs.html">Contact Us</a><br><br>
            <a href="./aboutUs.html">About Us</a>
        </div>
        <br>
        <div class="copyright">
            &copy; 2024 BookMart. All rights reserved.
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/bookView.js"></script>
</body>
</html>