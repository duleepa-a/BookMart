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
    <?php include 'secondaryNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- navBar division begin -->
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <br>
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

        <?php if (!empty($data['articles'])): ?>
            <?php $counter = 0; ?>
            <?php foreach ($data['recomended'] as $article): ?>
                <?php if ($counter == 2) break; ?>
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
                        <a href="<?= ROOT ?>/articles/detail/<?= htmlspecialchars($article->ID) ?>" class="read-more">
                            Read More <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <br>
                <?php $counter++; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No articles found.</p>
        <?php endif; ?>

        </div>
    </section>

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->
    <script src="<?= ROOT ?>/assets/JS/bookSellerlistings.js"></script>
</body>
</html>