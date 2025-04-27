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
    <title>View Buyer</title>
</head>
<body>
<div class="header">
    <div class="header-wrapper">
        <div class="left-section">
            <div class="button-container">
                <button onclick="window.location.href='<?= ROOT ?>/AdminViewallusers'" class="close-btn"><b>Back to Users</b></button>
            </div>
            <div class="logo-container">
                <a href="<?= ROOT ?>/home" class="title-link">
                    <h2 class="logo">Book<span class="highlight">Mart</span></h2>
                </a>
            </div>
        </div>
        <div class="page-title">
            <h1>Buyer Details</h1>
        </div>
        <div class="spacer"></div>
    </div>
</div>

    <div class="main-container">
        <!-- User profile section -->
        <div class="box">
            <div class="user-profile">
                <div class="user-image">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-details">
                    <div class="user-name"><?= htmlspecialchars($data['buyer']->full_name ?? 'Buyer Name') ?></div>
                    <div class="user-type">Buyer</div>
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
                        <a href="<?= ROOT ?>/Chat/chatbox/<?= htmlspecialchars($data['user']->ID ?? '') ?>" class="btn messageBtn">
                            <i class="fas fa-envelope"></i> Send Message
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- User information -->
        <div class="tabs">
            <div class="tab active">Basic Info</div>
            <div class="tab">Recent Orders</div>
            <div class="tab">Reviews</div>
        </div>
        
        <div class="box">
            <div class="user-info">
                <div class="info-row">
                    <span class="label">Buyer ID</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->id ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Email</span>
                    <span class="detail-value"><?= htmlspecialchars($data['user']->email ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Phone Number</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->phone_number ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Gender</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->gender ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Date of Birth</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->dob ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Address</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->street_address ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">City</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->city ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">District</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->district ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Province</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->province ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Payment Method</span>
                    <span class="detail-value"><?= htmlspecialchars($data['buyer']->payment_method ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Account Created</span>
                    <span class="detail-value"><?= htmlspecialchars($data['user']->createdAt ?? '') ?></span>
                </div>
            </div>
        </div>

        <!-- Orders section -->
        <div class="section-title">
            <h2>Recent Orders</h2>
        </div>
        
        <div class="box">
            <div class="search-container">
                <input type="text" name="search" placeholder="Search by ID, title, or genre" id="searchOrderInput">
                <button type="submit">
                    <i class="fa fa-search"></i> 
                </button>
            </div>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Book Title</th>
                            <th>Order Date</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($data['orders']) && is_array($data['orders']) && count($data['orders']) > 0): ?>
                            <?php foreach($data['orders'] as $order): ?>
                                <tr>
                                    <td class="order_id"><?= htmlspecialchars($order->order_id) ?></td>
                                    <td class="title"><?= htmlspecialchars($order->title) ?></td>
                                    <td><?= htmlspecialchars($order->created_on) ?></td>
                                    <td class="order_status"><span class="status <?= strtolower($order->order_status) === 'completed' ? 'status-active' : 'status-suspended' ?>"><?= htmlspecialchars($order->order_status) ?></span></td>
                                    <td><span class="price">$<?= htmlspecialchars($order->total_amount) ?></span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No orders found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Reviews section -->
        <div class="section-title">
            <h2>Reviews</h2>
        </div>
        
        <div class="box">
            <div class="search-container">
                <input type="text" name="search" placeholder="Search by ID, title, or genre" id="searchReviewInput">
                <button type="submit">
                    <i class="fa fa-search"></i> 
                </button>
            </div>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Review ID</th>
                            <th>Book Title</th>
                            <th>Rating</th>
                            <th>Date</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($data['reviews']) && is_array($data['reviews']) && count($data['reviews']) > 0): ?>
                            <?php foreach($data['reviews'] as $review): ?>
                                <tr>
                                    <td class="id"><?= htmlspecialchars($review->id) ?></td>
                                    <td class="title"><?= htmlspecialchars($review->title) ?></td>
                                    <td><?= str_repeat('<i class="fas fa-star" style="color: gold;"></i>', $review->rating) ?></td>
                                    <td><?= htmlspecialchars($review->review_date) ?></td>
                                    <td><?= htmlspecialchars($review->comment) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No reviews found</td>
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('searchOrderInput').addEventListener('keyup', function () {
                const searchValue = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('.table tbody tr');

                tableRows.forEach(row => {
                    const id = row.querySelector('.order_id')?.textContent.toLowerCase() || '';
                    const title = row.querySelector('.title')?.textContent.toLowerCase() || '';
                    const status = row.querySelector('.order_status')?.textContent.toLowerCase() || '';

                    const match = id.includes(searchValue) || title.includes(searchValue) || status.includes(searchValue);
                    row.style.display = match ? '' : 'none';
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('searchReviewInput').addEventListener('keyup', function () {
                const searchValue = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('.table tbody tr');

                tableRows.forEach(row => {
                    const id = row.querySelector('.id')?.textContent.toLowerCase() || '';
                    const title = row.querySelector('.title')?.textContent.toLowerCase() || '';

                    const match = id.includes(searchValue) || title.includes(searchValue);
                    row.style.display = match ? '' : 'none';
                });
            });
        });
    </script>
    <style>
                
        #searchOrderInput {
        flex: 1;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 5px;
        }

        #searchReviewInput {
        flex: 1;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 5px;
        }
    </style>

    <script src="<?= ROOT ?>/assets/JS/adminViewusers.js"></script>
</body>
</html>