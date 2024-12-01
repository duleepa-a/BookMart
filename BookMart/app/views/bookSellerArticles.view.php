<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerArticles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Articles - BookMart</title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'bookSellerNavBar.view.php'; ?>
    <!-- navBar division end -->
    
    <br><br>
    <center>
    <div class="background-box">
        <h1 class="title-text">Latest Articles</h1>
        <br><br>
        
        <div class="articles-container">
            <div class="article-card">
                <div class="article-header">
                    <h2>The Evolution of Fantasy Literature</h2>
                    <span class="article-meta">By Sarah Johnson | October 15, 2024</span>
                </div>
                <div class="article-content">
                    <p>From the works of J.R.R. Tolkien to modern fantasy authors, this article explores how fantasy literature 
                    has evolved over the decades. We'll examine the changing themes, world-building techniques...</p>
                </div>
                <div class="article-footer">
                    <a href="./bookSellerArticleDetail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="article-card">
                <div class="article-header">
                    <h2>Independent Bookstores: A Renaissance</h2>
                    <span class="article-meta">By Michael Chen | October 12, 2024</span>
                </div>
                <div class="article-content">
                    <p>Despite the digital age, independent bookstores are experiencing a surprising revival. This piece 
                    investigates the factors behind this renaissance and how local bookstores are adapting...</p>
                </div>
                <div class="article-footer">
                    <a href="./bookSellerArticleDetail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="article-card">
                <div class="article-header">
                    <h2>The Rise of Young Adult Literature</h2>
                    <span class="article-meta">By Emma Thompson | October 10, 2024</span>
                </div>
                <div class="article-content">
                    <p>Young Adult literature has become one of the most dynamic and influential categories in publishing. 
                    We examine its impact on readers of all ages and how it's shaping modern storytelling...</p>
                </div>
                <div class="article-footer">
                    <a href="./bookSellerArticleDetail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="article-card">
                <div class="article-header">
                    <h2>Digital vs. Physical Books: The Reader's Dilemma</h2>
                    <span class="article-meta">By David Rodriguez | October 8, 2024</span>
                </div>
                <div class="article-content">
                    <p>As e-readers become increasingly sophisticated, many readers find themselves torn between digital 
                    and physical books. We explore the pros and cons of each format and what it means...</p>
                </div>
                <div class="article-footer">
                    <a href="./bookSellerArticleDetail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="article-card">
                <div class="article-header">
                    <h2>The Art of Book Collection</h2>
                    <span class="article-meta">By Alexandra White | October 5, 2024</span>
                </div>
                <div class="article-content">
                    <p>Whether you're a seasoned collector or just starting out, this guide walks you through the 
                    essentials of book collecting. Learn about first editions, caring for rare books...</p>
                </div>
                <div class="article-footer">
                    <a href="./bookSellerArticleDetail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="controls">
            <button class="view-more-button">View More</button>
        </div>
    </div>
    </center>

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->
    <script src="<?= ROOT ?>/assets/JS/bookSellerlistings.js"></script>
</body>
</html>