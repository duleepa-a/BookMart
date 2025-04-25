<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminAdd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart</title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php';?>
    <!-- navBar division end -->
     
    <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <div class="container"> 
        <div id="add-modal"class="modal hidden">
            <div class="modal-overlay"></div>
                <div class="modal-content">
                <form class="add-form" method="POST" action="<?= ROOT ?>/admin/addRefund">
                    <h2>Add Refund Details</h2>

                    <div class="form-row">
                        <div class="form-item">
                            <label for="order_id">Payee ID:</label>
                            <input type="number" class="input-advertisments" id="payee_id" name="payee_id" placeholder="Enter buyer's ID" required>
                        </div>
                        <div class="form-item">
                            <label for="order_id">Order ID:</label>
                            <input type="number" class="input-advertisments" id="order_id" name="order_id" placeholder="Enter Order ID" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-item">
                            <label for="bank">Bank:</label>
                            <input type="text" class="input-advertisments" id="bank" name="bank" placeholder="Enter bank name" required>
                        </div>
                        <div class="form-item">
                            <label for="branch_name">Branch Name:</label>
                            <input type="text" class="input-advertisments" id="branch_name" name="branch_name" placeholder="Enter branch name" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-item">
                            <label for="account_number">Account Number:</label>
                            <input type="text" class="input-advertisments" id="account_number" name="account_number" placeholder="Enter account number" required>
                        </div>
                        <div class="form-item">
                            <label for="account_name">Account Name:</label>
                            <input type="text" class="input-advertisments" id="account_name" name="account_name" placeholder="Enter account holder's name" required>
                        </div>
                    </div>
                    <div class="modal-actions">
                        <button type="submit">Add</button>
                        <button type="button" class="cancel close-modal">Cancel</button>
                    </div>
                </form>

                </div>
        </div>                  
        
        <div class="box"> 
             <div class="page-title">
                <h1 class="inventory-title">Pay Rolls</h1><br>
             </div>
             <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('new-add')" id="new-add-button" >Payrolls</button>
                <button class="tab-button" onclick="showTab('refund-req')" id="refund-req-button">Refund Requests</button>
            </nav>
            <div class="tab-content" id="new-add" >
            
                <div class="add-toolbar">
                    <button class="add-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add Refund</button>
                    <input type="text" placeholder="Search payroll" class="add-search-bar" id="searchInput" onkeyup="searchStores()">
                    <div class="filter">
                        <label for="status-filter">SHOW:</label>
                        <select id="status-filter" class="status-filter">
                            <option value="all" <?= $filterStatus === 'all' ? 'selected' : '' ?>>All</option>
                            <option value="pending" <?= $filterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="paid" <?= $filterStatus === 'paid' ? 'selected' : '' ?>>Paid</option>
                        </select>
                    </div>
                    <button id="settle-selected" class="settle-selected-btn">Settle Selected</button>
                </div>
            
                <!-- Retrieve Advertisements -->
                <?php if (!empty($payrolls)) : ?>
                    <table class="add-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all-checkbox"></th>
                                <th>Payee ID</th>
                                <th>Payment ID</th>
                                <th>Transaction Type</th>
                                <th>Gross Amount</th>
                                <th>System Fee</th>
                                <th>Net Amount</th>
                                <th>Bank</th>
                                <th>Branch Name</th>
                                <th>Account Number</th>
                                <th>Holder's Name</th>
                                <th>Payment Date</th>
                                <th>Settlement Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payrolls as $payroll) : ?>
                                <tr>
                                    <td><input type="checkbox" class="payroll-checkbox" value="<?= $payroll->id ?>"></td>
                                    <td><?= htmlspecialchars($payroll->payee_id) ?></td>
                                    <td><?= htmlspecialchars($payroll->payment_id) ?></td>
                                    <td><?= htmlspecialchars($payroll->transaction_type) ?></td>
                                    <td>Rs.<?= htmlspecialchars($payroll->gross_amount) ?></td>
                                    <td>Rs.<?= htmlspecialchars($payroll->system_fee) ?></td>
                                    <td>Rs.<?= htmlspecialchars($payroll->net_amount) ?></td>
                                    <td><?= htmlspecialchars($payroll->bank) ?></td>
                                    <td><?= htmlspecialchars($payroll->branch_name) ?></td>
                                    <td><?= htmlspecialchars($payroll->account_number) ?></td>
                                    <td><?= htmlspecialchars($payroll->account_name) ?></td>
                                    <td><?= htmlspecialchars($payroll->payment_date) ?></td>
                                    <td>
                                    <?php if ($payroll->settlement_date): ?>
                                        <?= htmlspecialchars($payroll->settlement_date) ?>
                                    <?php else: ?>
                                        <span class="tag tag-grey">Not paid</span>
                                    <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if ($payroll->settlement_status == 'pending' ): ?>
                                        <button class="resolve-btn" data-payroll="<?= $payroll->id ?>">
                                            settle
                                        </button>
                                    <?php else: ?>
                                        <span class="tag tag-green"> paid</span>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <div class="pagination">
                            <!-- Previous Arrow -->
                            <div class="pagination-item pagination-arrow <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                                <?php if ($currentPage > 1): ?>
                                    <a href="?page=<?= $currentPage - 1 ?>&status=<?= urlencode($filterStatus) ?>&refund_page=<?= $refundPage ?>&refund_status=<?= urlencode($refundFilterStatus) ?>">
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
                            <?php for ($i = 1; $i <= $totalPayrollPages; $i++): ?>
                                <?php if ($i == 1 || $i == $totalPayrollPages || abs($i - $currentPage) <= 1): ?>
                                    <div class="pagination-item pagination-number <?= $currentPage == $i ? 'active' : '' ?>">
                                        <a href="?page=<?= $i ?>&status=<?= urlencode($filterStatus) ?>&refund_page=<?= $refundPage ?>&refund_status=<?= urlencode($refundFilterStatus) ?>" style="color: inherit; text-decoration: none; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                            <?= $i ?>
                                        </a>
                                    </div>
                                <?php elseif ($i == 2 && $currentPage > 3 || $i == $totalPayrollPages - 1 && $currentPage < $totalPayrollPages - 2): ?>
                                    <div class="pagination-item pagination-dots">...</div>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <!-- Next Arrow -->
                            <div class="pagination-item pagination-arrow <?= $currentPage >= $totalPayrollPages ? 'disabled' : '' ?>">
                                <?php if ($currentPage < $totalPayrollPages): ?>
                                    <a href="?page=<?= $currentPage + 1 ?>&status=<?= urlencode($filterStatus) ?>&refund_page=<?= $refundPage ?>&refund_status=<?= urlencode($refundFilterStatus) ?>">
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
                <!-- No payrolls message -->
                <?php else : ?>
                    <div class="no-add-message">
                        <p>No payroll records found.</p>
                    </div>
                <?php endif; ?>

            </div>
            <div class="tab-content" id="refund-req" style="display:none;">
            
                <div class="add-toolbar">
                    <input type="text" placeholder="Search refund requests"  id="searchInput" onkeyup="searchStores()"  class="add-search-bar">
                    <div class="filter">
                        <label for="refund-status-filter">SHOW:</label>
                        <select id="refund-status-filter" class="status-filter">
                            <option value="all" <?= $refundFilterStatus === 'all' ? 'selected' : '' ?>>All</option>
                            <option value="pending" <?= $refundFilterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="approved" <?= $refundFilterStatus === 'approved' ? 'selected' : '' ?>>Approved</option>
                            <option value="rejected" <?= $refundFilterStatus === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                        </select>
                    </div>   
                </div>

                
                <!-- Retrieve Advertisements -->
                <?php if (!empty($refundRequests)) : ?>
                    <table class="add-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Buyer ID</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Reason</th>
                                <th>Evidence</th>
                                <th>Bank</th>
                                <th>Branch</th>
                                <th>Account No</th>
                                <th>Account Name</th>
                                <th>Status</th>
                                <th>Requested At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($refundRequests as $refund) : ?>
                                <tr>
                                    <td><?= htmlspecialchars($refund->order_id) ?></td>
                                    <td><?= htmlspecialchars($refund->buyer_id) ?></td>
                                    <td><?= htmlspecialchars($refund->email) ?></td>
                                    <td><?= htmlspecialchars($refund->phone ?? '-') ?></td>
                                    <td><?= htmlspecialchars($refund->reason) ?></td>
                                    <td>
                                        <?php if (!empty($refund->evidence)) : ?>
                                            <a href="<?= ROOT ?>/admin/downloadRefundEvdience/<?= urlencode($refund->evidence) ?>"  style="text-decoration: none;" class="resolve-btn" >View</a>
                                        <?php else : ?>
                                            <span class="tag tag-grey">No File</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($refund->bank_name) ?></td>
                                    <td><?= htmlspecialchars($refund->branch_name) ?></td>
                                    <td><?= htmlspecialchars($refund->account_number) ?></td>
                                    <td><?= htmlspecialchars($refund->account_name) ?></td>
                                    <td>
                                        <?php if ($refund->status == 'pending') : ?>
                                            <span class="tag tag-grey">Pending</span>
                                        <?php elseif ($refund->status == 'approved') : ?>
                                            <span class="tag tag-green">Approved</span>
                                        <?php else : ?>
                                            <span class="tag tag-red">Rejected</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= htmlspecialchars($refund->created_at) ?></td>
                                    <td>
                                        <?php if ($refund->status == 'pending') : ?>
                                            <form method="post" action="<?= ROOT ?>/admin/updateRefundStatus" >
                                                <input type="hidden" name="id" value="<?= $refund->id ?>">
                                                <input type="hidden" name="action" value="approved">
                                                <button type="submit" class="resolve-btn">Approve</button>
                                            </form>
                                            <form method="post" action="<?= ROOT ?>/admin/updateRefundStatus">
                                                <input type="hidden" name="id" value="<?= $refund->id ?>">
                                                <input type="hidden" name="action" value="rejected">
                                                <button type="submit" class="reject-btn">Reject</button>
                                            </form>
                                        <?php endif; ?>
                                        <form method="post" action="<?= ROOT ?>/admin/deleteRefundRequest">
                                            <input type="hidden" name="id" value="<?= $refund->id ?>">
                                            <button type="submit" class="delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <div class="pagination">
                            <!-- Previous Arrow -->
                            <div class="pagination-item pagination-arrow <?= $refundPage <= 1 ? 'disabled' : '' ?>">
                                <?php if ($refundPage > 1): ?>
                                    <a href="?refund_page=<?= $refundPage - 1 ?>&refund_status=<?= urlencode($refundFilterStatus) ?>&page=<?= $currentPage ?>&status=<?= urlencode($filterStatus) ?>&tab=<?= urlencode($tab)?>">
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
                            <?php for ($i = 1; $i <= $totalRefundPages; $i++): ?>
                                <?php if ($i == 1 || $i == $totalRefundPages || abs($i - $refundPage) <= 1): ?>
                                    <div class="pagination-item pagination-number <?= $refundPage == $i ? 'active' : '' ?>">
                                        <a href="?refund_page=<?= $i ?>&refund_status=<?= urlencode($refundFilterStatus) ?>&page=<?= $currentPage ?>&status=<?= urlencode($filterStatus) ?>&tab=<?= urlencode($tab)?>"" style="color: inherit; text-decoration: none; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                            <?= $i ?>
                                        </a>
                                    </div>
                                <?php elseif ($i == 2 && $refundPage > 3 || $i == $totalRefundPages - 1 && $refundPage < $totalRefundPages - 2): ?>
                                    <div class="pagination-item pagination-dots">...</div>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <!-- Next Arrow -->
                            <div class="pagination-item pagination-arrow <?= $refundPage >= $totalRefundPages ? 'disabled' : '' ?>">
                                <?php if ($refundPage < $totalRefundPages): ?>
                                    <a href="?refund_page=<?= $refundPage + 1 ?>&refund_status=<?= urlencode($refundFilterStatus) ?>&page=<?= $currentPage ?>&status=<?= urlencode($filterStatus) ?>&tab=<?= urlencode($tab)?>"">
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
                <?php else : ?>
                    <div class="no-add-message">
                        <p>No refund requests found.</p>
                    </div>
                <?php endif; ?>
            </div>

        
            <!--Delete-->
            <div class="modal" id="delete-add-modal">
                <div class="modal-overlay"></div>
                <div class="modal-content">
                    <form class="delete-add-form" method="POST" action="<?= ROOT ?>/adminAdvertisment/deleteAdvertisement">
                        <h2 class="full-width">Delete Advertisement</h2>
                        <p>Are you sure you want to delete this Advertisement?</p>
                        <p id="delete-add-details"></p> <!-- For displaying book details -->
                        <input type="hidden" id="delete-add-id" name="add_id">
                        <div class="modal-actions">
                            <button type="submit" class="confirm-delete">Delete</button>
                            <button type="button" class="close-modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
  
            

        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/adminBookstore.js"></script>
    <script>
        const ROOT = "<?= ROOT ?>";
        document.querySelectorAll('.resolve-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const Id = this.getAttribute('data-payroll');
                window.location.href = `<?= ROOT ?>/admin/markAsResolve/${Id}`;
            });
        });
        // Payroll filter
        const payrollStatusFilter = document.getElementById('status-filter');
        payrollStatusFilter.addEventListener('change', () => {
            const selectedStatus = payrollStatusFilter.value;
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('status', selectedStatus);
            urlParams.set('page', 1); // reset to first page on filter change
            window.location.search = urlParams.toString();
        });

        // Refund filter
        const refundStatusFilter = document.getElementById('refund-status-filter');
        refundStatusFilter.addEventListener('change', () => {
            const selectedStatus = refundStatusFilter.value;
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('refund_status', selectedStatus);
            urlParams.set('refund_page', 1); // reset to first page on filter change
            window.location.search = urlParams.toString();
        });

        // Tab switching - preserve pagination and filter state
        function showTab(tabId) {
            // Hide all tab contents
            var tabContents = document.getElementsByClassName('tab-content');
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = 'none';
            }

            // Remove 'active' class from all tab buttons
            var tabButtons = document.getElementsByClassName('tab-button');
            for (var i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove('active');
            }

            const buttonId = tabId + "-button";
            const tabbutton = document.getElementById(buttonId);

            // Show the selected tab content
            document.getElementById(tabId).style.display = 'block';

            // Add 'active' class to the clicked tab button
            tabbutton.classList.add('active');
            
            // Update URL to reflect current tab without reloading
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('tab', tabId);
            history.replaceState(null, null, '?' + urlParams.toString());
        }

        // On page load, check if a specific tab was requested
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const requestedTab = urlParams.get('tab');
            
            if (requestedTab && (requestedTab === 'new-add' || requestedTab === 'refund-req')) {
                showTab(requestedTab);
            } else {
                showTab('new-add'); // Default to first tab
            }
        });

        // Select elements
        const addButton = document.querySelector('.add-bttn');
        const modal = document.querySelector('#add-modal');
        const closeModalButton = document.querySelector('.close-modal');


        // Show modal
        addButton.addEventListener('click', () => {
            modal.classList.add('active');
        });


        // Hide modal
        closeModalButton.addEventListener('click', () => {
            modal.classList.remove('active');
        });


        // Close modal when clicking on the overlay
        modal.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                modal.classList.remove('active');
            }
        });

    document.addEventListener("DOMContentLoaded", function () {

    const selectAllCheckbox = document.getElementById("select-all-checkbox");
    const checkboxes = document.querySelectorAll(".payroll-checkbox");

    selectAllCheckbox.addEventListener("change", function () {
        checkboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
    });

    const settleBtn = document.getElementById("settle-selected");

    settleBtn.addEventListener("click", function () {
            const selected = Array.from(checkboxes)
                .filter(cb => cb.checked)
                .map(cb => cb.value);

                console.log(selected);

            if (selected.length === 0) {
                alert("Please select at least one payroll to settle.");
                return;
            }

            fetch('<?= ROOT ?>/Admin/settleAllPayrolls', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ payrollIds: selected })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    console.log("successs");
                    location.reload();
                } else {
                    alert("Error settling payrolls.");
                }
            })
            .catch(err => console.error(err));
        });
    });

    </script>

</body>
</html>