<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminsearch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Search Orders</title>
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
            <form action="<?= ROOT ?>/adminSearchorders" method="GET">
                <div class="search-row">
                    <h1>Orders</h1>
                    <div class="search-container">
                        <input type="text" name="search" placeholder="Search by title, Customer name, or seller/store" id="searchOrderInput">
                        <button type="submit">
                            <i class="fa fa-search"></i> 
                        </button>
                    </div>
                    <select class="sort-by" id="statusFilter" onchange="filterByStatus()">
                        <option value="">Order Status</option>
                        <option value="pending" <?= $data['selected_status'] == 'pending' ? 'selected' : '' ?>>pending</option>
                        <option value="shipping" <?= $data['selected_status'] == 'shipping' ? 'selected' : '' ?>>shipping</option>
                        <option value="completed" <?= $data['selected_status'] == 'completed' ? 'selected' : '' ?>>completed</option>
                        <option value="reviewed" <?= $data['selected_status'] == 'reviewed' ? 'selected' : '' ?>>reviewed</option>
                        <option value="canceled" <?= $data['selected_status'] == 'canceled' ? 'selected' : '' ?>>canceled</option>
                    </select>
                    <?php if (isset($_GET['page'])): ?>
                        <input type="hidden" name="page" value="<?= (int)$_GET['page'] ?>">
                    <?php endif; ?>
                </div>
            </form>

            <div class="table-container">
            <?php if (!empty($order) && is_array($order)) : ?>
                <table class="table">
                <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Customer Name</th>
                            <th>Book store/Seller</th>
                            <th>Date Placed</th>
                            <th>Payment Amount</th>
                            <th>Quanitity</th>
                            <th>Order_status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order as $order) : ?>
                            <tr class="order-row" 
                                data-orderid="<?= $order->order_id ?>" 
                                data-booktitle="<?= htmlspecialchars($order->title) ?>"
                                data-customer="<?= htmlspecialchars($order->full_name) ?>"
                                data-bookshop="<?= htmlspecialchars($order->publisher) ?>"
                                data-bookprice="<?= htmlspecialchars($order->price) ?>"
                                data-bookquantity="<?= htmlspecialchars($order->quanitity) ?>"
                                onclick="window.location.href='<?= ROOT ?>/adminOrderView?order_id=<?= $order->order_id ?>'">

                                <td class='title'><?= htmlspecialchars($order->title) ?></td>
                                <td class='name'><?= htmlspecialchars($order->full_name) ?></td>
                                <td class='store'><?= htmlspecialchars($order->publisher) ?></td>
                                <td><?= htmlspecialchars($order->created_on) ?></td>
                                <td><?= htmlspecialchars($order->total_amount) ?></td>
                                <td><?= htmlspecialchars($order->quanitity) ?></a></td>
                                <td><?= htmlspecialchars($order->order_status) ?></td>

                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
                <?php else : ?>
                        <div class="no-order-message">
                            <p>No orders found.</p>
                        </div>
                    <?php endif; ?>    
            </div><br><br><br>

            <!-- Pagination -->
            <?php if(isset($totalPages) && $totalPages > 1): ?>
            <div class="pagination">
                <?php if($currentPage > 1): ?>
                    <a href="?page=<?= $currentPage - 1 ?><?= !empty($searchQuery) ? '&search=' . urlencode($searchQuery) : '' ?><?= !empty($sort) ? '&sort=' . urlencode($sort) : '' ?>" class="pagination-btn">&laquo; Previous</a>
                <?php endif; ?>
                
                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="?page=<?= $i ?><?= !empty($searchQuery) ? '&search=' . urlencode($searchQuery) : '' ?><?= !empty($sort) ? '&sort=' . urlencode($sort) : '' ?>" 
                    class="pagination-btn <?= $i === $currentPage ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
                
                <?php if($currentPage < $totalPages): ?>
                    <a href="?page=<?= $currentPage + 1 ?><?= !empty($searchQuery) ? '&search=' . urlencode($searchQuery) : '' ?><?= !empty($sort) ? '&sort=' . urlencode($sort) : '' ?>" class="pagination-btn">Next &raquo;</a>
                <?php endif; ?>
            </div>
            <?php endif; ?>


        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('searchOrderInput').addEventListener('keyup', function () {
                const searchValue = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('.table tbody tr');

                tableRows.forEach(row => {
                    const title = row.querySelector('.title')?.textContent.toLowerCase() || '';
                    const name = row.querySelector('.name')?.textContent.toLowerCase() || '';
                    const store = row.querySelector('.store')?.textContent.toLowerCase() || '';

                    const match = title.includes(searchValue) || name.includes(searchValue) || store.includes(searchValue);
                    row.style.display = match ? '' : 'none';
                });
            });
        });
    </script>

    <script src="<?= ROOT ?>/assets/JS/adminsearch.js"></script>

</body>
</html>