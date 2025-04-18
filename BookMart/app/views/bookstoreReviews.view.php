<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreReviews.css">
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
            <li><a href="<?= ROOT ?>/BookstoreController/inventory" ><i class="fa-solid fa-book"></i>My Inventory</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/Analytics"><i class="fa-solid fa-chart-column"></i>Analytics</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/orders" ><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/getReviews" class="active"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/advertisments"><i class="fa-solid fa-up-right-from-square"></i>Ads & Offers</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/coupons"><i class="fa-solid fa-ticket"></i>Coupons</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/myProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
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
        <h1 class="page-title">You Have <?= $unreadcount === 0 ? 'No' : htmlspecialchars($unreadcount) ?> New Reviews</h1>
        <?php if (!empty($reviews)): ?>
        <div class="inventory-toolbar">
            <input type="text" placeholder="Search review by book, date, content, user.. " class="inventory-search-bar">
            <div class="filter">
                <label for="status-filter">SHOW:</label>
                <select id="status-filter" class="status-filter">
                <option value="all">All</option>
                <option value="unread">New</option>
                <option value="read">Read</option>
                </select>
            </div>
        </div>
        <table class="reviews-table">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Content</th>
                    <th>Ratings</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reviews as $review): ?>
                    <tr>
                        <td><?= htmlspecialchars($review->book_title) ?></td>
                        <td><?= date('Y-m-d', strtotime($review->review_date)) ?></td>
                        <td><?= htmlspecialchars($review->buyer_name) ?></td>
                        <td><?= htmlspecialchars($review->comment) ?></td>
                        <td class="stars">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <i class="<?= $i <= $review->rating ? 'fas' : 'far' ?> fa-star"></i>
                            <?php endfor; ?>
                        </td>
                        <td>
                            <button class="reply-btn" data-user="<?= $review->buyer_id ?>">Reply</button>
                            <?php if ($review->is_read == 0 ): ?><button class="read-btn" data-review="<?= $review->id ?>">Mark as Read</button><?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
        <div class="message-div">
            No reviews found.
        </div>
            <?php endif; ?>
    </div>
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer> 
    <script src="<?= ROOT ?>/assets/JS/bookstoreHome.js"></script>
    <script>
        document.querySelectorAll('.reply-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const userId = this.getAttribute('data-user');
                window.location.href = `<?= ROOT ?>/chat/chatbox/${userId}`;
            });
        });
        document.querySelectorAll('.read-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const reviewId = this.getAttribute('data-review');
                window.location.href = `<?= ROOT ?>/BookstoreController/markAsRead/${reviewId}`;
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const searchBar = document.querySelector(".inventory-search-bar");
            const tableRows = document.querySelectorAll(".reviews-table tbody tr");

            searchBar.addEventListener("input", function () {
                const searchQuery = searchBar.value.toLowerCase();

                tableRows.forEach(row => {
                    const cells = row.querySelectorAll("td");
                    let matchFound = false;

                    const searchableColumns = [0,1,2,3];

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
    </script>
</body>
</html>