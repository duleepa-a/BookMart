<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreProfilePage.css">
    <title><?= htmlspecialchars($storeDetails->store_name) ?></title>
</head>
<body>
        <!-- navBar division begin -->
        <?php include 'homeNavBar.view.php'; ?>        
        <!-- navBar division end -->
        <div class="container">
            <header>
                <div class="profile-section">
                    <div class="profile-picture-wrapper">
                        <?php if (!empty($storeDetails->profile_picture)): ?>
                            <img src="<?= ROOT ?>/assets/Images/bookstore-profile-pics/<?= htmlspecialchars($storeDetails->profile_picture) ?>" alt="<?= htmlspecialchars($storeDetails->store_name) ?>" class="profile-picture">
                        <?php else: ?>
                            <div class="profile-placeholder">
                                <?= strtoupper(substr($storeDetails->store_name, 0, 2)) ?>
                            </div>
                        <?php endif; ?>
                    </div>        
                    <div class="profile-info">
                        <h1 class="store-name"><?= htmlspecialchars($storeDetails->store_name) ?> <span class="badge">Verified</span></h1>
                        <?php if($is_store):?><p class="store-tagline">Owned by <?= htmlspecialchars($storeDetails->owner_name) ?></p> <?php endif;?>
                        <div class="stats">
                            <div class="stat"><strong> <?= ($storeDetails->rating ?? "No ratings yet")?> / 3</strong> Rating</div>
                            <?php if($is_store):?>
                                <div class="stat"><strong><?= $storeDetails->followers?></strong> Followers</div>
                            <?php endif;?>
                            <div class="stat"><strong><?= count($booksByStore) ?></strong> Books</div>
                        </div>
                        <?php if(isset($_SESSION['user_id'])): ?> 
                            <div class="action-buttons">
                                <button class="btn btn-primary" onclick="chatWithStore(<?= $storeDetails->user_id?>)"><i class="fas fa-comment"></i> Chat with Store</button>
                                <?php if($is_store):?>
                                    <button 
                                        class="btn btn-outline" 
                                        id="followButton" 
                                        data-store="<?= $storeDetails->user_id ?>">
                                        <?php if($is_followed):?> <i class="fa-solid fa-check"></i> 
                                        <?php else:?> <i class="fas fa-bookmark"></i> <?php endif;?>
                                        <?= $is_followed ? 'Following' : 'Follow' ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </header>

            <div class="main-content">
                <!-- Special Offers Section (Static or dynamic if needed) -->
                <?php if($is_store):?>
                    <div class="special-offers-section">
                        <div class="section-title">
                            Special Offers
                            <a href="#" class="view-all">View All</a>
                        </div>

                        <?php if (!empty($advetisments)) : ?>
                            <div class="carousel-wrapper">
                                <button class="offer-carousel-btn prev-btn">&#10094;</button>

                                <div class="offers-container" id="offersCarousel">
                                    <?php foreach ($advetisments as $ad) : ?>
                                        <div class="offer-card">
                                            <img src="<?= ROOT ?>\assets\Images\store_advertisments\<?= $ad->image_path ?>" alt="<?= htmlspecialchars($ad->title) ?>" class="offer-image">
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <button class="offer-carousel-btn next-btn">&#10095;</button>
                            </div>
                        <?php else : ?>
                            <p class="no-ads-message">No active advertisements available at the moment.</p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <!-- Books Section -->
                <div class="books-section">
                    <div class="section-title">
                        Featured Books
                    </div>
                    <div class="carousel">
                        <button class="prev"><i class="fa-solid fa-chevron-left fa-lg"></i></button>
                        <div class="book-cards">
                            <?php if (isset($booksByStore) && !empty($booksByStore)): ?>
                                <?php foreach ($booksByStore as $book): ?>
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
                            <div class="message-div">
                                <p>This bookstore hasn't featured any books yet. Check back soon for updates!</p>
                            </div>
                            <?php endif; ?>
                        </div>
                        <button class="next"><i class="fa-solid fa-chevron-right fa-lg"></i></button>
                    </div>
                </div>
                <?php if($is_store):?>
                <!-- About Section -->
                    <div class="about-section">
                        <div class="section-title">About <?= htmlspecialchars($storeDetails->store_name) ?></div>
                        <p class="about-text">
                            <?= htmlspecialchars($storeDetails->store_name) ?> is an independent bookstore based in <?= htmlspecialchars($storeDetails->city) ?>, <?= htmlspecialchars($storeDetails->province) ?>. We offer a diverse collection of books to cater to readers of all kinds.
                        </p>
                        <p class="about-text">
                            For more information, feel free to contact us. We're always happy to help book lovers find their next great read!
                        </p>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-map-marker-alt contact-icon"></i>
                                <span><?= htmlspecialchars($storeDetails->street_address) ?>, <?= htmlspecialchars($storeDetails->city) ?>, <?= htmlspecialchars($storeDetails->district) ?>, <?= htmlspecialchars($storeDetails->province) ?></span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-phone contact-icon"></i>
                                <span><?= htmlspecialchars($storeDetails->phone_number) ?></span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope contact-icon"></i>
                                <span><?= htmlspecialchars($storeDetails->owner_email) ?></span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-clock contact-icon"></i>
                                <span>Open: Mon-Sat 9AM-8PM, Sun 11AM-5PM</span>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="about-section">
                        <div class="section-title">About <?= htmlspecialchars($storeDetails->store_name) ?></div>
                        <p class="about-text">
                            <?= htmlspecialchars($storeDetails->store_name) ?> is an independent bookseller based in <?= htmlspecialchars($storeDetails->city) ?>, <?= htmlspecialchars($storeDetails->province) ?> that offers a diverse collection of books to cater to readers of all kinds.
                        </p>
                        <p class="about-text">
                            For more information, feel free to contact us. We're always happy to help book lovers find their next great read!
                        </p>
                        <div class="contact-info">
                            <div class="contact-item">
                                <i class="fas fa-phone contact-icon"></i>
                                <span><?= htmlspecialchars($storeDetails->phone_number) ?></span>
                            </div>
                            <div class="contact-item">
                                <i class="fas fa-envelope contact-icon"></i>
                                <span><?= htmlspecialchars($storeDetails->email_address) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>


    <script>
        function chatWithStore(storeId) {
            console.log(storeId);
            window.location.href = "<?= ROOT ?>/Chat/chatbox/" + storeId ;
        }

        const carousel = document.getElementById('offersCarousel');
        const cards = document.querySelectorAll('.offer-card');
        const totalSlides = cards.length;
        let currentSlide = 0;

        function updateSlide() {
            const offset = -currentSlide * 100;
            carousel.style.transform = `translateX(${offset}%)`;
        }

        function showNextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlide();
        }

        function showPrevSlide() {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateSlide();
        }

        document.querySelector('.next-btn').addEventListener('click', showNextSlide);
        document.querySelector('.prev-btn').addEventListener('click', showPrevSlide);

        const isLoggedIn = <?= isset($_SESSION['user_id']) ? 'true' : 'false' ?>;
        const isStore = <?= $is_store ? 'true' : 'false' ?>;
        
        if(isLoggedIn && isStore){
            document.getElementById('followButton').addEventListener('click', function() {
                const storeId = this.getAttribute('data-store');
                console.log(storeId);
                fetch(`<?= ROOT ?>/user/toggleFollow/${storeId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'followed') {
                            this.innerHTML = '<i class="fa-solid fa-check"></i> Following';
                        } else if (data.status === 'unfollowed') {
                            this.innerHTML = '<i class="fas fa-bookmark"></i> Follow';
                        }
                    });
                    window.location.reload();
            });
        }
        setInterval(showNextSlide, 5000);

        const bookPrevButton = document.querySelector('.prev');
        const bookNextButton = document.querySelector('.next');
        const bookCards = document.querySelector('.book-cards');

        let bookScrollAmount = 0;

        bookNextButton.addEventListener('click', () => {
            const maxScrollLeft = bookCards.scrollWidth - bookCards.clientWidth; 
            if (bookScrollAmount < maxScrollLeft) { 
                bookScrollAmount += 300;
                if (bookScrollAmount > maxScrollLeft) { 
                    bookScrollAmount = maxScrollLeft;
                }
                bookCards.scrollTo({
                    top: 0,
                    left: bookScrollAmount,
                    behavior: 'smooth'
                });
            }
        });

        bookPrevButton.addEventListener('click', () => {
            if (bookScrollAmount > 0) {
                bookScrollAmount -= 300;
                if (bookScrollAmount < 0) { 
                    bookScrollAmount = 0;
                }
                bookCards.scrollTo({
                    top: 0,
                    left: bookScrollAmount,
                    behavior: 'smooth'
                });
            }
        });

    </script>
</body>
</html>