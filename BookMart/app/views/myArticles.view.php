<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/articles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Articles - BookMart</title>
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
        <h1 class="title-text">My Articles</h1>

        <div class="controls">
            <button class="view-more-button" onClick="location.href='./articleCreation';">Create Article</button>
        </div>
        
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
                            <a href="./articleUpdate/<?= htmlspecialchars($article->ID) ?>" class="read-more">
                                Update
                            </a>
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
                <p>No articles found. Create your first article!</p>
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