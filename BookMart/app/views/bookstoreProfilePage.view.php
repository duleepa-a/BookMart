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
                        <?php if (!empty($storeDetails->profile_picture_url)): ?>
                            <img src="<?= htmlspecialchars($storeDetails->profile_picture_url) ?>" alt="<?= htmlspecialchars($storeDetails->store_name) ?>" class="profile-picture">
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
                            <div class="stat"><strong>4.8</strong> Rating</div>
                            <?php if($is_store):?>
                                <div class="stat"><strong>12.5k</strong> Followers</div>
                            <?php endif;?>
                            <div class="stat"><strong><?= count($booksByStore) ?></strong> Books</div>
                        </div>
                        <?php if(isset($_SESSION['user_id'])): ?> 
                            <div class="action-buttons">
                                <button class="btn btn-primary" onclick="chatWithStore(<?= $storeDetails->user_id?>)"><i class="fas fa-comment"></i> Chat with Store</button>
                                <?php if($is_store):?>
                                    <button class="btn btn-outline"><i class="fas fa-bookmark"></i> Follow</button>
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
                        <div class="carousel-container">
                            <?php foreach ($booksByStore as $book): ?>
                                <div class="book-card">
                                    <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($book->cover_image) ?>" alt="Book Cover" class="book-cover">
                                    <div class="book-info">
                                        <h3 class="book-title"><?= htmlspecialchars($book->title) ?></h3>
                                        <p class="book-author">by <?= htmlspecialchars($book->author) ?></p>
                                        <p class="book-price">Rs. <?= number_format($book->price, 2) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="carousel-nav">
                            <button class="carousel-btn" id="prev-btn"><i class="fas fa-chevron-left"></i></button>
                            <button class="carousel-btn" id="next-btn"><i class="fas fa-chevron-right"></i></button>
                        </div>
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
        // Carousel functionality
        document.addEventListener('DOMContentLoaded', function() {
            // Special offers carousel
            const prevOfferBtn = document.querySelector('.special-offers-section .prev-btn');
            const nextOfferBtn = document.querySelector('.special-offers-section .next-btn');
            const offersCarousel = document.getElementById('offersCarousel');
            
            if (offersCarousel && prevOfferBtn && nextOfferBtn) {
                let currentPosition = 0;
                const totalOffers = offersCarousel.children.length;
                
                // Hide previous button initially
                prevOfferBtn.style.visibility = totalOffers > 1 ? 'visible' : 'hidden';
                nextOfferBtn.style.visibility = totalOffers > 1 ? 'visible' : 'hidden';
                
                prevOfferBtn.addEventListener('click', function() {
                    if (currentPosition > 0) {
                        currentPosition--;
                        offersCarousel.style.transform = `translateX(-${currentPosition * 100}%)`;
                        
                        // Show/hide navigation buttons as needed
                        nextOfferBtn.style.visibility = 'visible';
                        prevOfferBtn.style.visibility = currentPosition === 0 ? 'hidden' : 'visible';
                    }
                });
                
                nextOfferBtn.addEventListener('click', function() {
                    if (currentPosition < totalOffers - 1) {
                        currentPosition++;
                        offersCarousel.style.transform = `translateX(-${currentPosition * 100}%)`;
                        
                        // Show/hide navigation buttons as needed
                        prevOfferBtn.style.visibility = 'visible';
                        nextOfferBtn.style.visibility = currentPosition === totalOffers - 1 ? 'hidden' : 'visible';
                    }
                });
            }
            
            // Your existing carousel code can remain below this
            const carousels = document.querySelectorAll('.carousel-container');
            // ... rest of your existing code
        });

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

        // Auto slide every 5 seconds
        setInterval(showNextSlide, 5000);
    </script>
</body>
</html>