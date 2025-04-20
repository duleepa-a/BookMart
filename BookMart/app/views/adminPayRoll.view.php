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
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers"  ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminViewContactUs"><i class="fa-solid fa-envelope"></i>Inquiries</a></li>
            <li><a href="<?= ROOT ?>/adminViewCourierComplains"><i class="fa-solid fa-circle-exclamation"></i>Complains</a></li>
            <li><a href="<?= ROOT ?>/admin/payRolls" class="active"><i class="fa-solid fa-money-bill"></i>Payrolls</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment" ><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    
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
            <div class="tab-content" id="new-add" >
            
                    <div class="add-toolbar">
                        <button class="add-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add Refund</button>
                        <input type="text" placeholder="Search payroll" class="add-search-bar">
                        <button class="sort-button">Sort by <i class="fa-solid fa-sort-down "></i></button>
                    </div>
                
                    <!-- Retrieve Advertisements -->
                    <?php if (!empty($payrolls)) : ?>
                        <table class="add-table">
                            <thead>
                                <tr>
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

                    <!-- No payrolls message -->
                    <?php else : ?>
                        <div class="no-add-message">
                            <p>No payroll records found.</p>
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
    <script>
        const ROOT = "<?= ROOT ?>";
        document.querySelectorAll('.resolve-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const Id = this.getAttribute('data-payroll');
                window.location.href = `<?= ROOT ?>/admin/markAsResolve/${Id}`;
            });
        });
    </script>
    <script src="<?= ROOT ?>/assets/JS/addAdd.js"></script>

</body>
</html>