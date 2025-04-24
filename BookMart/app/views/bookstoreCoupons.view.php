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
     <!-- sideBar division begin -->
     <?php include 'commonSidebar.view.php'; ?>        
    <!-- sideBar division end -->
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
                                <input type="datetime-local" id="start_date" name="start_date" value="<?= date('Y-m-d\TH:i:s', strtotime(date('Y-m-d H:i:s'))) ?>" min="<?= date('Y-m-d\TH:i:s', strtotime(date('Y-m-d H:i:s'))) ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="end_date">End Date:</label>
                                <input type="datetime-local" id="end_date" name="end_date">
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
        <div class="inventory-title ">
                <div class="Heading">
                    <h1>Discount Coupons</h1>
                    <span class="sub-heading">Generate and manage discount codes to boost sales.</span>
                </div>
            </div>
        <?php if (!empty($coupons)) : ?>
        <div class="inventory-toolbar">
            <input type="text" placeholder="Search for a coupon" class="inventory-search-bar">
            <div class="pagination">
                <!-- Previous Arrow -->
                <div class="pagination-item pagination-arrow <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=<?= $currentPage - 1 ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </a>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    <?php endif; ?>
                </div>

                <!-- Page Numbers -->
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == 1 || $i == $totalPages || abs($i - $currentPage) <= 1): ?>
                        <div class="pagination-item pagination-number <?= $currentPage == $i ? 'active' : '' ?>">
                            <a href="?page=<?= $i ?>" style="color: inherit; text-decoration: none; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                <?= $i ?>
                            </a>
                        </div>
                    <?php elseif ($i == 2 && $currentPage > 3 || $i == $totalPages - 1 && $currentPage < $totalPages - 2): ?>
                        <div class="pagination-item pagination-dots">...</div>
                    <?php endif; ?>
                <?php endfor; ?>

                <!-- Next Arrow -->
                <div class="pagination-item pagination-arrow <?= $currentPage >= $totalPages ? 'disabled' : '' ?>">
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=<?= $currentPage + 1 ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    <?php endif; ?>
                </div>
            </div>
        </div>
            <table class="inventory-table">
                <thead>
                    <tr>
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
                            <td><?= htmlspecialchars($coupon->coupon_code) ?></td>
                            <td><?= htmlspecialchars($coupon->discount_percentage) ?></td>
                            <td><?= htmlspecialchars($coupon->start_time)?></td>
                            <td><?= isset($coupon->end_time) ? htmlspecialchars($coupon->end_time ) : "-" ?></td>
                            <td style="color:<?= ($coupon->is_active) ? "green" : "red"?>"><?= (htmlspecialchars($coupon->is_active )) ? "Active" : "Inactive" ?></td>
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
                    <input type="hidden" id="update-coupon-id" name="coupon_id">
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
                    <input type="hidden" id="delete-book-id" name="coupon_id">
                    <div class="modal-actions">
                        <button type="submit" class="delete-modal">Delete</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="custom-alert" class="error" style="display: none;">
    <div class="error__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
            </svg>
        </div>
        <div class="error__title" id="alert-message">Alert message goes here</div>
        <div class="error__close" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
            </svg>
        </div>
    </div>  
     <!-- footer begin -->
     <?php include 'smallFooter.view.php'; ?>   
    <!-- footer end -->     
    <script src="<?= ROOT ?>/assets/JS/bookstoreCoupon.js"></script>
    <script>
        <?php if (!empty($_SESSION['error'])): ?>
        <script>
            showAlert("<?= $_SESSION['error'] ?>", "error");
        </script>
        <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <script>
                showAlert("<?= $_SESSION['success'] ?>", "success");
            </script>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
    </script>
</body>
</html>