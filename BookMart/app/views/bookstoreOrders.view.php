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
    <div class="sidebar">
        <ul>
            <li><button class="add-book-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add book</button></li>
            <li><a href="<?= ROOT ?>/bookstoreInventory" ><i class="fa-solid fa-book"></i>My Inventory</a></li>
            <li><a href="<?= ROOT ?>/bookstoreAnalytics"><i class="fa-solid fa-chart-column"></i>Analytics</a></li>
            <li><a href="<?= ROOT ?>/bookstoreOrders" class="active"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/bookstoreReviews"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/bookstoreAds"><i class="fa-solid fa-up-right-from-square"></i>Ads & Offers</a></li>
            <li><a href="<?= ROOT ?>/bookstoreProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
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
                    <h3 class="accepted">24</h3>
                    <p>Accepted Orders</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon pending">
                    <i class="fas fa-clock fa-lg"></i>
                    </div>
                    <div class="stat-content">
                    <h3 class="pending">78</h3>
                    <p>Pending Orders</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon completed">
                    <i class="fas fa-check-circle fa-lg"></i>
                    </div>
                    <div class="stat-content">
                    <h3 class="completed">1861</h3>
                    <p>Completed Orders</p>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon returned">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                    </div>
                    <div class="stat-content">
                    <h3 class="returned">54</h3>
                    <p>Returned Orders</p>
                    </div>
                </div>
            </div>
            <div class="inventory-toolbar">
            <input type="text" placeholder="Search your book in the inventory" class="inventory-search-bar">
            <div class="filter">
                <label for="status-filter">SHOW:</label>
                <select id="status-filter" class="status-filter">
                <option value="all">All</option>
                <option value="pending">Pending</option>
                <option value="assigned">Assigned</option>
                <option value="done">Done</option>
                </select>
            </div>
            </div>
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="select-all"></th>
                        <th>Order ID</th>
                        <th>Date Made</th>
                        <th>Customer Name</th>
                        <th>Customer Contact No</th>
                        <th>Payment Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="select-order"></td>
                        <td>ORD12345</td>
                        <td>2024-11-01</td>
                        <td>John Smith</td>
                        <td>+94 77 123 4567</td>
                        <td>Rs.45.99</td>
                        <td class="status pending">Pending</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="select-order"></td>
                        <td>ORD12346</td>
                        <td>2024-11-03</td>
                        <td>Mary Johnson</td>
                        <td>+94 71 987 6543</td>
                        <td>Rs.32.50</td>
                        <td class="status done">Done</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="select-order"></td>
                        <td>ORD12347</td>
                        <td>2024-11-05</td>
                        <td>Michael Brown</td>
                        <td>+94 75 567 8910</td>
                        <td>Rs.78.20</td>
                        <td class="status done">Done</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" class="select-order"></td>
                        <td>ORD12348</td>
                        <td>2024-11-06</td>
                        <td>Lisa Davis</td>
                        <td>+94 76 223 4455</td>
                        <td>Rs.23.15</td>
                        <td class="status pending">Pending</td>
                    </tr>
                </tbody>
            </table>            
    </div>
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
        </footer> 
    <script src="<?= ROOT ?>/assets/JS/bookstoreHome.js"></script>
</body>
</html>