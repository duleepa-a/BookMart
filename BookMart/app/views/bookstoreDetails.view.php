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
        <a href="<?= ROOT ?>/admin/bookstoreView" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
            </svg>
            Back to Bookstore List
        </a>
        
        <div class="page-header">
            <h1 class="page-title"><?= htmlspecialchars($bookstore->store_name) ?></h1>
            
            <div class="status-badge status-<?= strtolower($bookstore->status) ?>">
                <?php if($bookstore->status == 'pending'): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                <?php elseif($bookstore->status == 'approved'): ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                <?php else: ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px;"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                <?php endif; ?>
                <?= htmlspecialchars($bookstore->status) ?>
            </div>
        </div>
        
        <div class="created-date">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="vertical-align: -2px; margin-right: 4px;">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="16" y1="2" x2="16" y2="6"></line>
                <line x1="8" y1="2" x2="8" y2="6"></line>
                <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            Request Submitted: <?= date('F j, Y, g:i a', strtotime($bookstore->createdAt)) ?>
        </div>
        
        <div class="card">
            <div class="card-header">
                Store Information
            </div>
            <div class="card-body info-grid">
                <div class="info-item">
                    <div class="info-label">Store Name</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->store_name) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Phone Number</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->phone_number) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Street Address</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->street_address) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">City</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->city) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">District</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->district) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Province</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->province) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Business Registration No.</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->business_reg_no) ?></div>
                </div>
            </div>
        </div>
        
        <!-- Two-column layout for Owner and Manager cards -->
        <div class="two-column-layout">
            <div class="card">
                <div class="card-header">
                    Owner Information
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <div class="info-label">Owner Name</div>
                        <div class="info-value"><?= htmlspecialchars($bookstore->owner_name) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Owner Email</div>
                        <div class="info-value"><?= htmlspecialchars($bookstore->owner_email) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Owner Phone</div>
                        <div class="info-value"><?= htmlspecialchars($bookstore->owner_phone_number) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Owner NIC</div>
                        <div class="info-value"><?= htmlspecialchars($bookstore->owner_nic) ?></div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    Manager Information
                </div>
                <div class="card-body">
                    <div class="info-item">
                        <div class="info-label">Manager Name</div>
                        <div class="info-value"><?= htmlspecialchars($bookstore->manager_name) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Manager Email</div>
                        <div class="info-value"><?= htmlspecialchars($bookstore->manager_email) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Manager Phone</div>
                        <div class="info-value"><?= htmlspecialchars($bookstore->manager_phone_number) ?></div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Manager NIC</div>
                        <div class="info-value"><?= htmlspecialchars($bookstore->manager_nic) ?></div>
                    </div>
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
                    <div class="info-value"><?= htmlspecialchars($bookstore->bank) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Branch Name</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->branch_name) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Account Holder's Name</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->account_name) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Account Number</div>
                    <div class="info-value"><?= htmlspecialchars($bookstore->account_number) ?></div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                Supporting Documents
            </div>
            <div class="card-body">
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
                        <div class="document-title">Evidence Document</div>
                        <div class="document-meta">Business Registration Document</div>
                    </div>
                    <a href="<?= ROOT ?>/admin/downloadEvidenceDoc/<?= urlencode($bookstore->evidence_doc) ?>" class="download-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                        Download
                    </a>
                </div>
            </div>
        </div>
        
        <?php if($bookstore->status == 'pending'): ?>
        <div class="action-buttons">
            <a href="<?= ROOT ?>/admin/bookstoreView" class="btn btn-cancel">Cancel</a>
            <form action="<?= ROOT ?>/admin/reject" method="POST" style="display: inline;">
                <input type="hidden" name="id" value="<?= $bookstore->id ?>">
                <button type="submit" class="btn btn-reject">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px; vertical-align: -3px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    Reject
                </button>
            </form>
            <form action="<?= ROOT ?>/admin/approve" method="POST" style="display: inline;">
                <input type="hidden" name="id" value="<?= $bookstore->id ?>">
                <button type="submit" class="btn btn-approve">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px; vertical-align: -3px;">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    Approve
                </button>
            </form>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>