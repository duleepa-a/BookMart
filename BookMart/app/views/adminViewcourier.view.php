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
    <title>view courier</title>
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
            <h1>Courier Details</h1>
        </div>
        <div class="spacer"></div>
    </div>
</div>

<div class="main-container">
    <div class="box">
        <div class="user-profile">
            <div class="user-image">
                <i class="fas fa-user"></i>
            </div>

            <div class="user-details">
                <div class="user-name"><?= htmlspecialchars($data['courier']->first_name ?? 'courier') ?>  <?= htmlspecialchars($data['courier']->last_name ?? 'name') ?></div>
                <div class="user-type">Courier</div>
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
    
    <div class="tabs">
        <div class="tab active">Basic Info</div>
        <div class="tab">Recent Deliveries</div>
    </div>
    <div class="box">
        <div class="inbox">
            <div class="section-header">
                <h3>Personal Information</h3>
            </div>
            <div class="user-info">
                <div class="info-row">
                    <span class="label">Courier ID :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->id ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">First Name :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->first_name ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Last Name :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->last_name ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Date Of Birth :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->dob ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Gender :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->gender ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">NIC Number :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->nic_number ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Photo of National ID Card:</span>
                    <span class="detail-value">
                        <div class="document-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="16" rx="2" ry="2"></rect>
                                <circle cx="9" cy="10" r="2"></circle>
                                <path d="M15 8h2"></path>
                                <path d="M15 12h2"></path>
                                <path d="M7 16h10"></path>
                            </svg>
                        </div>
                        <a href="<?= ROOT ?>/admin/downloadCourierDoc/<?= urlencode($courier->photo_nic) ?>" class="download-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Download
                        </a>
                    </span>
                </div>
                <div class="info-row">
                    <span class="label">License Number :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->license_number ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Photo of Driving License :</span>
                    <span class="detail-value">
                        <div class="document-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="16" rx="2" ry="2"></rect>
                                <path d="M7 8h10"></path>
                                <path d="M7 12h10"></path>
                                <path d="M7 16h6"></path>
                            </svg>
                        </div>
                        <a href="<?= ROOT ?>/admin/downloadCourierDoc/<?= urlencode($courier->photo_of_driving_license) ?>" class="download-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Download
                        </a>
                    </span>
                </div>

                <div class="info-row">
                    <span class="label">Email:</span>
                    <span class="detail-value"><?= htmlspecialchars($data['user']->email ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Phone Number :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->phone_number ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">City :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->city ?? '') ?></span>
                </div>

            </div>
        </div>

        <div class="inbox">
            <div class="section-header">
                <h3>Bank Details</h3>
            </div>
            <div class="user-info">
                <div class="info-row">
                    <span class="label">Bank :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->bank ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Branch :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->branch_name ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Account Number :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->account_number ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Account Name :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->account_name ?? '') ?></span>
                </div>
            </div>
        </div>

        <div class="inbox">
            <div class="section-header">
                <h3>Vehicle Information</h3>
            </div>
            <div class="user-info">
                <div class="info-row">
                    <span class="label">Vehicle Type :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->vehicle_type  ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Vehicle Model :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->vehicle_model ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Vehicle Registration Number :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->vehicle_registration_number ?? '') ?></span>
                </div>
                <div class="info-row">
                    <span class="label">Vehicle Registration Document:</span>
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
                        <a href="<?= ROOT ?>/admin/downloadCourierDoc/<?= urlencode($courier->vehicle_registration_document) ?>" class="download-btn">
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

        <div class="inbox">
            <div class="section-header">
                <h3>Account Information</h3>
            </div>
            <div class="user-info">
                <div class="info-row">
                    <span class="label">Account Created :</span>
                    <span class="detail-value"><?= htmlspecialchars($data['courier']->created_at ?? '') ?></span>
                </div>
            </div>
        </div> 
    </div>
    <!-- Listning section -->
    <div class="section-title">
        <h2>Recent Deliveries</h2>
    </div>

    <div class="box">
            <div class="search-container">
                <input type="text" name="search" placeholder="Search by ID, title, or status" id="searchInput">
                <button type="submit">
                    <i class="fa fa-search"></i> 
                </button>
            </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Delivery ID</th>
                        <th>Book Title</th>
                        <th>Total amount</th>
                        <th>Status</th>
                        <th>Pickup Location</th>
                        <th>Delivery Address</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($data['deliveries'])): ?>
                        <?php foreach($data['deliveries'] as $delivery): ?>
                            <tr>
                                <td class="id"><?= htmlspecialchars($delivery->id ?? '') ?></td>
                                <td class="title"><?= htmlspecialchars($delivery->title ?? '') ?></td>
                                <td><?= htmlspecialchars($delivery->total_amount ?? '') ?></td>
                                <td class="status">
                                    <span class="status <?= strtolower($delivery->status ?? '') == 'completed' ? 'status-active' : 'status-suspended' ?>">
                                        <?= htmlspecialchars($delivery->status ?? '') ?>
                                    </span>
                                </td>
                                <td><?= htmlspecialchars($delivery->pickup_location ?? '') ?></td>
                                <td><?= htmlspecialchars($delivery->shipping_address ?? '') ?></td>
                                <td><?= htmlspecialchars($delivery->created_on ?? '') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center;">No Recent deliveries found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>    
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
            document.getElementById('searchInput').addEventListener('keyup', function () {
                const searchValue = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('.table tbody tr');

                tableRows.forEach(row => {
                    const id = row.querySelector('.order_id')?.textContent.toLowerCase() || '';
                    const title = row.querySelector('.title')?.textContent.toLowerCase() || '';
                    const status = row.querySelector('.status')?.textContent.toLowerCase() || '';

                    const match = id.includes(searchValue) || title.includes(searchValue) || status.includes(searchValue);
                    row.style.display = match ? '' : 'none';
                });
            });
        });
    </script>
    <style>
                
        #searchInput {
        flex: 1;
        padding: 10px;
        border: 2px solid #ddd;
        border-radius: 5px;
        }

    </style>

    <script src="<?= ROOT ?>/assets/JS/adminViewusers.js"></script>
</body>
</html>