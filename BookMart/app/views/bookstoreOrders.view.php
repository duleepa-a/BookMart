<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreInventory.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>        
    <!-- navBar division end -->
     <!-- sideBar division begin -->
     <?php include 'commonSidebar.view.php'; ?>        
    <!-- sideBar division end -->
    <div class="container">
    <div id="add-book-modal"class="modal hidden">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="add-book-form" method="POST" action="<?= ROOT ?>/book/addBook" enctype="multipart/form-data">
                    <h2 class="full-width">Add Book</h2>

                    <!-- Title -->
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required>
                    </div>

                    <!-- ISBN -->
                    <div>
                        <label for="ISBN">ISBN:</label>
                        <input type="text" id="ISBN" name="ISBN" required>
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" required>
                    </div>

                    <!-- Genre -->
                    <div>
                        <label for="genre">Genre:</label>
                        <select id="genre" name="genre" required>
                        <option value="">-- Select Genre --</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="mystery">Mystery</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="science-fiction">Science Fiction</option>
                        <option value="biography">Biography</option>
                        <option value="history">History</option>
                        <option value="children">Children</option>
                        <option value="romance">Romance</option>
                        </select>
                    </div>

                    <!-- Publisher -->
                    <div>
                        <label for="publisher">Publisher:</label>
                        <input type="text" id="publisher" name="publisher" required>
                    </div>

                    <!-- Cover Image -->
                    <div>
                        <label for="cover_image">Cover Image:</label>
                        <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" step="0.01" min="0.01" required>
                    </div>

                    <!-- Discount -->
                    <div>
                        <label for="discount">Discount (%):</label>
                        <input type="number" id="discount" name="discount" step="0.01" min="0" max="100">
                    </div>

                    <!-- Quantity -->
                    <div>
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" required>
                    </div>

                    <!-- Condition -->
                    <div>
                        <label for="book_condition">Condition:</label>
                        <select id="book_condition" name="book_condition" required>
                        <option value="new">New</option>
                        <option value="like-new">Like New</option>
                        <option value="good">Good</option>
                        <option value="acceptable">Acceptable</option>
                        <option value="poor">Poor</option>
                        </select>
                    </div>

                    <!-- Language -->
                    <div>
                        <label for="language">Language:</label>
                        <select id="language" name="language" required>
                        <option value="english">English</option>
                        <option value="sinhala">Sinhala</option>
                        <option value="tamil">Tamil</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="full-width">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-actions">
                        <button type="submit">Add</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
            <div class="order-stats-container">
                <div class="stat-card">
                    <div class="stat-icon accepted">
                    <i class="fas fa-box-open fa-lg"></i>
                    </div>
                    <div class="stat-content">
                    <h3 class="accepted"><?= htmlspecialchars($count['shipping']) ?></h3>
                    <p>Shipping Orders</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon pending">
                    <i class="fas fa-clock fa-lg"></i>
                    </div>
                    <div class="stat-content">
                    <h3 class="pending"><?= htmlspecialchars($count['pending']) ?></h3>
                    <p>Pending Orders</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon completed">
                    <i class="fas fa-check-circle fa-lg"></i>
                    </div>
                    <div class="stat-content">
                    <h3 class="completed"><?= htmlspecialchars($count['completed']) ?></h3>
                    <p>Completed Orders</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon returned">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    </div>
                    <div class="stat-content">
                    <h3 class="returned"><?= htmlspecialchars($count['canceled'] )?></h3>
                    <p>Returned Orders</p>
                    </div>
                </div>
            </div>
            <div class="inventory-toolbar">
                <input type="text" placeholder="Search orders by title, customer, status..." class="inventory-search-bar">
                <div class="filter">
                    <label for="status-filter">SHOW:</label>
                    <select id="status-filter" class="status-filter">
                        <option value="all" <?= $filterStatus === 'all' ? 'selected' : '' ?>>All</option>
                        <option value="pending" <?= $filterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="shipping" <?= $filterStatus === 'shipping' ? 'selected' : '' ?>>Shipping</option>
                        <option value="canceled" <?= $filterStatus === 'canceled' ? 'selected' : '' ?>>Cancelled</option>
                        <option value="completed" <?= $filterStatus === 'completed' ? 'selected' : '' ?>>Completed</option>
                        <option value="reviewed" <?= $filterStatus === 'reviewed' ? 'selected' : '' ?>>Reviewed</option>
                    </select>
                </div>
               <div class="pagination">
                <!-- Previous Arrow -->
                <div class="pagination-item pagination-arrow <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=<?= $currentPage - 1 ?>">
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
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == 1 || $i == $totalPages || abs($i - $currentPage) <= 1): ?>
                        <div class="pagination-item pagination-number <?= $currentPage == $i ? 'active' : '' ?>">
                            <a href="?page=<?= $i ?>" style="color: inherit; text-decoration: none; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                <?= $i ?>
                            </a>
                        </div>
                    <?php elseif ($i == 2 && $currentPage > 3 || $i == $totalPages - 1 && $currentPage < $totalPages - 2): ?>
                        <div class="pagination-item pagination-dots">...</div>
                    <?php endif; ?>
                <?php endfor; ?>

                <!-- Next Arrow -->
                <div class="pagination-item pagination-arrow <?= $currentPage >= $totalPages ? 'disabled' : '' ?>">
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=<?= $currentPage + 1 ?>">
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
            <?php if (!empty($orders)): ?>
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th>Book Title</th>
                        <th>Date Made</th>
                        <th>Customer Name</th>
                        <th>Shipping Address</th>
                        <th>Contact No</th>
                        <th>Shipped Date</th>
                        <th>Completed Date</th>
                        <th>Payment Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr class="order-row" data-orderid="<?= $order->order_id ?>"
                            >
                                <td><?= htmlspecialchars($order->book->title) ?></td>
                                <td><?= date('Y-m-d', strtotime($order->created_on)) ?></td>
                                <td><?= htmlspecialchars($order->buyer_name) ?></td>
                                <td><?= htmlspecialchars($order->shipping_address) ?></td>
                                <td><?= htmlspecialchars($order->buyer_contact) ?></td>
                                <td class ="<?= $order->shipped_date ? : 'not-yet'  ?>"><?= $order->shipped_date ? date('Y-m-d', strtotime($order->shipped_date)) : 'not shipped yet' ?></td>
                                <td class ="<?= $order->completed_date ? : 'not-yet'  ?>"><?= $order->completed_date ? date('Y-m-d', strtotime($order->completed_date)) : 'not completed yet' ?></td>
                                <td>Rs. <?= number_format($order->total_amount, 2) ?></td>
                                <?php if($order->order_status == 'pending' && !empty($order->courier_id)){
                                        $order->order_status = "courier assigned";
                                    }
                                    switch($order->order_status){
                                        case 'pending' :
                                            $order->class = "tag-yellow";
                                            break;
                                        case 'shipping' :
                                            $order->class = "tag-orange";
                                            break;
                                        case 'canceled' :
                                            $order->class = "tag-red";
                                            break;
                                        case 'courier assigned' :
                                            $order->class = "tag-blue";
                                            break;
                                        case 'completed' :
                                            $order-> class = "tag-green";
                                            break;
                                        case 'reviewed' :
                                            $order-> class = "tag-green";
                                            break;
                                        default :
                                            $order->class = "tag-yellow";
                                            break;
                                    }
                                    ?>
                                <td>
                                    <span class="tag <?= $order->class?>"><?= ($order->order_status) ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </tbody>
            </table>
            <?php else: ?>
                        <div class="message-div">No orders found.</div>
            <?php endif; ?>            
    </div>
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
        </footer> 
    <script src="<?= ROOT ?>/assets/JS/bookstoreHome.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchBar = document.querySelector(".inventory-search-bar");
            const tableRows = document.querySelectorAll(".inventory-table tbody tr");

            searchBar.addEventListener("input", function () {
                const searchQuery = searchBar.value.toLowerCase();

                tableRows.forEach(row => {
                    const cells = row.querySelectorAll("td");
                    let matchFound = false;

                    // Check relevant cells: Book Title, Customer Name, Shipping Address, Contact No, Shipped Date, Completed Date, Status
                    const searchableColumns = [0,1,2,3,4,7,8];

                    searchableColumns.forEach(index => {
                        const cellText = cells[index]?.textContent.toLowerCase();
                        if (cellText && cellText.includes(searchQuery)) {
                            matchFound = true;
                        }
                    });

                    row.style.display = matchFound ? "" : "none";
                });
            });
        });

        document.querySelector(".inventory-table").addEventListener("click", (e) => {
            const row = e.target.closest(".order-row");
            const orderId = row.dataset.orderid;

            window.location.href = '<?=ROOT?>/BookstoreController/orderView/' + orderId; 
        });
        const statusFilter = document.getElementById('status-filter');
        statusFilter.addEventListener('change', () => {
            const selectedStatus = statusFilter.value;
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('status', selectedStatus);
            urlParams.set('page', 1); // reset to first page on filter change
            window.location.search = urlParams.toString();
        });
    </script>
</body>
</html>