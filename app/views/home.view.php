<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>BookMart </title>
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
                <select id="genres" name="genres" class="navbar-links-select" >
                    <option value="" disabled selected>Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="novels">Novels</option>
                    <option value="history">History</option>
                </select>
                <a href="<?= ROOT ?>/Login" class="navbar-links">Log In</a>
                <a href="<?= ROOT ?>/Register" class="navbar-links">Sign In</a>
        </div>
    </div>
    <div class="slider-container">
        <div class="slider">
            <img src="<?= ROOT ?>/assets/Images/ad banner 3.jpg" alt="Ad Banner 3" class="slider-image"/>
            <img src="<?= ROOT ?>/assets/Images/ad banner 2.jpg" alt="Ad Banner 2" class="slider-image"/>
            <img src="<?= ROOT ?>/assets/Images/ad banner 1.jpg" alt="Ad Banner 1" class="slider-image"/>
        </div>
        <button class="slider-prev"><i class="fa-solid fa-chevron-left fa-3x"></i></button>
        <button class="slider-next"><i class="fa-solid fa-chevron-right fa-3x"></i></button>
    </div>
    <div class="container">
        <br>
        <br>
        <center>
        <p class="sub-heading">EXPLORE OUR LATEST ARRIVALS</p>         
        <h1>New Arrivals</h1>
        <br><br>
        <div class="carousel">
                <button class="prev"><i class="fa-solid fa-chevron-left fa-lg"></i></button>
                <div class="book-cards">
                    <?php if (isset($newArrivals) && !empty($newArrivals)): ?>
                        <?php foreach ($newArrivals as $book): ?>
                            <div class="book-card">
                                <?php if ($book->discount != 0 ) : ?>
                                    <div class="discount"><?= htmlspecialchars($book->discount) ?>%</div>
                                <?php endif; ?>
                                <a href="<?= ROOT ?>/BookView/index/<?= $book->id ?>" class="book-card-link">
                                <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($book->cover_image) ?>" alt="<?= htmlspecialchars($book->title) ?>">
                                <p><?= htmlspecialchars($book->title) ?></p>
                                <p class="price">
                                    <?php if ($book->discount != 0 ): ?>
                                        <span class="old-price">Rs. <?= htmlspecialchars($book->price) ?></span><br>
                                        Rs. <?= htmlspecialchars($book->price - ($book->price)*($book->discount)/100) ?>
                                    <?php else: ?>
                                        Rs. <?= htmlspecialchars($book->price) ?>
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
        <br>
        <br>
        <p class="sub-heading">DISCOVER OUR TOP BESTSELLERS</p> 
        <h1>Best Seller's</h1>
        <br><br>

        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('fiction')">Fiction</button>
            <button class="tab-button" onclick="showTab('history')">History</button>
            <button class="tab-button" onclick="showTab('novel')">Novel</button>
            <button class="tab-button" onclick="showTab('romance')">Romance</button>
            <button class="tab-button" onclick="showTab('mystery')">Mystery</button>
            <button class="tab-button" onclick="showTab('horror')">Horror</button>
            <button class="tab-button" onclick="showTab('young-adult')">Young-Adult</button>
            <button class="tab-button" onclick="showTab('sci-fi')">Sci-fi</button>
            <button class="tab-button last-child" onclick="showTab('crime')">Crime</button>
        </nav>

        <?php
        $genres = ['fiction', 'history', 'novel', 'romance', 'mystery', 'horror', 'young-adult', 'sci-fi', 'crime']; 

        foreach ($genres as $genre): 
            $books = $bestSellers[$genre] ?? []; // Get books for the current genre or an empty array
        ?>

        <div class="tab-content" id="<?= $genre ?>" style="display: <?= $genre === 'fiction' ? 'block' : 'none' ?>;">
            <div class="carousel">
                <button class="prev prev-<?= $genre ?>"><i class="fa-solid fa-chevron-left fa-lg"></i></button>
                <div class="book-cards book-cards-<?= $genre ?>">
                    <?php if (empty($books)): ?>
                        <p class="message-text">No books available in this genre.</p>
                    <?php else: ?>
                        <?php foreach ($books as $book): ?>
                            <div class="book-card">
                                <a href="<?= ROOT ?>/BookView?id=<?= $book->id ?>" class="book-card-link">
                                    <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($book->cover_image) ?>" alt="<?= htmlspecialchars($book->title) ?>">
                                    <p><?= htmlspecialchars($book->title) ?></p>
                                    <p class="price">
                                        <span class="old-price">Rs. <?= htmlspecialchars($book->price + ($book->price * $book->discount / 100)) ?></span><br> 
                                        Rs. <?= htmlspecialchars($book->price) ?>
                                    </p>
                                    <br>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <button class="next next-<?= $genre ?>"><i class="fa-solid fa-chevron-right fa-lg"></i></button>
            </div>
        </div>

        <?php endforeach; ?>
        
        <br><br>
        <p class="sub-heading">EXPLORE INSIGHTS FROM OUR BOOKLOVERS</p>
        <h1>Articles</h1>
        <br><br>
        </center>

        <div class="article-card">
            <div class="article-content">
                <h2>Title of the article</h2>
                <p>small description about the article..........................................................
                ..........................................................</p>
                <i><small>By author's name | date</small></i>
            </div>
            <img src="#" alt="Placeholder Image">
        </div>

        <div class="article-card">
            <div class="article-content">
                <h2>Title of the article</h2>
                <p>small description about the article..........................................................
                ..........................................................</p>
                <i><small>By author's name | date</small></i>
            </div>
            <img src="#" alt="Placeholder Image">
        </div>

        <div class="login-link">
            <a href="<?= ROOT ?>/login">Log in to see more <i class="fa-solid fa-arrow-right-to-bracket"></i></a>
        </div>
        <br>
        <center>
        <br><br>        
        <h1>Popular Categories</h1>
        <br><br>
        <div class="category-cards">
            <div style="background-image: url(<?= ROOT ?>/assets/Images/fantasy-cover.png);"class="category-card" onclick="window.location.href=''">
                <div class="category-card-content">
                <!-- <img src="<?= ROOT ?>/assets/Images/login-page-pic.png" alt="Fiction" /> -->
                <div class="category-title">FANTASY</div>
            </div>
            </div>         
            <div style="background-image: url(<?= ROOT ?>/assets/Images/romance-cover.png);" class="category-card" onclick="window.location.href=''" >
                <div class="category-card-content">
                <!-- <img src="non-fiction.jpg" alt="Non-Fiction" /> -->
                <div class="category-title">ROMANCE</div>
                </div>
            </div>
            <div style="background-image: url(<?= ROOT ?>/assets/Images/mystery-cover.png);" class="category-card" onclick="window.location.href=''">
                <div class="category-card-content">
                <!-- <img src="mystery.jpg" alt="Mystery" /> -->
                <div class="category-title">MYSTERY</div>
                </div>
            </div>         
            <div style="background-image: url(<?= ROOT ?>/assets/Images/horror-cover.png);" class="category-card" onclick="window.location.href=''">
                <div class="category-card-content">
                <!-- <img src="fantasy.jpg" alt="Fantasy" /> -->
                <div class="category-title">HORROR</div>
                </div>
            </div>
        </div>
        </center>
    </div>
    <br><br><br>
    <div class="footer">
        <div class="links">
            <a href="<?= ROOT ?>/contactUs">Contact Us</a><br><br>
            <a href="<?= ROOT ?>/aboutUs">About Us</a>
        </div>
        <br>
        <div class="copyright">
            &copy; 2024 BookMart. All rights reserved.
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/index.js"></script>
</body>
</html>