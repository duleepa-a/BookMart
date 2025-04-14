<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/buyerReviews.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>        
    <!-- navBar division end -->
    <div class="sidebar">
        <h3 class="sidebar-heading">Welcome back,<br>Duleepa Edirisinghe</h3>
        <ul>
            <li><a href="<?= ROOT ?>/buyer/orders" ><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/buyer/reviews" class="active"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/buyer/myProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <div class="container">
        <h1 class="heading">My Reviews</h1>
        <nav class="tabs">
            <button class="tab-button active" onclick="showTab('to-be-review')">To-Review</button>
            <button class="tab-button" onclick="showTab('history')">History</button>
        </nav>

        <div class="tab-content" id="to-be-review" >
             <?php if (empty($orders)): ?>
                <div class="message-div">
                    <p class="message-text">No orders available to review.</p>
                </div>
            <?php else: ?>
            <?php foreach ($orders as $order): ?>
                <div class="purchase-card">
                    <div class="purchase-details">
                        <p class="purchase-header">Purchased on : <?= date('Y-m-d', strtotime($order->created_on)) ?></p>
                        <div class="item-details">
                            <img src="<?= ROOT ?>/assets/Images/book cover images/<?= $order->cover_image ?>" alt="Book cover" class="item-image" />
                            <div class="item-description">
                                <p class="item-title"><?= $order->book_title ?></p>
                                <p class="item-specs">By <?= $order->book_author ?>, Condition: <?= $order->condition ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="seller-section">
                        <p class="seller-header">Sold by : <?= $order->seller_username ?></p>
                        <form action="<?= ROOT ?>/buyer/addReview" method="post">
                            <input type="hidden" name="order_id" value="<?= $order->order_id ?>">
                            <input type="hidden" name="book_id" value="<?= $order->book_id ?>">
                            <input type="hidden" name="seller_id" value="<?= $order->seller_id?>">
                            <input type="hidden" name="seller_username" value="<?= $order->seller_username?>">
                            <button type="submit" class="review-button">REVIEW</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="tab-content" id="history" style="display: none;">
            <?php if (!empty($history)): ?>
                <?php foreach ($history as $order): ?>
                    <div class="review-card-unique">
                        <div class="purchase-details">
                            <p class="purchase-header">Purchased on : <?= htmlspecialchars($order->created_on) ?></p>
                            <div class="item-details-unique">
                                <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($order->cover_image) ?>" alt="Product" class="item-image" />
                                <div class="item-description-unique">
                                    <p class="item-title"><?= htmlspecialchars($order->book_title) ?></p>
                                    <p class="item-specs">By <?= htmlspecialchars($order->book_author) ?>, Condition : <?= htmlspecialchars($order->condition) ?></p>
                                    <div class="rating-section-unique">
                                        <span class="stars-unique">
                                            <?php for ($i = 0; $i < 5; $i++): ?>
                                                <i class="fas fa-star<?= $i < $order->review->rating ? '' : '-o' ?>"></i>
                                            <?php endfor; ?>
                                        </span>
                                    </div>
                                    <div class="review-box-unique">
                                        <p><?= htmlspecialchars($order->review->comment) ?></p>
                                        <div class="likes-unique">
                                            <i class="fas fa-thumbs-up"></i>
                                            <span><?= htmlspecialchars($order->review->likes) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="seller-section">
                            <p class="seller-header">Sold by <?= htmlspecialchars($order->seller_username) ?></p>
                            <p class="seller-review-header">Your seller review:</p>
                            <div class="seller-review-icons-unique">
                                <i class="fas fa-frown <?= ($order->review->seller_rating == 1) ? 'active-rating' : '' ?>"></i>
                                <i class="fas fa-meh <?= ($order->review->seller_rating == 2) ? 'active-rating' : '' ?>"></i>
                                <i class="fas fa-smile <?= ($order->review->seller_rating == 3) ? 'active-rating' : '' ?>"></i>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="message-div">
                    <p class="message-text">Your history is empty</p>
                </div>
            <?php endif; ?>
        </div>

    </div>    
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer> 
    <script src="<?= ROOT ?>/assets/JS/buyerReview.js"></script>
</body>
</html>