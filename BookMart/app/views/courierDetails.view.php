<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreDetails.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Bookstore Details</title>
</head>
<body>
<div class="container">
        <a href="<?= ROOT ?>/admin/couriers" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Back to Courier List
        </a>
        
        <div class="profile-section">
            <div>
                <h1 class="courier-name"><?= htmlspecialchars($courier->first_name . ' ' . $courier->last_name) ?></h1>
                <div class="courier-id">Courier ID: <?= htmlspecialchars($courier->id) ?></div>
                <div class="created-date">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -2px; margin-right: 4px;">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    Registered on: <?= date('F j, Y, g:i a', strtotime($courier->created_at)) ?>
                </div>
            </div>
            <div>
                <?php if(!empty($courier->drivers_photo)): ?>
                    <img src="<?= ROOT ?>/uploads/<?= htmlspecialchars($courier->drivers_photo) ?>" alt="Driver's Photo" class="profile-image">
                <?php else: ?>
                    <div class="profile-placeholder">
                        <?= strtoupper(substr($courier->first_name, 0, 1) . substr($courier->last_name, 0, 1)) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="two-column-layout">
            <div class="card">
                <div class="card-header">
                    Personal Information
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <div class="info-label">Date of Birth</div>
                        <div class="info-value"><?= date('F j, Y', strtotime($courier->dob)) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Gender</div>
                        <div class="info-value"><?= htmlspecialchars($courier->gender) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">NIC Number</div>
                        <div class="info-value"><?= htmlspecialchars($courier->nic_number) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">License Number</div>
                        <div class="info-value"><?= htmlspecialchars($courier->license_number) ?></div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    Contact Information
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <div class="info-label">Phone Number</div>
                        <div class="info-value"><?= htmlspecialchars($courier->phone_number) ?></div>
                    </div>
                    <?php if(!empty($courier->secondary_phone_number)): ?>
                    <div class="info-item">
                        <div class="info-label">Secondary Phone</div>
                        <div class="info-value"><?= htmlspecialchars($courier->secondary_phone_number) ?></div>
                    </div>
                    <?php endif; ?>
                    <div class="info-item">
                        <div class="info-label">Address</div>
                        <div class="info-value">
                            <?= htmlspecialchars($courier->address_line_1) ?>
                            <?php if(!empty($courier->address_line_2)): ?>
                            <br><?= htmlspecialchars($courier->address_line_2) ?>
                            <?php endif; ?>
                            <br><?= htmlspecialchars($courier->city) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                Vehicle Information
            </div>
            <div class="card-body info-grid">
                <div class="info-item">
                    <div class="info-label">Vehicle Type</div>
                    <div class="info-value"><?= htmlspecialchars($courier->vehicle_type) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Vehicle Model</div>
                    <div class="info-value"><?= htmlspecialchars($courier->vehicle_model) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Registration Number</div>
                    <div class="info-value"><?= htmlspecialchars($courier->vehicle_registration_number) ?></div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                Bank Details
            </div>
            <div class="card-body info-grid">
                <div class="info-item">
                    <div class="info-label">Bank</div>
                    <div class="info-value"><?= htmlspecialchars($courier->bank) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Branch Name</div>
                    <div class="info-value"><?= htmlspecialchars($courier->branch_name) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Account Holder's Name</div>
                    <div class="info-value"><?= htmlspecialchars($courier->account_name) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Account Number</div>
                    <div class="info-value"><?= htmlspecialchars($courier->account_number) ?></div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                Documents
            </div>
            <div class="card-body document-grid">
                <?php if(!empty($courier->vehicle_registration_document)): ?>
                <div class="document-item">
                    <div class="document-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <div class="document-info">
                        <div class="document-title">Vehicle Registration</div>
                        <div class="document-meta">Vehicle Registration Document</div>
                    </div>
                    <a href="<?= ROOT ?>/admin/downloadCourierDoc/<?= urlencode($courier->vehicle_registration_document) ?>" class="download-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Download
                    </a>
                </div>
                <?php endif; ?>
                
                <?php if(!empty($courier->photo_nic)): ?>
                <div class="document-item">
                    <div class="document-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="16" rx="2" ry="2"></rect>
                            <circle cx="9" cy="10" r="2"></circle>
                            <path d="M15 8h2"></path>
                            <path d="M15 12h2"></path>
                            <path d="M7 16h10"></path>
                        </svg>
                    </div>
                    <div class="document-info">
                        <div class="document-title">National ID</div>
                        <div class="document-meta">Photo of National ID Card</div>
                    </div>
                    <a href="<?= ROOT ?>/admin/downloadCourierDoc/<?= urlencode($courier->photo_nic) ?>" class="download-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Download
                    </a>
                </div>
                <?php endif; ?>
                
                <?php if(!empty($courier->photo_of_driving_license)): ?>
                <div class="document-item">
                    <div class="document-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="16" rx="2" ry="2"></rect>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h6"></path>
                        </svg>
                    </div>
                    <div class="document-info">
                        <div class="document-title">Driving License</div>
                        <div class="document-meta">Photo of Driving License</div>
                    </div>
                    <a href="<?= ROOT ?>/admin/downloadCourierDoc/<?= urlencode($courier->photo_of_driving_license) ?>" class="download-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Download
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="action-buttons">
            <a href="<?= ROOT ?>/admin/bookstoreView" class="btn btn-cancel">Cancel</a>
            <form action="<?= ROOT ?>/admin/deactiveUser" method="POST" style="display: inline;">
                <input type="hidden" name="id" value="<?= $courier->id ?>">
                <button type="submit" class="btn btn-reject">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px; vertical-align: -3px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    Delete User
                </button>
            </form>
        </div>
    </div>
</body>
</html>