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
            <div class="logo-container">
                <a href="<?= ROOT ?>/home" class="title-link">
                    <h2 class="logo">Book<span class="highlight">Mart</span></h2>
                </a>
            </div>
            <div class="page-title">
                <h1><center>Courier Details</center></h1>
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
        <div class="tab">Ratings</div>
    </div>

    <div class="box">
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
                <span class="label">License Number :</span>
                <span class="detail-value"><?= htmlspecialchars($data['courier']->license_number ?? '') ?></span>
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
                <span class="label">Account Created :</span>
                <span class="detail-value"><?= htmlspecialchars($data['courier']->created_at ?? '') ?></span>
            </div>
        </div>
    </div> 

    <!-- Listning section -->
    <div class="section-title">
        <h2>Recent Deliveries</h2>
    </div>

    <div class="box">
        <div class="search-container">
            <i class="fas fa-search"></i>
            <input type="text" id="searchInput" placeholder="Search recent deleveries...">
        </div>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Delivery ID</th>
                        <th>Book Title</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>    
        </div>
    </div>

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
                        <th>Rating ID</th>
                        <th>Book Title</th>
                        <th>Rating</th>
                        <th>Date</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
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


    <script src="<?= ROOT ?>/assets/JS/adminViewusers.js"></script>
</body>
</html>