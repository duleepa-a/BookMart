<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminBookView.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Book Detail</title>
</head>
<body>
    <div class="header">
        <div class="header-wrapper">
            <div class="logo-container">
                <a href="<?= ROOT ?>/home" class="title-link">
                    <h2 class="logo">Book<span class="highlight">Mart</span></h2>
                </a>
            </div>
            <div class="page-title">
                <h1><center>Book Details</center></h1>
            </div>
        </div>
    </div>
    
    <div class="main-container">
        <div class="book-preview-card">
            <div class="book-cover">
                <?php if (!empty($book->cover_image)) : ?>
                    <img src="<?= ROOT ?>/assets/Images/book cover images/<?= htmlspecialchars($book->cover_image) ?>" 
                        alt="<?= htmlspecialchars($book->title ?? 'Book cover') ?>">
                <?php else : ?>
                    <div class="no-image">
                        <i class="book-icon">📚</i>
                        <p>No cover available</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="book-headline">
                <h2 class="book-title"><?= htmlspecialchars($book->title ?? 'Untitled Book') ?></h2>
                <p class="book-author">By <?= htmlspecialchars($book->author ?? 'Unknown Author') ?></p>
                <div class="book-price-tag">
                    <span class="price-value">Rs. <?= htmlspecialchars($book->price ?? '0.00') ?></span>
                    <?php if (!empty($book->discount) && $book->discount > 0) : ?>
                        <span class="discount-badge"><?= htmlspecialchars($book->discount ?? '0') ?>% OFF</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="book-details-container">
            <div class="tabs-container">
                <div class="tabs">
                    <button class="tab-button active" data-tab="basic">Basic Info</button>
                    <button class="tab-button" data-tab="publication">Publication</button>
                    <button class="tab-button" data-tab="inventory">Inventory</button>
                    <button class="tab-button" data-tab="description">Description</button>
                </div>
                
                <div class="tab-content active" id="basic-tab">
                    <div class="detail-grid">
                        <div class="detail-item">
                            <span class="detail-label">Book Title</span>
                            <span class="detail-value"><?= htmlspecialchars($book->title ?? '') ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Author</span>
                            <span class="detail-value"><?= htmlspecialchars($book->author ?? '') ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Publisher</span>
                            <span class="detail-value"><?= htmlspecialchars($book->publisher ?? '') ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Date Submitted</span>
                            <span class="detail-value"><?= htmlspecialchars($book->created_at ?? '') ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content" id="publication-tab">
                    <div class="detail-grid">
                        <div class="detail-item">
                            <span class="detail-label">ISBN</span>
                            <span class="detail-value"><?= htmlspecialchars($book->ISBN ?? '') ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Genre</span>
                            <span class="detail-value"><?= htmlspecialchars($book->genre ?? '') ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Language</span>
                            <span class="detail-value"><?= htmlspecialchars($book->language ?? '') ?></span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Book Condition</span>
                            <span class="detail-value"><?= htmlspecialchars($book->book_condition ?? '') ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content" id="inventory-tab">
                    <div class="inventory-stats">
                        <div class="inventory-stat">
                            <div class="stat-circle">
                                <span class="stat-number"><?= htmlspecialchars($book->quantity ?? '0') ?></span>
                            </div>
                            <span class="stat-label">In Stock</span>
                        </div>
                        
                        <div class="inventory-stat">
                            <div class="stat-circle price-circle">
                                <span class="stat-number"  style="font-size: 15px;">Rs. <?= htmlspecialchars($book->price ?? '0.00') ?></span>
                            </div>
                            <span class="stat-label">Unit Price</span>
                        </div>
                        
                        <div class="inventory-stat">
                            <div class="stat-circle discount-circle">
                                <span class="stat-number"><?= htmlspecialchars($book->discount ?? '0') ?>%</span>
                            </div>
                            <span class="stat-label">Discount</span>
                        </div>
                    </div>
                </div>
                
                <div class="tab-content" id="description-tab">
                    <div class="book-description">
                        <?php if (!empty($book->description)) : ?>
                            <p><?= htmlspecialchars($book->description) ?></p>
                        <?php else : ?>
                            <p class="no-description">No description available for this book.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="action-buttons">
            <form action="<?= ROOT ?>/AdminBookView/deleteBook" method="POST" style="display:inline" id="delete-form">
                <input type="hidden" name="book_id" value="<?= $book->id ?>">
                <button type="button" id="deleteBtn" class="delete-btn"> Delete</button>
            </form>
            <button onclick="window.location.href='<?= ROOT ?>/AdminSearchbooks'" class="close-btn"> Back to Search</button>
        </div>

        <!-- Delete Modal -->
        <div class="modal" id="delete-book-modal">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Delete Book</h2>
                    <button type="button" class="close-modal-x">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="warning-message">Are you sure you want to delete this book?</p>
                    <p class="warning-book-title">"<?= htmlspecialchars($book->title ?? 'This book') ?>"</p>
                    <p class="warning-sub">This action cannot be undone.</p>
                </div>
                <form class="delete-book-form" method="POST" action="<?= ROOT ?>/AdminBookView/deleteBook">
                    <input type="hidden" id="delete-book-id" name="book_id" value="<?= $book->id ?>">
                    <div class="modal-actions">
                        <button type="button" class="cancel-btn close-modal">Cancel</button>
                        <button type="button" class="confirm-delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

 <!-- Success Message -->
 <div id="successMessage">
    <div class="dialog-content">
        <h3>Success!</h3>
        <p>Book deleted successfully.</p>
    </div>
</div>

<script src="<?= ROOT ?>/assets/JS/adminViewusers.js"></script>

<script>
    // Tab switching functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                this.classList.add('active');
                const tabId = this.getAttribute('data-tab') + '-tab';
                document.getElementById(tabId).classList.add('active');
            });
        });
        
        
        
    });
    
    document.addEventListener('DOMContentLoaded', function() {
    
        // Fix delete functionality
        const deleteBtn = document.getElementById('deleteBtn');
        const modal = document.getElementById('delete-book-modal');
        const cancelBtn = document.querySelector('.cancel-btn');
        const closeModalX = document.querySelector('.close-modal-x');
        const confirmDeleteBtn = document.querySelector('.confirm-delete');
        const deleteForm = document.getElementById('delete-form');
        const successMessage = document.getElementById('successMessage');
        
        // Open modal when clicking Delete button
        if (deleteBtn) {
            deleteBtn.addEventListener('click', function(e) {
                e.preventDefault();
                modal.classList.add('active');
            });
        }
        
        // Close modal with cancel button
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function() {
                modal.classList.remove('active');
            });
        }
        
        // Close modal with X button
        if (closeModalX) {
            closeModalX.addEventListener('click', function() {
                modal.classList.remove('active');
            });
        }
        
        // Close when clicking outside modal
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.classList.remove('active');
            }
        });
        // Handle delete confirmation
        document.querySelector('.modal-actions').addEventListener('click', function(e) {
            if (e.target.classList.contains('confirm-delete') || e.target.innerText === 'Delete') {
                e.preventDefault();
                modal.classList.remove('active');

                successMessage.style.display = 'block';

                setTimeout(function() {
                    document.getElementById('delete-form').submit();
                }, 1500);
            }
            
        });


    });

</script>
</body>
</html>