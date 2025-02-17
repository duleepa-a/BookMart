<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerSales.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>My Sales</title> 
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
        <h1 class="title-text">My Sales</h1>

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
                            data-isbn="<?= htmlspecialchars($book->ISBN) ?>"
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
                <p>No books to display!</p>
            </div>
        <?php endif; ?>

    </div>                          <!-- inner background box end -->

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->

    <script src="<?= ROOT?>/assets/JS/bookSellerSales.js"></script>

</body>
