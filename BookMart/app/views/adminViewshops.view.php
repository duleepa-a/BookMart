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
    <title>View Store</title>
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
                <h1>Store Details</h1>
            </div>
            <div class="spacer"></div>
        </div>
    </div>

    <div class="main-container">
        <div class="box">
            <div class="user-profile">
                <div class="user-image">
                    <i class="fas fa-store"></i>
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

        <!-- Tabs for navigation -->
        <div class="tabs">
            <div class="tab active" data-tab="basic-info">Basic Info</div>
            <div class="tab" data-tab="listings">Listings</div>
            <div class="tab" data-tab="ratings">Ratings</div>
        </div>

        <!-- Basic Info Section -->
        <div class="tab-content active" id="basic-info">
            <div class="box">
                <div class="inbox">
                    <div class="section-header">
                        <h3>Store Information</h3>
                    </div>
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

                <div class="inbox">
                    <div class="section-header">
                        <h3>Owner Information</h3>
                    </div>
                    <div class="user-info">
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
                    </div>
                </div>

                <div class="inbox">
                    <div class="section-header">
                        <h3>Manager Information</h3>
                    </div>
                    <div class="user-info">
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
                    </div>
                </div>

                <div class="inbox">
                    <div class="section-header">
                        <h3>Bank Details</h3>
                    </div>
                    <div class="user-info">
                        <div class="info-row">
                            <span class="label">Bank:</span>
                            <span class="detail-value"><?= htmlspecialchars($data['bookstore']->bank ?? '') ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">Branch Name:</span>
                            <span class="detail-value"><?= htmlspecialchars($data['bookstore']->branch_name ?? '') ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">Account Number:</span>
                            <span class="detail-value"><?= htmlspecialchars($data['bookstore']->account_number ?? '') ?></span>
                        </div>
                        <div class="info-row">
                            <span class="label">Account Name:</span>
                            <span class="detail-value"><?= htmlspecialchars($data['bookstore']->account_name ?? '') ?></span>
                        </div>
                    </div>
                </div>

                <div class="inbox">
    <div class="section-header">
        <h3>Financial Summary</h3>
    </div>
    <div class="user-info">
        <div class="info-row">
            <span class="label">Total Paid Amount:</span>
            <span class="detail-value">
                <?php 
                    $paidAmount = 0;
                    if(isset($data['payroll']) && is_array($data['payroll'])) {
                        foreach($data['payroll'] as $payment) {
                            // Only include payments for this specific store
                            if($payment->settlement_status === 'paid' && $payment->payee_id == $data['bookstore']->user_id) {
                                $paidAmount += $payment->net_amount;
                            }
                        }
                    }
                    echo "Rs. " . number_format($paidAmount, 2);
                ?>
            </span>
        </div>
        <div class="info-row">
            <span class="label">Total Pending Amount:</span>
            <span class="detail-value">
                <?php 
                    $pendingAmount = 0;
                    if(isset($data['payroll']) && is_array($data['payroll'])) {
                        foreach($data['payroll'] as $payment) {
                            // Only include payments for this specific store
                            if($payment->settlement_status === 'pending' && $payment->payee_id == $data['bookstore']->user_id) {
                                $pendingAmount += $payment->net_amount;
                            }
                        }
                    }
                    echo "Rs. " . number_format($pendingAmount, 2);
                ?>
            </span>
        </div>
        <div class="info-row">
            <span class="label">Last Payment Date:</span>
            <span class="detail-value">
                <?php
                    $lastPaymentDate = '';
                    if(isset($data['payroll']) && is_array($data['payroll'])) {
                        foreach($data['payroll'] as $payment) {
                            if($payment->settlement_status === 'paid' && 
                               $payment->payee_id == $data['bookstore']->user_id &&
                               (!$lastPaymentDate || strtotime($payment->settlement_date) > strtotime($lastPaymentDate))) {
                                $lastPaymentDate = $payment->settlement_date;
                            }
                        }
                    }
                    echo $lastPaymentDate ? htmlspecialchars($lastPaymentDate) : 'No payments yet';
                ?>
            </span>
        </div>
    </div>
</div>

                <div class="info-row">
                    <span class="label">Evidence Document:</span>
                    <span class="detail-value">
                        <div class="document-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                        <a href="<?= ROOT ?>/admin/downloadEvidenceDoc/<?= urlencode($data['bookstore']->evidence_doc ?? '') ?>" class="download-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Download
                        </a>
                    </span>
                </div>
            </div>
        </div>

        <!-- Listings Section -->
        <div class="tab-content" id="listings">
            <div class="section-title">
                <h2>Listings</h2>
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
                                        <td class='order_id'><?= htmlspecialchars($order->order_id) ?></td>
                                        <td class='title'><?= htmlspecialchars($order->title) ?></td>
                                        <td class='genre'><?= htmlspecialchars($order->genre) ?></td>
                                        <td><?= htmlspecialchars($order->price) ?></td>
                                        <td><?= htmlspecialchars($order->discount_applied) ?></td>
                                        <td><?= htmlspecialchars($order->quanitity) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">No listings found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>

        <!-- Ratings Section -->
        <div class="tab-content" id="ratings">
            <div class="section-title">
                <h2>Ratings</h2>
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
                                <th>Reviewed user</th>
                                <th>Date</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($data['reviews']) && is_array($data['reviews']) && count($data['reviews']) > 0): ?>
                                <?php foreach($data['reviews'] as $review): ?>
                                    <tr>
                                        <td class='id'><?= htmlspecialchars($review->id) ?></td>
                                        <td class='title'><?= htmlspecialchars($review->title) ?></td>
                                        <td><?= htmlspecialchars($review->rating) ?></td>
                                        <td class='full_name'><?= htmlspecialchars($review->full_name) ?></td>
                                        <td><?= htmlspecialchars($review->review_date) ?></td>
                                        <td><?= htmlspecialchars($review->comment) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">No ratings found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
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
                    const genre = row.querySelector('.genre')?.textContent.toLowerCase() || '';

                    const match = id.includes(searchValue) || title.includes(searchValue) || genre.includes(searchValue);
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
                    const full_name = row.querySelector('.full_name')?.textContent.toLowerCase() || '';

                    const match = id.includes(searchValue) || title.includes(searchValue) || full_name.includes(searchValue);
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
