<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/articles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Articles - BookMart</title>
</head>
<body>
    
   <!-- navBar division begin -->
   <?php include 'homeNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- navBar division begin -->
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- navBar division end -->
     
    <br><br>
    <center>
    <div class="background-box">
        <h1 class="title-text">Latest Articles</h1>
        <br><br>

        <div class="articles-container">
            <?php if (!empty($data['articles'])): ?>
                <?php $counter = 0; ?>
                <?php foreach ($data['articles'] as $article): ?>
                    <div class="article-card">
                        <div class="article-header">
                            <h2><?= htmlspecialchars($article->Title) ?></h2>
                            <span class="article-meta">
                                By <?= htmlspecialchars($article->Author) ?> | 
                                <?= date('F d, Y', strtotime($article->created_at)) ?>
                            </span>
                        </div>
                        <div class="article-content">
                            <p><?= substr(htmlspecialchars($article->Content), 0, 200) ?>...</p>
                        </div>
                        <div class="article-footer">
                            <p></p>
                            <a href="./articleDetail/<?= htmlspecialchars($article->ID) ?>" class="read-more">
                                Read More <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <?php $counter++; ?>
                <?php endforeach; ?>
                <?php if ($counter == 5): ?>
                    <div class="controls">
                        <button class="view-more-button">View More</button>
                    </div>
                <?php endif; ?>
                
            <?php else: ?>
                <p>No articles found.</p>
            <?php endif; ?>
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