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
        <h1 class="heading">Add Review</h1>
        <form id="reviewForm" class="review-card-unique" method="POST" action="<?= ROOT ?>/Buyer/submitReview/" >
            <div class="purchase-details">
                <p class="purchase-header">Purchased on:  <?= date('Y-m-d', strtotime($order->created_on)) ?></p>
                <div class="item-details-unique">
                    <img src="<?= ROOT ?>/assets/Images/book cover images/<?= $book->cover_image ?>" alt="Product" class="item-image" />
                    <div class="item-description-unique">
                        <p class="item-title">
                            <?= $book->title ?>
                        </p>
                        <p class="item-specs">By <?= $book->author ?>, Condition: <?= $book->book_condition ?></</p>
                        <div class="rating-container">
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1"><i class="far fa-star"></i></label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2"><i class="far fa-star"></i></label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3"><i class="far fa-star"></i></label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4"><i class="far fa-star"></i></label>
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5"><i class="far fa-star"></i></label>
                        </div>
                        <div class="review-box-unique">
                            <textarea name="review_text" placeholder="Write your review here..." rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="seller-section">
                <p class="seller-header">Sold by <?= htmlspecialchars($seller_username) ?></p>
                <p class="seller-review-header">Your seller review:</p>
                <div class="seller-review-icons-unique">
                    <input type="radio" id="seller-bad" name="seller_rating" value="1" hidden>
                    <label for="seller-bad"><i class="far fa-frown"></i></label>
                    <input type="radio" id="seller-neutral" name="seller_rating" value="2" hidden>
                    <label for="seller-neutral"><i class="far fa-meh"></i></label>
                    <input type="radio" id="seller-good" name="seller_rating" value="3" hidden>
                    <label for="seller-good"><i class="far fa-smile"></i></label>
                </div>
                <input type="hidden" name="book_id" value="<?= $book_id ?>">
                <input type="hidden" name="order_id" value="<?= $order_id ?>">
                <input type="hidden" name="buyer_id" value="<?= $buyer_id ?>">
                <button type="submit" class="review-button">Submit Review</button>
            </div>
        </form>           
    </div>    
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer> 
    <script src="<?= ROOT ?>/assets/JS/buyerReview.js"></script>
    <script>
        const stars = document.querySelectorAll('.rating-container label');

        stars.forEach((star, index) => {
        star.addEventListener('mouseover', () => {
            // Highlight current star and all stars to the left
            for (let i = 0; i <= index; i++) {
            stars[i].style.color = '#ffb700';
            }
        });
        
        star.addEventListener('mouseout', () => {
            // Reset all stars (unless one is selected)
            stars.forEach(s => {
            if (!document.querySelector('.rating-container input:checked')) {
                s.style.color = '#ccc';
            }
            });
            
            // If a star is selected, highlight up to that one
            const checkedInput = document.querySelector('.rating-container input:checked');
            if (checkedInput) {
            const selectedIndex = Array.from(document.querySelectorAll('.rating-container input'))
                .indexOf(checkedInput);
            for (let i = 0; i <= selectedIndex; i++) {
                stars[i].style.color = '#ffb700';
            }
            }
        });
        
        star.addEventListener('click', () => {
            const radioInput = star.previousElementSibling;
            radioInput.checked = true;
            
            // Highlight stars up to the clicked one
            for (let i = 0; i <= index; i++) {
            stars[i].style.color = '#ffb700';
            }
            
            // Reset stars after the clicked one
            for (let i = index + 1; i < stars.length; i++) {
            stars[i].style.color = '#ccc';
            }
        });
        });
    </script>
</body>
</html>