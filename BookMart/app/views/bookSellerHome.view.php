<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart </title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'homeNavBar.view.php'; ?>        
    <!-- navBar division end -->
    <div class="large-container"> 
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
                            <p class="message-text">No new arrivals at the moment.</p>
                        <?php endif; ?>
                    </div>
                    <button class="next"><i class="fa-solid fa-chevron-right fa-lg"></i></button>
                </div>
                <br>
            <br>   
            <div class="paragraph-section section">
                <div class="paragraph-text">
                    <h1 id="dynamic-heading">"Connecting Book Lovers Across Sri Lanka"</h1>
                    <p id="dynamic-paragraph">
                        "From timeless classics to the latest reads, find everything in one convenient marketplace."
                    </p>
                </div>
                <div class="paragraph-button">
                    <button class="btn-paragraph-hero" 
                    onclick="navigateTo('<?= ROOT ?>/register')">Start Shopping
                        <svg class="icon" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            fill-rule="evenodd"
                            d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z"
                            clip-rule="evenodd"
                        ></path>
                        </svg>
                    </button>
                    
                </div>
            </div>
            <br><br>
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
                                    <a href="<?= ROOT ?>/BookView/index/<?= $book->id ?>" class="book-card-link">
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

            <?php if (empty($articles)): ?>
            <p>No articles available at the moment.</p>
        <?php else: ?>
            <?php foreach ($articles as $article): ?>
                <div class="article-card">
                    <div class="article-content">
                        <h2><?php echo htmlspecialchars($article->Title); ?></h2>
                        <p><?= substr(htmlspecialchars($article->Content), 0, 200) ?>...</p>
                        <i><small>By <?php echo htmlspecialchars($article->Author); ?> | <?php echo htmlspecialchars($article->created_at); ?></small></i>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


        <div class="login-link">
            <a href="<?= ROOT ?>/articles">Show all <i class="fa-solid fa-arrow-right-long"></i></a>
        </div>
            <br>
            <center>
            <br><br>        
            <h1>Popular Categories</h1>
            <br><br>
            <div class="category-Cards">
                <p class="category-Card"><span>Romance</span></p>
                <p class="category-Card"><span>Horror</span></p>
                <p class="category-Card"><span>Fiction</span></p>
                <p class="category-Card"><span>Education</span></p>
                <p class="category-Card"><span>Mystery</span></p>
                <p class="category-Card"><span>Crime</span></p>
                <p class="category-Card"><span>History</span></p>
                <p class="category-Card"><span>Novel</span></p>
            </div>
                <br><br>        
                <h1>Book Stores you may be interested in</h1>
                <br><br>
                <div class="bookstore-carousel">
                    <button class="bookstore-prev"><i class="fa-solid fa-chevron-left fa-lg"></i></button>
                    <div class="bookstore-cards">
                        <div class="bookstore-card">
                            <div class="bookstore-details">
                                <div class="bookstore-image-div">
                                <img src="<?= ROOT ?>/assets/Images/bookstore-profile-pics/sarasavi-logo.svg" class="bookstore-image" alt="Placeholder Image">
                                </div>
                                <div class="bookstore-followers-details"> 
                                    <h3 class="bookstore-name"> Sarasavi</h3>
                                    <p>506 followers</p>
                                </div>
                            </div>
                            <div class="follow-bttn-div">
                                <button class="follow-btn">Follow <i class="fa-light fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <button class="bookstore-next"><i class="fa-solid fa-chevron-right fa-lg"></i></button>
                </div>
            </center>
        </div>

        <br><br>

        <!-- footer begin -->
            <?php include 'footer.view.php'; ?>   
        <!-- footer end -->
    </div>
    <script src="<?= ROOT ?>/assets/JS/index.js"></script>
    <script>
        const headings = [
            "Connecting Book Lovers Across Sri Lanka",
            "Your Story Starts Here New and Pre-loved Books Await",
            "Buy, Sell, and Explore  All in One Place",
            "Empowering Local Bookstores and Sellers",
            "Where Every Book Finds a Home"
        ];

        const paragraphs = [
            "From timeless classics to the latest reads, find everything in one convenient marketplace.",
            "Discover affordable second-hand treasures or sell your own — BookMart makes it easy.",
            "Support local bookstores while finding your next great read.",
            "Browse, list, and connect with fellow readers and sellers across the country.",
            "Experience the joy of books with a platform built for readers, by readers."
        ];


        let currentIndex = 0;

        function updateText() {
            const headingElement = document.getElementById("dynamic-heading");
            const paragraphElement = document.getElementById("dynamic-paragraph");

            headingElement.classList.add("fade");
            paragraphElement.classList.add("fade");
          
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % headings.length; 
                headingElement.textContent = `"${headings[currentIndex]}"`;
                paragraphElement.textContent = paragraphs[currentIndex];

                headingElement.classList.remove("fade");
                paragraphElement.classList.remove("fade");
            }, 750); 
        }
        setInterval(updateText, 4000);

        function navigateTo(page) {
            window.location.href = page; 
        }
    </script>
    
</body>
</html>