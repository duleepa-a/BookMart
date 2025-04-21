<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreInventory.css">
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
        <ul>
            <li><button class="add-book-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add Coupon</button></li>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/inventory" ><i class="fa-solid fa-book"></i>My Inventory</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/Analytics"><i class="fa-solid fa-chart-column"></i>Analytics</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/orders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/getReviews"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/advertisments"><i class="fa-solid fa-up-right-from-square"></i>Ads & Offers</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/coupons"  class="active"><i class="fa-solid fa-ticket"></i>Coupons</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/payRolls" ><i class="fa-solid fa-money-bill"></i>Payrolls</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/myProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <div class="container"> 
        <div id="add-book-modal"class="modal hidden">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="add-adv-form" method="POST" action="<?= ROOT ?>/BookstoreController/addCoupon">
                    <h2 class="full-width">Add Coupon</h2>

                    <div class="form-row">
                        <div class="form-group">
                            <div>
                                <label for="coupon_code">Coupon Code:</label>
                                <input type="text" id="coupon_code" name="coupon_code" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                            <label for="discount">Discount (%):</label>
                            <input type="number" id="discount" name="discount" step="0.01" min="0" max="100" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">    
                            <div>
                                <label for="start_date">Start Date:</label>
                                <input type="date" id="start_date" name="start_date" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="end_date">End Date:</label>
                                <input type="date" id="end_date" name="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-actions">
                        <button type="submit">Add Coupon</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <h1 class="inventory-title">Coupons</h1>
        <?php if (!empty($coupons)) : ?>
        <div class="inventory-toolbar">
            <input type="text" placeholder="Search for a coupon" class="inventory-search-bar">
            <button class="sort-button">Sort by <i class="fa-solid fa-sort-down "></i></button>
        </div>
        <div class="action-buttons" style="display:none;">
            <button class="add-discount">Add Discount</button>
            <button class="remove-button">Remove</button>
        </div>
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>Coupon Code</th>
                        <th>Discount %</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($coupons as $coupon) : ?>
                        <tr class="book-row" 
                            data-couponid="<?= $coupon->id ?>" 
                            data-code="<?= htmlspecialchars($coupon->coupon_code) ?>"
                            data-discount="<?= htmlspecialchars($coupon->discount_percentage) ?>" 
                            data-startdate="<?= htmlspecialchars($coupon->start_time) ?>" 
                            data-enddate="<?= htmlspecialchars($coupon->end_time ?? '') ?>" 
                            data-isactive="<?= htmlspecialchars($coupon->is_active) ?>" 
                            >
                            <td><input type="checkbox"></td>
                            <td><?= htmlspecialchars($coupon->coupon_code) ?></td>
                            <td><?= htmlspecialchars($coupon->discount_percentage) ?></td>
                            <td><?= htmlspecialchars($coupon->start_time)?></td>
                            <td><?= htmlspecialchars($coupon->end_time ) ?></td>
                            <td><?= (htmlspecialchars($coupon->is_active )) ? "Active" : "Inactive" ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="message-div">
                <p>No coupons found in your store!</p>
            </div>
        <?php endif; ?>
        <div class="modal" id="update-book-modal">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="add-adv-form" method="POST" action="<?= ROOT ?>/BookstoreController/updateCoupon">
                    <h2 class="full-width">Update Coupon</h2>
                    <input type="hidden" id="update-coupon-id" name="coupon_id" value="<?= htmlspecialchars($coupon->id) ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <div>
                                <label for="coupon_code">Coupon Code:</label>
                                <input type="text" id="update-coupon-code" name="coupon_code" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                            <label for="discount">Discount (%):</label>
                            <input type="number" id="update-discount" name="discount" step="0.01" min="0" max="100">
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">    
                            <div>
                                <label for="start_date">Start Date:</label>
                                <input type="datetime-local" id="update-start-date" name="start_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="end_date">End Date:</label>
                                <input type="datetime-local" id="update-end-date" name="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="modal-actions">
                        <button type="submit">Update</button>
                        <button type="button" class="delete-modal">Delete</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="modal" id="delete-book-modal">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="delete-book-form" method="POST" action="<?= ROOT ?>/BookstoreController/deleteCoupon">
                    <h2 class="full-width">Delete Coupon</h2>
                    <p>Are you sure you want to delete this coupon?</p>
                    <p id="delete-book-details"></p> 
                    <input type="hidden" id="delete-book-id" name="book_id">
                    <div class="modal-actions">
                        <button type="submit" class="delete-modal">Delete</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!-- footer begin -->
     <?php include 'smallFooter.view.php'; ?>   
    <!-- footer end -->     
    <script src="<?= ROOT ?>/assets/JS/bookstoreCoupon.js"></script>
</body>
</html>