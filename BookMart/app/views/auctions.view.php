<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/auctions.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Auctions</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- navBar division begin -->
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <center>
    <div class="background-box">
        <h1 class="title-text">Auctions</h1>

        <div class="auction-tabs">
            <form method="get" style="display:inline;">
                <input type="hidden" name="view" value="latest">
                <button type="submit" class="auction-tab <?= ($data['selectedTab'] == 'latest') ? 'selected' : '' ?>">Latest Auctions</button>
            </form>
            <form method="get" style="display:inline;">
                <input type="hidden" name="view" value="myAuctions">
                <button type="submit" class="auction-tab <?= ($data['selectedTab'] == 'myAuctions') ? 'selected' : '' ?>">My Auctions</button>
            </form>
            <form method="get" style="display:inline;">
                <input type="hidden" name="view" value="participating">
                <button type="submit" class="auction-tab <?= ($data['selectedTab'] == 'participating') ? 'selected' : '' ?>">Participating Auctions</button>
            </form>
        </div>

        <div class="auctions-container">
            <?php if (!empty($data['auctions'])): ?>
                <?php foreach ($data['auctions'] as $auction): ?>
                    <div class="auction-card">
                        <div class="book-image">
                            <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($auction->image) ?>" alt="<?= htmlspecialchars($auction->title) ?>" />
                            <?php if ($auction->buy_now_price): ?>
                                <div class="buy-now-badge">Buy Now Available</div>
                            <?php endif; ?>
                        </div>
                        <div class="card-content">
                            <div class="book-details">
                                <h2 class="book-title"><?= htmlspecialchars($auction->title) ?></h2>
                                <p class="book-author">by <?= htmlspecialchars($auction->author) ?></p>
                                <p class="seller-name">Listed by <span><?= htmlspecialchars($auction->seller_name) ?></span></p>
                            </div>
                            <div class="auction-details">
                                <div class="price-info">
                                    <div class="current-bid">
                                        <span class="label">Current Bid</span>
                                        <span class="value">Rs. <?= number_format($auction->current_price, 2) ?></span>
                                    </div>
                                    <?php if ($auction->buy_now_price): ?>
                                        <div class="buy-now-price">
                                            <span class="label">Buy Now</span>
                                            <span class="value">Rs. <?= number_format($auction->buy_now_price, 2) ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="time-remaining">
                                    <i class="fa-regular fa-clock"></i>
                                    <span>Ends: <?= date('F d, Y - H:i', strtotime($auction->end_time)) ?></span>
                                </div>
                            </div>
                            <div class="auction-footer">
                                <a href="<?= ROOT ?>/auctions/details/<?= htmlspecialchars($auction->id) ?>" class="view-auction-btn">
                                    View Auction <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if ($data['showPageControl']): ?>
                    <div class="controls">
                        <?php if ($data['hasPrevious']): ?>
                            <form method="get" style="display:inline;">
                                <input type="hidden" name="page" value="<?= $data['page'] - 1 ?>">
                                <input type="hidden" name="view" value="<?= $data['selectedTab'] ?>">
                                <button type="submit" class="view-more-button">Previous</button>
                            </form>
                        <?php endif; ?>

                        <span class="page-number">Page <?= $data['page'] ?></span>

                        <?php if ($data['hasNext']): ?>
                            <form method="get" style="display:inline;">
                                <input type="hidden" name="page" value="<?= $data['page'] + 1 ?>">
                                <input type="hidden" name="view" value="<?= $data['selectedTab'] ?>">
                                <button type="submit" class="view-more-button">Next</button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <p>No auctions found.</p>
            <?php endif; ?>
        </div>
    </div>
    </center>

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->
</body>
</html>
