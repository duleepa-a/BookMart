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
            <li><button class="add-book-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Post Ads & offers</button></li>
            <li><a href="<?= ROOT ?>/BookstoreController/inventory" ><i class="fa-solid fa-book"></i>My Inventory</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/Analytics"><i class="fa-solid fa-chart-column"></i>Analytics</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/orders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/getReviews"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/advertisments" class="active"><i class="fa-solid fa-up-right-from-square"></i>Ads & Offers</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/myProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <div class="container">
    <div id="add-book-modal"class="modal hidden">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <form class="add-adv-form" method="POST" action="<?= ROOT ?>/BookstoreController/requestAdvertisment" enctype="multipart/form-data">
                <h2 class="full-width">Add Advertisement</h2>

                <!-- Advertisement Title -->
                <div class="form-row">
                    <div class="form-group">
                        <div>
                            <label for="ad_title">Title:</label>
                            <input type="text" id="ad_title" name="title" required>
                        </div>
                    </div>
                        <!-- Ad Image -->
                    <div class="form-group">
                        <div>
                            <label for="ad_image">Advertisement Image:</label>
                            <input type="file" id="ad_image" name="image" accept="image/*" required>
                            <small style="color: #666;">Recommended image size: 1200 × 150 pixels (w × h)</small>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">    
                    <!-- Start Date -->
                        <div>
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date">
                        </div>
                    </div>
                    <!-- End Date -->
                    <div class="form-group">
                        <div>
                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date">
                        </div>
                    </div>
                </div>
                <!-- Modal Actions -->
                <div class="modal-actions">
                    <button type="submit">Post Ad</button>
                    <button type="button" class="close-modal">Cancel</button>
                </div>
            </form>
        </div>
            
        
    </div>
            <h1 class="inventory-title">Advertisments & Offers </h1>
            <br>
            <?php if (!empty($advertisments)): ?>
            <div class="tab-content" id="Advertisments">
                <div class="inventory-toolbar">
                    <input type="text" placeholder="Search advertisements" class="inventory-search-bar">
                    <div class="filter">
                        <label for="status-filter">SHOW:</label>
                        <select id="status-filter" class="status-filter">
                            <option value="all">All</option>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="rejected">Rejected</option>
                        </select>
                    </div>
                </div>
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="select-all"></th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Payment</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach ($advertisments as $ad): ?>
                                <tr>
                                    <td><input type="checkbox" class="select-order"></td>

                                    <!-- Image Preview -->
                                    <td>
                                        <?php if (!empty($ad->image_path)): ?>
                                            <img src="<?= ROOT ?>\assets\Images\store_advertisments\<?= $ad->image_path ?>" alt="Ad Image" style="width: 100px; height: auto; object-fit: cover;">
                                        <?php else: ?>
                                            No image
                                        <?php endif; ?>
                                    </td>

                                    <td><?= htmlspecialchars($ad->title) ?></td>

                                    <!-- Status with styling -->
                                    <td class="status <?= strtolower($ad->status) ?>">
                                        <?= ucfirst($ad->status) ?>
                                    </td>

                                    <td><?= $ad->start_date ?></td>
                                    <td><?= $ad->end_date ?></td>
                                    <td>Rs. <?= number_format($ad->payment_amount, 2) ?></td>
                                    <!-- Active Status -->
                                    <td>
                                        <?= $ad->active_status == 1 ? '<span style="color: green;">Active</span>' : '<span style="color: red;">Inactive</span>' ?>
                                    </td>
                                    <td>
                                    <?php if ($ad->payment_amount > 0 && $ad->active_status == 0): ?>
                                        <form method="POST" action="<?= ROOT ?>/Payment/payAd">
                                            <input type="hidden" name="ad_id" value="<?= $ad->id ?>">
                                            <input type="hidden" name="amount" value="<?= $ad->payment_amount ?>">
                                            <button type="submit" class="pay-now-btn">Pay Now</button>
                                        </form>
                                    <?php else: ?>
                                        <span style="color: gray;">-</span>
                                    <?php endif; ?>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>
            </div> 
            <?php else: ?>
                            <div class="message-div">No advertisements found.</div>
            <?php endif; ?>
    </div>
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer> 
    <script src="<?= ROOT ?>/assets/JS/bookstoreAds.js"></script>
</body>
</html>