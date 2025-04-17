<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/auctionDetails.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Auction Details</title> 
</head>
<body>

    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- navBar division begin -->
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- navBar division end -->

    <div class="background-box">
        <div class="auction-details-page">

            <!-- Main content -->
            <div class="auction-content">
                <?php $auction=$data['auctions'] ?>

                <!-- Book details section -->
                <div class="book-details-section">
                    <div class="book-info">
                        <h1><?= htmlspecialchars($auction->title) ?></h1>
                        <p class="book-author"><?= htmlspecialchars($auction->author) ?></p>

                        <div class="image-description-container">
                                <div class="rec-book-image">
                                    <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($auction->image) ?>" alt="<?= htmlspecialchars($auction->title) ?>" />
                                </div>

                            <div class="book-details">
                                <h3>Description</h3>
                                <p><?= nl2br(htmlspecialchars($auction->description)) ?></p>
                            </div>
                        </div>

                        <p class="book-details price">Starting Price - Rs. <?= number_format($auction->starting_price, 2) ?></p>

                        <div class="book-condition">
                            <span class="condition-badge"><?= htmlspecialchars($auction->book_condition) ?></span>
                        </div>

                        <div class="seller-info">
                            <img src="/api/placeholder/60/60" alt="Seller" class="seller-avatar">
                            <div class="seller-details">
                                <div class="seller-name"><?= htmlspecialchars($auction->seller_name) ?></div>
                                <div>Member since Jan 2022</div>
                                <div class="seller-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(4.5/5 from 28 ratings)</span>
                                </div>
                            </div>
                            <button class="contact-seller">
                                <i class="fas fa-envelope"></i> Contact
                            </button>
                        </div>
                    </div>

                    <div class="auction-info">
                        <div class="auction-status-header">
                            <h3>Auction Status</h3>
                            <span class="status-badge <?= htmlspecialchars($auction->is_closed) ? 'inactive' : 'active' ?>"><?= htmlspecialchars($auction->is_closed) ? "Inactive" : "Active" ?></span>
                        </div>
                        
                        <?php if ($auction->is_closed): ?>
                            <div class="auction-closed-message">This auction has ended.</div>
                        <?php endif; ?>
                        <div class="auction-timer" data-endtime="<?= htmlspecialchars($auction->end_time) ?>" data-is-closed="<?= htmlspecialchars($auction->is_closed) ?>">
                            <div class="timer-unit">
                                <div class="timer-value" id="days"></div>
                                <div class="timer-label">Days</div>
                            </div>
                            <div class="timer-unit">
                                <div class="timer-value" id="hours"></div>
                                <div class="timer-label">Hours</div>
                            </div>
                            <div class="timer-unit">
                                <div class="timer-value" id="minutes"></div>
                                <div class="timer-label">Minutes</div>
                            </div>
                            <div class="timer-unit">
                                <div class="timer-value" id="seconds"></div>
                                <div class="timer-label">Seconds</div>
                            </div>
                        </div>


                        <div class="price-info">
                            <div class="price-item current-bid">
                                <div class="price-label">Current Bid</div>
                                <div class="price-value">Rs. <?= number_format($auction->current_price, 2) ?></div>
                            </div>
                            <div class="price-item buy-now">
                                <div class="price-label">Buy Now Price</div>
                                <div class="price-value"><?= isset($auction->buy_now_price) ? "Rs. " .number_format($auction->buy_now_price, 2) : "Not Available" ?></div>
                            </div>
                        </div>
                        
                        <?php if ($_SESSION['user_id'] == $auction->seller_id) : ?>
                            <div class="auction-buttons">
                                <form class="bid-form" method="POST" action="<?= ROOT ?>/auctions/completeAuction" enctype="multipart/form-data">
                                    <input type="hidden" name="auction_id" value="<?= htmlspecialchars($auction->id) ?>">
                                    <input type="hidden" name="current_bidder_id" value="<?= htmlspecialchars($auction->current_bidder_id) ?>">
                                    <button type="submit" class="bid-button complete-auction-btn" <?= $auction->is_closed ? 'disabled' : (isset($auction->winner_user_id) ? '' : 'disabled') ?>>
                                        Complete Auction
                                    </button>
                                </form>
                                <form class="bid-form" method="POST" action="<?= ROOT ?>/auctions/cancelAuction" enctype="multipart/form-data">
                                    <input type="hidden" name="auction_id" value="<?= htmlspecialchars($auction->id) ?>">
                                    <input type="hidden" name="book_id" value="<?= htmlspecialchars($auction->book_id) ?>">
                                    <button type='submit' class="bid-button delete-auction-btn" <?= $auction->is_closed ? (isset($auction->winner_user_id) ? 'disabled' : '') : '' ?>>
                                        Delete Auction
                                    </button>
                                </form>
                            </div>
                        <?php elseif($auction->is_closed) : ?>
                            <?php if ($auction->winner_user_id == $_SESSION['user_id']) : ?>
                                <div class="bid-info">
                                    <center>
                                        <h4>Congratulations! You won the auction!</h4>
                                        <p>Final Bid: Rs. <?= number_format($auction->current_price, 2) ?></p>
                                    </center>
                                    <div class="auction-buttons">
                                        <form class="bid-form" method="POST" action="<?= ROOT ?>/auctions/buyNow" enctype="multipart/form-data">
                                            <input type="hidden" name="auction_id" value="<?= htmlspecialchars($auction->id) ?>">
                                            <input type="hidden" name="book_id" value="<?= htmlspecialchars($auction->book_id) ?>">
                                            <input type="hidden" name="current_price" value="<?= htmlspecialchars($auction->buy_now_price) ?>">
                                            <input type="hidden" name="previous_bid" value="<?= htmlspecialchars($auction->current_price) ?>">
                                            <button type='submit' class="bid-button buy-now-btn">
                                                <i class="fas fa-shopping-cart"></i> Buy Now
                                            </button>
                                        </form>
                                        <form class="bid-form" method="POST" action="<?= ROOT ?>/auctions/withdraw" enctype="multipart/form-data">
                                            <input type="hidden" name="auction_id" value="<?= htmlspecialchars($auction->id) ?>">
                                            <input type="hidden" name="previous_bid" value="<?= htmlspecialchars($auction->previous_bid) ?>">
                                            <input type="hidden" name="is_closed" value="<?= htmlspecialchars($auction->is_closed) ?>">
                                            <button type='submit' class="bid-button delete-auction-btn">
                                                Withdraw
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php else : ?>
                            <div class="bid-info">
                                <div class="bid-history-header">
                                    <?php if ($auction->current_bidder_id == $data['userid']) : ?>
                                        <h4>You have the highest bid!</h4>
                                    <?php else : ?>
                                        <h4>Please place you bid!</h4>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <div class="currency-symbol">Rs.</div>
                                    <input type="number" id="bid-input" class="bid-input" placeholder="Enter your bid amount" min="<?= htmlspecialchars($auction->current_price+100) ?>" value="<?= htmlspecialchars($auction->current_price+100) ?>" step="0.1">
                                </div>
                                <small>Minimum bid: Rs. <?= number_format($auction->current_price+100, 2)?> (current bid + Rs. 100.00)</small>

                                <form class="bid-form" method="POST" action="<?= ROOT ?>/auctions/updateBid" enctype="multipart/form-data">
                                    <input type="hidden" name="auction_id" value="<?= htmlspecialchars($auction->id) ?>">
                                    <input type="hidden" name="previous_bid" value="<?= htmlspecialchars($auction->current_price) ?>">
                                    <input type="hidden" name="bid-amount" id="bid-amount" value="<?= htmlspecialchars($auction->current_price+100) ?>">
                                    <button type="submit" class="bid-button place-bid" <?= ($auction->current_bidder_id == $_SESSION['user_id']) ? 'disabled' : '' ?>>
                                        <i class="fas fa-gavel"></i> Place Bid
                                    </button>
                                </form>

                                <div class="auction-buttons">
                                    <form class="bid-form" method="POST" action="<?= ROOT ?>/auctions/buyNow" enctype="multipart/form-data">
                                        <input type="hidden" name="auction_id" value="<?= htmlspecialchars($auction->id) ?>">
                                        <input type="hidden" name="book_id" value="<?= htmlspecialchars($auction->book_id) ?>">
                                        <input type="hidden" name="current_price" value="<?= htmlspecialchars($auction->buy_now_price) ?>">
                                        <input type="hidden" name="previous_bid" value="<?= htmlspecialchars($auction->current_price) ?>">
                                        <button type='submit' class="bid-button buy-now-btn" <?= empty($auction->buy_now_price) ? 'disabled' : '' ?>>
                                            <i class="fas fa-shopping-cart"></i> Buy Now
                                        </button>
                                    </form>
                                    <form class="bid-form" method="POST" action="<?= ROOT ?>/auctions/withdraw" enctype="multipart/form-data">
                                        <input type="hidden" name="auction_id" value="<?= htmlspecialchars($auction->id) ?>">
                                        <input type="hidden" name="is_closed" value="<?= htmlspecialchars($auction->is_closed) ?>">
                                        <input type="hidden" name="previous_bid" value="<?= htmlspecialchars($auction->previous_bid) ?>">
                                        <button type='submit' class="bid-button delete-auction-btn" <?= (($auction->current_bidder_id) == $_SESSION['user_id']) ? '' : 'disabled' ?>>
                                            Withdraw
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Related auctions -->
            <div class="related-auctions">
                <?php if (!empty($data['recAuctions'])): ?>
                    <h2 class="section-heading">Similar Auctions</h2>
                    <?php foreach ($data['recAuctions'] as $auction): ?>
                        <div class="rec-auction-card">
                            <div class="rec-book-image">
                                <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($auction->image) ?>" alt="<?= htmlspecialchars($auction->title) ?>" />
                                <?php if ($auction->buy_now_price): ?>
                                    <div class="rec-buy-now-badge">Buy Now Available</div>
                                <?php endif; ?>
                            </div>
                            <div class="rec-card-content">
                                <div class="rec-book-details">
                                    <h2 class="rec-book-title"><?= htmlspecialchars($auction->title) ?></h2>
                                    <p class="rec-book-author">by <?= htmlspecialchars($auction->author) ?></p>
                                    <p class="rec-seller-name">Listed by <span><?= htmlspecialchars($auction->seller_name) ?></span></p>
                                </div>
                                <div class="rec-auction-details">
                                    <div class="rec-price-info">
                                        <div class="rec-current-bid">
                                            <span class="rec-label">Current Bid</span>
                                            <span class="rec-value">Rs. <?= number_format($auction->current_price, 2) ?></span>
                                        </div>
                                        <?php if ($auction->buy_now_price): ?>
                                            <div class="rec-buy-now-price">
                                                <span class="rec-label">Buy Now</span>
                                                <span class="rec-value">Rs. <?= number_format($auction->buy_now_price, 2) ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="rec-time-remaining">
                                        <i class="fa-regular fa-clock"></i>
                                        <span>Ends: <?= date('F d, Y - H:i', strtotime($auction->end_time)) ?></span>
                                    </div>
                                </div>
                                <div class="rec-auction-footer">
                                    <a href="<?= ROOT ?>/auctions/details/<?= htmlspecialchars($auction->id) ?>" class="rec-view-auction-btn">
                                        View Auction <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div id="auctionEndedPopup" class="popup-hidden">
        Auction has ended. Reloading...
    </div>

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->

    <script src="<?= ROOT ?>/assets/JS/auctionDetails.js"></script>

</body>