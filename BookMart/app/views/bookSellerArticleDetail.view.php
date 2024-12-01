<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerArticleDetail.css">
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
    
    <br><br>
    <center>
    <div class="background-box">
        <article class="article-full">
            <header class="article-header">
                <h1>The Evolution of Fantasy Literature</h1>
                <div class="article-meta">
                    <span class="author">By Sarah Johnson</span>
                    <span class="date">October 15, 2024</span>
                </div>
            </header>
            
            <div class="article-content">
                <p>From the mystical realms of J.R.R. Tolkien's Middle-earth to the contemporary magical worlds crafted by modern fantasy authors, the genre of fantasy literature has undergone a remarkable evolution over the decades. This transformation reflects not only changes in literary styles but also shifts in societal values and reader expectations.</p>

                <p>The foundations of modern fantasy literature were firmly established in the mid-20th century, with Tolkien's "The Lord of the Rings" setting a gold standard for world-building and epic storytelling. This era defined many of the tropes and conventions that would become hallmarks of the genre: elaborate magic systems, mythical creatures, and heroes embarking on world-changing quests.</p>

                <p>As we moved into the latter part of the 20th century, authors began to subvert these established conventions. Writers like Terry Pratchett brought humor and satire to the genre, while others introduced darker, more morally ambiguous themes. The rise of urban fantasy in the 1990s brought magical elements into contemporary settings, creating a bridge between the familiar and the fantastic.</p>

                <p>Today's fantasy landscape is more diverse than ever. Authors are drawing inspiration from non-Western mythologies, exploring complex social issues through fantastical lens, and pushing the boundaries of what fantasy literature can achieve. The genre has evolved from simple tales of good versus evil to nuanced explorations of power, identity, and human nature.</p>

                <p>Looking ahead, the future of fantasy literature seems boundless. With the rise of diverse voices and perspectives, readers can expect even more innovation in storytelling approaches and thematic content. The genre continues to prove that imagination knows no bounds, and that magic still has the power to illuminate truth about our own world.</p>
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
                    <a href="./bookSellerArticleDetail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
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
                    <a href="./bookSellerArticleDetail" class="read-more">Read More <i class="fa-solid fa-arrow-right"></i></a>
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