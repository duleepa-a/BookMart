<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<?php if ($_SESSION['user_role'] == 'bookSeller'): ?>
    <div class="sidebar">
        <h3 class="sidebar-heading">Welcome back,<br><?= $_SESSION['full_name'] ?? 'User' ?></h3>
        <ul>
            <li><button class="add-book-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add book</button></li>
            <li><button class="add-book-bttn" onClick="location.href='<?= ROOT ?>/articles/create';"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Create Article</button></li>
            <li><a href="<?= ROOT ?>/bookSellerController/listings" class="<?= strpos($currentPath, '/bookSellerController/listings') !== false ? 'active' : '' ?>" class="active" ><i class="fa-solid fa-book"></i>My Listings</a></li>
            <li><a href="<?= ROOT ?>/auctions" class="<?= strpos($currentPath, '/auctions') !== false ? 'active' : '' ?>"><i class="fa-solid fa-chart-column"></i>Auctions</a></li>
            <li><a href="<?= ROOT ?>/articles" class="<?= strpos($currentPath, '/articles') !== false && strpos($currentPath, '/myArticles') === false ? 'active' : '' ?>"><i class="fa-solid fa-cart-plus"></i>Articles</a></li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/payRolls" class="<?= strpos($currentPath, '/BookstoreController/payRolls') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-money-bill"></i>Payrolls
                </a>
            </li>
            <li><a href="<?= ROOT ?>/bookSellerController/myProfile" class="<?= strpos($currentPath, '/bookSellerController/myProfile') !== false ? 'active' : '' ?>"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
<?php elseif ($_SESSION['user_role'] == 'buyer'): ?>
<div class="sidebar">
    <h3 class="sidebar-heading">Welcome back,<br><?= $_SESSION['full_name'] ?? 'User' ?></h3>
    <ul>
    <li>
        <button class="add-book-bttn" onClick="location.href='<?= ROOT ?>/articles/create';"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Create Article</button></li>
        <li>
            <a href="<?= ROOT ?>/buyer/orders" class="<?= strpos($currentPath, '/buyer/orders') || strpos($currentPath, '/Buyer/trackOrder') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-cart-plus"></i>Orders
            </a>
        </li>
        <li>
            <a href="<?= ROOT ?>/buyer/reviews" class="<?= strpos($currentPath, '/buyer/reviews') || strpos($currentPath, '/buyer/addReview') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-comment-dots"></i>Reviews
            </a>
        </li>
        <li><a href="<?= ROOT ?>/auctions" class="<?= strpos($currentPath, '/auctions') !== false ? 'active' : '' ?>"><i class="fa-solid fa-chart-column"></i>Auctions</a></li>
            <li><a href="<?= ROOT ?>/articles" class="<?= strpos($currentPath, '/articles') !== false && strpos($currentPath, '/myArticles') === false ? 'active' : '' ?>"><i class="fa-solid fa-cart-plus"></i>Articles</a></li>
        <li>
            <a href="<?= ROOT ?>/buyer/myProfile" class="<?= strpos($currentPath, '/buyer/myProfile') !== false ? 'active' : '' ?>">
                <i class="fa-regular fa-user"></i>Profile
            </a>
        </li>
    </ul>   
</div>
<link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerAddButton.css">

<?php elseif ($_SESSION['user_role'] == 'admin' || $_SESSION['user_role'] == 'superAdmin'): ?>
    <div class="sidebar">
        <ul>
            <h3 class="sidebar-heading" style="color: #02224E; margin-bottom:40px">
                Hi <?= $_SESSION['username'] ?? 'User' ?>
            </h3>
            <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'superAdmin'): ?>
                <li>
                    <a href="<?= ROOT ?>/SAdminAddAdmin" class="<?= strpos($currentPath, '/SAdminAddAdmin') !== false ? 'active' : '' ?>">
                        <i class="fa-solid fa-user"></i>Add Admin
                    </a>
                </li>
            <?php endif; ?>
            <li>
                <a href="<?= ROOT ?>/home" class="<?= strpos($currentPath,'/') || strpos($currentPath, '/home') !== false ? 'active' : '' ?>">
                        <i class="fa-solid fa-house"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/adminViewallusers" class="<?= strpos($currentPath, '/adminViewallusers') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-users"></i>Users
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/bookstoreView" class="<?= strpos($currentPath, '/admin/bookstoreView') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-store"></i>Shops
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/adminSearchorders" class="<?= strpos($currentPath, '/adminSearchorders') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-cart-plus"></i>Orders
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/adminSearchbooks" class="<?= strpos($currentPath, '/adminSearchbooks') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-book"></i>Books
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/adminViewContactUs" class="<?= strpos($currentPath, '/adminViewContactUs') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-envelope"></i>Inquiries
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/adminViewCourierComplains" class="<?= strpos($currentPath, '/adminViewCourierComplains') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-circle-exclamation"></i>Complains
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/AdminPaymentInfo" class="<?= strpos($currentPath, '/AdminPaymentInfo') !== false ? 'active' : '' ?>">
                <i class="fa-solid fa-coins"></i>Payment Info
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/admin/payRolls" class="<?= strpos($currentPath, '/admin/payRolls') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-money-bill"></i>Payrolls
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/adminAdvertisment" class="<?= strpos($currentPath, '/adminAdvertisment') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-up-right-from-square"></i>Ads
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/adminProfile" class="<?= strpos($currentPath, '/adminProfile') !== false ? 'active' : '' ?>">
                    <i class="fa-regular fa-user"></i>Profile
                </a>
            </li>
        </ul>
    </div>
<?php elseif ($_SESSION['user_role'] == 'bookStore'): ?>
    <div class="sidebar">
        <ul>
            <li>
                <button class="add-book-bttn">
                    <span class="compose-icon"><i class="fa-solid fa-plus"></i></span><?= strpos($currentPath, '/BookstoreController/coupons') !== false ? 'Add Coupon' : (strpos($currentPath, '/BookstoreController/advertisments') !== false ? 'Post Ads & Offers' : 'Add Book') ?>
                </button>
            </li>
            <li>
                <a href="<?= ROOT ?>/" class="<?= $currentPath === ROOT . '/' ? 'active' : '' ?>">
                    <i class="fa-solid fa-house"></i>Dashboard
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/inventory" class="<?= strpos($currentPath, '/BookstoreController/inventory') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-book"></i>My Inventory
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/Analytics" class="<?= strpos($currentPath, '/BookstoreController/Analytics') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-chart-column"></i>Analytics
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/orders" class="<?= strpos($currentPath, '/BookstoreController/orders') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-cart-plus"></i>Orders
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/getReviews" class="<?= strpos($currentPath, '/BookstoreController/getReviews') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-comment-dots"></i>Reviews
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/advertisments" class="<?= strpos($currentPath, '/BookstoreController/advertisments') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-up-right-from-square"></i>Ads & Offers
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/coupons" class="<?= strpos($currentPath, '/BookstoreController/coupons') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-ticket"></i>Coupons
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/payRolls" class="<?= strpos($currentPath, '/BookstoreController/payRolls') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-money-bill"></i>Payrolls
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/myProfile" class="<?= strpos($currentPath, '/BookstoreController/myProfile') !== false ? 'active' : '' ?>">
                    <i class="fa-regular fa-user"></i>Profile
                </a>
            </li>
        </ul>
    </div>
<?php elseif ($_SESSION['user_role'] == 'courier'): ?>
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Welcome Back Courier!</h1>
            <li>
                <a href="<?= ROOT ?>/" class="<?= strpos($currentPath, '/') || strpos($currentPath, '/home')  !== false ? 'active' : '' ?>">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/courierEarns" class="<?= strpos($currentPath, '/courierEarns') !== false ? 'active' : '' ?>">
                    <i class="fa fa-money"></i> Earnings
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/CourierOrderDetails/OrderPage" class="<?= strpos($currentPath, '/CourierOrderDetails/OrderPage') !== false ? 'active' : '' ?>">
                    <i class="fa fa-clock"></i> My Orders
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/courierComplains" class="<?= strpos($currentPath, '/courierComplains') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-circle-exclamation"></i> Complains
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/BookstoreController/payRolls" class="<?= strpos($currentPath, '/BookstoreController/payRolls') !== false ? 'active' : '' ?>">
                    <i class="fa-solid fa-money-bill"></i>Payrolls
                </a>
            </li>
            <li>
                <a href="<?= ROOT ?>/courierProfile" class="<?= strpos($currentPath, '/courierProfile') !== false ? 'active' : '' ?>">
                    <i class="fa fa-user"></i> Profile
                </a>
            </li>
        </ul>   
    </div>
<?php endif; ?>

<?php if ($_SESSION['user_role'] == 'bookSeller'): ?>

    <div id="add-book-modal"class="modal hidden">
        <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="add-book-form" method="POST" action="<?= ROOT ?>/bookSellerController/addBook" enctype="multipart/form-data">
                    <h2 class="full-width">Add Book</h2>

                    <!-- Title -->
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required>
                    </div>

                    <!-- ISBN -->
                    <div>
                        <label for="ISBN">ISBN:</label>
                        <input type="text" id="ISBN" name="ISBN" required>
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" required>
                    </div>

                    <!-- Genre -->
                    <div>
                        <label for="genre">Genre:</label>
                        <select id="genre" name="genre" required>
                        <option value="">-- Select Genre --</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="mystery">Mystery</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="science-fiction">Science Fiction</option>
                        <option value="biography">Biography</option>
                        <option value="history">History</option>
                        <option value="children">Children</option>
                        <option value="romance">Romance</option>
                        </select>
                    </div>

                    <!-- Publisher -->
                    <div>
                        <label for="publisher">Publisher:</label>
                        <input type="text" id="publisher" name="publisher" required>
                    </div>

                    <!-- Cover Image -->
                    <div>
                        <label for="cover_image">Cover Image:</label>
                        <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" step="0.01" min="0.01" required>
                    </div>

                    <!-- Discount -->
                    <div>
                        <label for="discount">Discount (%):</label>
                        <input type="number" id="discount" name="discount" step="0.01" min="0" max="100">
                    </div>

                    <!-- Quantity -->
                    <div style="display: none;">
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1">
                    </div>


                    <!-- Condition -->
                    <div>
                        <label for="book_condition">Condition:</label>
                        <select id="book_condition" name="book_condition" required>
                        <option value="new">New</option>
                        <option value="like-new">Like New</option>
                        <option value="good">Good</option>
                        <option value="acceptable">Acceptable</option>
                        <option value="poor">Poor</option>
                        </select>
                    </div>

                    <!-- Language -->
                    <div>
                        <label for="language">Language:</label>
                        <select id="language" name="language" required>
                        <option value="English">English</option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="full-width">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-actions">
                        <button type="submit" class="add-button">Add</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
    </div>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerAddButton.css">
    <script src="<?= ROOT ?>/assets/JS/bookSellerSidebar.js"></script>
<?php endif;?>

<link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/commonSidebar.css">
