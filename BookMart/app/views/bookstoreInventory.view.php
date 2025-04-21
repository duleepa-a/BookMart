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
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/inventory" class="active" ><i class="fa-solid fa-book"></i>My Inventory</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/Analytics"><i class="fa-solid fa-chart-column"></i>Analytics</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/orders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/getReviews"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/advertisments"><i class="fa-solid fa-up-right-from-square"></i>Ads & Offers</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/coupons"><i class="fa-solid fa-ticket"></i>Coupons</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/payRolls" ><i class="fa-solid fa-money-bill"></i>Payrolls</a></li>
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
        <div class="inventory-title ">
            <div class="Heading">
                <h1>Manage Your Inventory</h1>
                <span class="sub-heading">View, update, and organize your current book listings.</span>
            </div>
        </div>
        <div class="inventory-toolbar">
            <input type="text" placeholder="Search your book in the inventory" class="inventory-search-bar">
            <div class="filter">
                <label for="status-filter">SHOW:</label>
                <select id="status-filter" class="status-filter">
                    <option value="all">All</option>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
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
        <div class="action-buttons" style="display:none;">
            <button class="add-discount">Add Discount</button>
            <button class="update-status">Update Status</button>
            <button class="remove-button">Remove</button>
        </div>
        <?php if (!empty($inventory)) : ?>
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>Book Cover</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Publisher</th>
                        <th>Condition</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventory as $book) : ?>
                        <tr class="book-row" 
                            data-book_id="<?= $book->id ?>" 
                            data-title="<?= htmlspecialchars($book->title) ?>"
                            data-isbn="<?= htmlspecialchars($book->ISBN) ?>" 
                            data-author="<?= htmlspecialchars($book->author) ?>" 
                            data-genre="<?= htmlspecialchars($book->genre ?? '') ?>" 
                            data-publisher="<?= htmlspecialchars($book->publisher ?? '') ?>" 
                            data-condition="<?= htmlspecialchars($book->book_condition ?? '') ?>" 
                            data-language="<?= htmlspecialchars($book->language ?? '') ?>" 
                            data-price="<?= htmlspecialchars($book->price) ?>"
                            data-discount="<?= htmlspecialchars($book->discount) ?>" 
                            data-quantity="<?= htmlspecialchars($book->quantity ?? 0) ?>"
                            data-book_condition="<?= htmlspecialchars($book->book_condition) ?>"
                            data-description="<?= $book->description?>" 
                            >
                            <td><input type="checkbox"></td>
                            <td>
                                <?php if (!empty($book->cover_image)) : ?>
                                    <div class="book-cover">
                                        <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($book->cover_image) ?>" alt="Book Cover" class="book-cover-img" />
                                    </div>
                                <?php else : ?>
                                    <div class="book-cover placeholder"></div>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($book->title) ?></td>
                            <td><?= htmlspecialchars($book->author) ?></td>
                            <td><?= htmlspecialchars($book->genre ?? 'N/A') ?></td>
                            <td><?= htmlspecialchars($book->publisher ?? 'N/A') ?></td>
                            <td><?= htmlspecialchars($book->book_condition ?? 'N/A') ?></td>
                            <td>Rs. <?= htmlspecialchars($book->price) ?></td>
                            <td><?= htmlspecialchars($book->quantity ?? '0') ?></td>
                            <td>
                              <span class="tag <?= (isset($book->quantity) && $book->quantity > 0) ? 'tag-green' : 'tag-red' ?>">  
                                <?= (isset($book->quantity) && $book->quantity > 0) ? 'Available' : 'Out of Stock' ?> <span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="message-div">
                <p>No books found in your inventory. Start adding books to your collection!</p>
            </div>
        <?php endif; ?>
        <div class="modal" id="update-book-modal">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="update-book-form" method="POST" action="<?= ROOT ?>/book/updateBook" enctype="multipart/form-data">
                    <h2 class="full-width">Update Book</h2>
                    <!-- Fields for the update form -->
                    <input type="hidden" id="update-book-id" name="book_id">
                    <div>
                        <label for="update-title">Title:</label>
                        <input type="text" id="update-title" name="title" required>
                    </div>
                    <div>
                        <label for="ISBN">ISBN:</label>
                        <input type="text" id="update-ISBN" name="ISBN" required>
                    </div>
                    <div>
                        <label for="update-author">Author:</label>
                        <input type="text" id="update-author" name="author" required>
                    </div>
                    <div>
                        <label for="update-genre">Genre:</label>
                        <select id="update-genre" name="genre" required>
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
                    <div>
                        <label for="update-publisher">Publisher:</label>
                        <input type="text" id="update-publisher" name="publisher" required>
                    </div>
                    <div>
                        <label for="cover_image">Cover Image:</label>
                        <input type="file" id="update-cover_image" name="cover_image" accept="image/*">
                    </div>
                    <div>
                        <label for="update-price">Price:</label>
                        <input type="number" id="update-price" name="price" step="0.01" min="0.01" required>
                    </div>
                    <div>
                        <label for="discount">Discount (%):</label>
                        <input type="number" id="update-discount" name="discount" step="0.01" min="0" max="100">
                    </div>
                    <div>
                        <label for="update-quantity">Quantity:</label>
                        <input type="number" id="update-quantity" name="quantity" min="0" required>
                    </div>
                    <div>
                        <label for="book_condition">Condition:</label>
                        <select id="update-book_condition" name="book_condition" required>
                        <option value="new">New</option>
                        <option value="like-new">Like New</option>
                        <option value="good">Good</option>
                        <option value="acceptable">Acceptable</option>
                        <option value="poor">Poor</option>
                        </select>
                    </div>
                    <div>
                        <label for="language">Language:</label>
                        <select id="update-language" name="language" required>
                        <option value="English">English</option>
                        <option value="Sinhala">Sinhala</option>
                        <option value="Tamil">Tamil</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="full-width">
                        <label for="description">Description:</label>
                        <textarea id="update-description" name="description" rows="4" required></textarea>
                    </div>
                    <div class="modal-actions">
                        <button type="submit">Update</button>
                        <button type="button" class="delete-modal">Delete</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="modal" id="delete-book-modal">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="delete-book-form" method="POST" action="<?= ROOT ?>/book/deleteBook">
                    <h2 class="full-width">Delete Book</h2>
                    <p>Are you sure you want to delete this book?</p>
                    <p id="delete-book-details"></p> <!-- For displaying book details -->
                    <input type="hidden" id="delete-book-id" name="book_id">
                    <div class="modal-actions">
                        <button type="submit" class="delete-modal">Delete</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!-- footer begin -->
     <?php include 'smallFooter.view.php'; ?>   
    <!-- footer end -->     
    <script src="<?= ROOT ?>/assets/JS/bookstoreInventory.js"></script>
</body>
</html>