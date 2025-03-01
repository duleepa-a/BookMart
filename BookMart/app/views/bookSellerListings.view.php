<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerListings.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>My Listings</title> 
</head>

<body>
    
    <!-- navBar division begin -->
    <?php include 'bookSellerNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- navBar division begin -->
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <br><br>
    <center>
    <div class="background-box">    <!-- inner background box begin -->        
        <h1 class="title-text">My Listings</h1>

        <br><br>

        <div class="controls">      <!-- First row division begin -->
            <input type="text" placeholder="Search..." class="search-bar">
            <button>Search</button>
        </div>                      <!-- First row division end -->

        <div class="controls">
            <button class="select-all-button">Select All</button>
            <button class="edit-button" disabled>Edit</button>
            <button>Update Status</button>
            <button class="delete-button" disabled>Delete</button>
            <button>Filter</button>
            <button>Sort</button>
        </div>                      <!-- Button row division end -->

        <?php if (!empty($inventory)) : ?>
            <table class="inventory-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="select-all-checkbox"></th>
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
                            data-ISBN="<?= htmlspecialchars($book->ISBN) ?>"
                            data-author="<?= htmlspecialchars($book->author) ?>"
                            data-genre="<?= htmlspecialchars($book->genre ?? '') ?>"
                            data-publisher="<?= htmlspecialchars($book->publisher ?? '') ?>"
                            data-condition="<?= htmlspecialchars($book->book_condition ?? '') ?>"
                            data-language="<?= htmlspecialchars($book->language ?? '') ?>"
                            data-price="<?= htmlspecialchars($book->price) ?>"
                            data-discount="<?= htmlspecialchars($book->discount) ?>"
                            data-quantity="<?= htmlspecialchars($book->quantity ?? 0) ?>"
                            data-description="<?= htmlspecialchars($book->description) ?>">
                            <td><input type="checkbox" class="book-checkbox"></td>
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
                            <td class="status <?= (isset($book->quantity) && $book->quantity > 0) ? 'active' : 'out-of-stock' ?>">
                                <?= (isset($book->quantity) && $book->quantity > 0) ? 'Available' : 'Out of Stock' ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="no-books-message">
                <p>No books listed. Start adding books to your collection!</p>
            </div>
        <?php endif; ?>

        <div class="modal" id="update-book-modal">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="update-book-form" method="POST" action="<?= ROOT ?>/bookSellerListings/updateBook" enctype="multipart/form-data">
                    <h2>Update Book</h2>
                    <input type="hidden" id="update-book-id" name="book_id">
                    <div>
                        <label for="update-title">Title:</label>
                        <input type="text" id="update-title" name="title" required>
                    </div>
                    <div>
                        <label for="ISBN">ISBN:</label>
                        <input type="text" id="update-isbn" name="ISBN" required>
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
                        <select id="update-condition" name="book_condition" required>
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

                    <div class="full-width">
                        <label for="description">Description:</label>
                        <textarea id="update-description" name="description" rows="4" required></textarea>
                    </div>
                    <div class="modal-actions">
                        <button type="submit" class="update-button">Update</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    
        <div class="modal" id="delete-book-modal">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="delete-book-form" method="POST" action="<?= ROOT ?>/bookSellerListings/deleteBook">
                    <h2>Confirm Deletion</h2>
                    <input type="hidden" id="delete-book-ids" name="book_id">
                    
                    <div class="delete-confirmation-message">
                        <p>Are you sure you want to delete the following books?</p>
                        <div id="books-to-delete-list"></div>
                    </div>

                    <div class="modal-actions">
                        <button type="submit" class="delete-confirm-button">Delete</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>                        <!-- inner background box end -->

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->

    <script src="<?= ROOT ?>/assets/JS/bookSellerlistings.js"></script>

</body>
