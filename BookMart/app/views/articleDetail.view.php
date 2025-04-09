<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/articleDetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Article - BookMart</title>
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
    <div class="background-box">
        <article class="article-full">
            <header class="article-header">
                <h1><?= htmlspecialchars($data['articles'][0]->Title) ?></h1>
                <div class="article-meta">
                    <span class="author"><?= htmlspecialchars($data['articles'][0]->Author) ?></span>
                    <span class="date"><?= htmlspecialchars($data['articles'][0]->created_at) ?></span>
                </div>
            </header>
            
            <div class="article-content">
                <?=  nl2br(htmlspecialchars($data['articles'][0]->Content))?>
            </div>
        </article>
    </div>
    </center>

    <section class="recommended-section">
        <h2 class="recommended-heading">Recommended Articles</h2>
        <div class="recommended-container">
            <div class="article-card">
                <div class="recommended-header">
                    <h2>Independent Bookstores: A Renaissance</h2>
                    <span class="article-meta">By Michael Chen | October 12, 2024</span>
                </div>
                <div class="article-content">
                    <p>Despite the digital age, independent bookstores are experiencing a surprising revival. This piece 
                    investigates the factors behind this renaissance and how local bookstores are adapting...</p>
                </div>
                <div class="article-footer">
                    <a href="<?= ROOT ?>/articles/detail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <br>

            <div class="article-card">
                <div class="recommended-header">
                    <h2>The Rise of Young Adult Literature</h2>
                    <span class="article-meta">By Emma Thompson | October 10, 2024</span>
                </div>
                <div class="article-content">
                    <p>Young Adult literature has become one of the most dynamic and influential categories in publishing. 
                    We examine its impact on readers of all ages and how it's shaping modern storytelling...</p>
                </div>
                <div class="article-footer">
                    <a href="<?= ROOT ?>/articles/detail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->
    <script src="<?= ROOT ?>/assets/JS/bookSellerlistings.js"></script>
</body>
</html>