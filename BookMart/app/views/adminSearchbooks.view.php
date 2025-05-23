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
    <title>Search Books</title>
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
            <form action="<?= ROOT ?>/adminSearchbooks" method="GET">
                <div class="search-row">
                    <h1>Books</h1>
                    <div class="search-container">
                        <input type="text" name="search" placeholder="Search by title, author, or store/seller" id="searchBookInput">
                        <button type="submit">
                            <i class="fa fa-search"></i> 
                        </button>
                    </div>
                </div>
            </form>


            <div class="table-container">
            <?php if (!empty($book) && is_array($book)) : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Author</th>
                            <th>ISBN</th>
                            <th>Book store/Seller</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($book as $book) : ?>
                            <tr class="book-row" 
                                data-bookid="<?= $book->id ?>" 
                                data-booktitle="<?= htmlspecialchars($book->title) ?>"
                                data-bookauthor="<?= htmlspecialchars($book->author) ?>"
                                data-bookisbn="<?= htmlspecialchars($book->ISBN) ?>"
                                data-bookshop="<?= htmlspecialchars($book->publisher) ?>"
                                data-bookprice="<?= htmlspecialchars($book->price) ?>"
                                data-bookquantity="<?= htmlspecialchars($book->quantity) ?>"
                                onclick="window.location.href='<?= ROOT ?>/adminBookView?book_id=<?= $book->id ?>'">

                                <td class='title'><?= htmlspecialchars($book->title) ?></td>
                                <td class='author'><?= htmlspecialchars($book->author) ?></td>
                                <td><?= htmlspecialchars($book->ISBN) ?></td>
                                <td class='store'><?= htmlspecialchars($book->publisher) ?></td>
                                <td><?= htmlspecialchars($book->price) ?></td>
                                <td><?= htmlspecialchars($book->quantity) ?></a></td>
                                
                        </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
                <?php else : ?>
                        <div class="no-book-message">
                            <p>No books found.</p>
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
            document.getElementById('searchBookInput').addEventListener('keyup', function () {
                const searchValue = this.value.toLowerCase();
                const tableRows = document.querySelectorAll('.table tbody tr');

                tableRows.forEach(row => {
                    const title = row.querySelector('.title')?.textContent.toLowerCase() || '';
                    const author = row.querySelector('.author')?.textContent.toLowerCase() || '';
                    const store = row.querySelector('.store')?.textContent.toLowerCase() || '';

                    const match = title.includes(searchValue) || author.includes(searchValue) || store.includes(searchValue);
                    row.style.display = match ? '' : 'none';
                });
            });
        });
    </script>

    <script src="<?= ROOT ?>/assets/JS/adminsearch.js"></script>

</body>
</html>