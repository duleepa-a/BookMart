<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminViewusers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>view shops</title>
</head>
<body>

    <div class="header">
        <div class="header-wrapper">
            <div class="logo-container">
                <a href="<?= ROOT ?>/home" class="title-link">
                    <h2 class="logo">Book<span class="highlight">Mart</span></h2>
                </a>
            </div>
            <div class="page-title">
                <h1><center>Store Details</center></h1>
            </div>
        </div>
    </div>

<div class="main-container">
    <div class="box">
        <div class="user-profile">
            <div class="user-image">
                <i class="fas fa-user"></i>
            </div>

            <div class="user-details">
                <div class="user-name"><?= htmlspecialchars($data['bookstore']->store_name ?? 'Store Name') ?></div>
                <div class="user-type">Book Store</div>
                <div class="info-row">
                    <span class="label">Status</span>
                    <span class="detail-value">
                        <span class="status <?= ($data['user']->active_status ?? '') === 'active' ? 'status-active' : 'status-suspended' ?>" id="status-text">
                            <?= htmlspecialchars($data['user']->active_status ?? '') ?>
                        </span>
                    </span>
                </div>
                <div class="button-group">
                    <button class="btn suspendBtn" id="status-toggle">
                        <?= ($data['user']->active_status ?? '') === 'active' ? 'Suspend' : 'Activate' ?>
                    </button>
                    <a href="<?= ROOT ?>/adminSendmsg?email=<?= htmlspecialchars($data['user']->email ?? '') ?>" class="btn messageBtn">
                        <i class="fas fa-envelope"></i> Send Mail
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- User information -->
    <div class="tabs">
        <div class="tab active">Basic Info</div>
        <div class="tab">Listnings</div>
        <div class="tab">Ratings</div>
    </div>

    <div class="box">
        <div class="user-info">
            <div class="info-row">
                <span class="label">Shop ID:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->id ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Name:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->store_name ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Phone Number:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->phone_number ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Address:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->street_address ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">City:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->city ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">District:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->district ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Province:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->province ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Owner Name:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->owner_name ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Owner Email:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->owner_email ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Owner Phone Number:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->owner_phone_number ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Owner NIC:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->owner_nic ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Manager Name:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->manager_name ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Manager Email:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->manager_email ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Manager Phone Number:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->manager_phone_number ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Manager NIC:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->manager_nic ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Business Registration Number:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->business_reg_no ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Status:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->status ?? '') ?></span>
            </div>
            <div class="info-row">
                <span class="label">Account created:</span>
                <span class="detail-value"><?= htmlspecialchars($data['bookstore']->createdAt ?? '') ?></span>
            </div>
        </div>
    </div> 

    <!-- Listning section -->
    <div class="section-title">
        <h2>Listnings</h2>
    </div>

    <div class="box">
        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Search listnings...">
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Book Title</th>
                        <th>Genre</th>
                        <th>Price</th>
                        <th>Discount Applied</th>
                        <th>Sales Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($data['orders']) && is_array($data['orders']) && count($data['orders']) > 0): ?>
                        <?php foreach($data['orders'] as $order): ?>
                            <tr>
                                <td><?= htmlspecialchars($order->order_id) ?></td>
                                <td><?= htmlspecialchars($order->title) ?></td>
                                <td><?= htmlspecialchars($order->genre) ?></td>
                                <td><?= htmlspecialchars($order->price) ?></td>
                                <td><?= htmlspecialchars($order->discount_applied) ?></td>
                                <td><?= htmlspecialchars($order->quanitity) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No listnings found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>    
        </div>
    </div><br>

    <!-- Ratings section -->
    <div class="section-title">
        <h2>Ratings</h2>
    </div>

    <div class="box">
        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" id="reviewSearchInput" placeholder="Search ratings...">
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Review ID</th>
                        <th>Book Title</th>
                        <th>Rating</th>
                        <th>Reviewed user</th>
                        <th>Date</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($data['reviews']) && is_array($data['reviews']) && count($data['reviews']) > 0): ?>
                        <?php foreach($data['reviews'] as $review): ?>
                            <tr>
                                <td><?= htmlspecialchars($review->id) ?></td>
                                <td><?= htmlspecialchars($review->title) ?></td>
                                <td><?= htmlspecialchars($review->rating) ?></td>
                                <td><?= htmlspecialchars($review->full_name) ?></td>
                                <td><?= htmlspecialchars($review->review_date) ?></td>
                                <td><?= htmlspecialchars($review->comment) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                           <tr>
                            <td colspan="5">No ratings found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Confirmation Dialog -->
<div id="confirmationDialog">
    <div class="dialog-content">
        <h3>Confirm Action</h3>
            <p>Are you sure you want to change this user's status?</p>
        <div class="dialog-buttons">
            <button id="cancelBtn" class="btn">Cancel</button>
            <button id="confirmDeleteBtn" class="btn deleteUserBtn">Confirm</button>
        </div>
    </div>
</div>

<!-- Success Message -->
<div id="successMessage">
    <div class="dialog-content">
        <h3>Success!</h3>
        <p>User status has been updated successfully.</p>
    </div>
</div>

    <script src="<?= ROOT ?>/assets/JS/adminViewusers.js"></script>

</body>
</html>
