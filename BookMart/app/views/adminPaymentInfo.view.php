<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminsearch.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminAdd.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/systemStats.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Payment Information</title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php';?>
    <!-- navBar division end -->
     
    <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->

    <div class="container">
        <div class="box">
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'superAdmin'): ?>
            <div class="add-toolbar">
                <a href="<?= ROOT ?>/adminSystemStat" class="add-bttn" id="show-stats-btn" style="text-decoration:none;" >
                    <span class="compose-icon"><i class="fa-solid fa-plus"></i></span>System statistics
                </a>
            </div>
        <?php endif; ?>


        <h2>Payment Information</h2>

            <div class="table-container">
                <?php if (!empty($payment) && is_array($payment)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Customer Name</th>
                                <th>Seller Or Store Name</th>
                                <th>Transaction Id</th>
                                <th>Payment Date</th>
                                <th>Payment Amount</th>
                                <th>Payment Gateway</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payment as $paymentItem) : ?>
                                <tr class="book-row" 
                                    data-paymentid="<?= $paymentItem->payment_id ?? 'N/A' ?>" 
                                    data-booktitle="<?= htmlspecialchars($paymentItem->title ?? 'N/A') ?>"
                                    data-customername="<?= htmlspecialchars($paymentItem->buyer_name ?? 'N/A') ?>"
                                    data-sellername="<?= htmlspecialchars($paymentItem->seller_name ?? 'N/A') ?>"
                                    data-transactionid="<?= htmlspecialchars($paymentItem->transaction_id ?? 'N/A') ?>"
                                    data-paymentdate="<?= htmlspecialchars($paymentItem->payment_date ?? 'N/A') ?>"
                                    data-paymentamount="<?= htmlspecialchars($paymentItem->payment_amount ?? 'N/A') ?>"
                                    data-paymentgateway="<?= htmlspecialchars($paymentItem->payment_gateway ?? 'N/A') ?>"
                                    data-type="<?= htmlspecialchars($paymentItem->type ?? 'N/A') ?>"
                                    >
                                    <td><?= htmlspecialchars($paymentItem->title ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($paymentItem->buyer_name ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($paymentItem->seller_name ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($paymentItem->transaction_id ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($paymentItem->payment_date ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($paymentItem->payment_amount ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($paymentItem->payment_gateway ?? 'N/A') ?></td>
                                    <td><?= htmlspecialchars($paymentItem->type ?? 'N/A') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div class="no-book-message">
                        <p>No payment info found.</p>
                    </div>
                <?php endif; ?>    
            </div><br><br><br>

            <!-- Pagination -->
            <?php if($totalPages > 1): ?>
                <div class="pagination">
                    <?php if($currentPage > 1): ?>
                        <a href="?page=<?= $currentPage - 1 ?><?= !empty($selected_role) ? '&role=' . urlencode($selected_role) : '' ?>" class="pagination-btn">&laquo; Previous</a>
                    <?php endif; ?>
                    
                    <?php for($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?><?= !empty($selected_role) ? '&role=' . urlencode($selected_role) : '' ?>" 
                        class="pagination-btn <?= $i === $currentPage ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if($currentPage < $totalPages): ?>
                        <a href="?page=<?= $currentPage + 1 ?><?= !empty($selected_role) ? '&role=' . urlencode($selected_role) : '' ?>" class="pagination-btn">Next &raquo;</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <br><br>

    
    <script src="<?= ROOT ?>/assets/JS/adminsearch.js"></script>
</body>
</html>