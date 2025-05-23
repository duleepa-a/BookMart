<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Article - BookMart</title>
        <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/articleUpdate.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- navBar division begin -->
        <?php include 'secondaryNavBar.view.php'; ?>
        <!-- navBar division end -->

        <!-- Sidebar division begin -->
        <?php include 'commonSidebar.view.php'; ?>
        <!-- Sidebar division end -->

        <div class="container">
            <div class="create-article-container">
                <h1 class="title-text"><?= isset($data['articles']) ? "Update Article" : "Create Article"?></h1>
                </br>
                <form class="article-form" id=<?= isset($data['articles']) ? "articleUpdateForm" : "articleCreationForm"?> action=<?= isset($data['articles']) ? ROOT . "/articles/updateArticle" : ROOT . "/articles/addArticle" ?> method="POST">

                    <?php if (isset($data['articles'])): ?>
                        <input type="hidden" name="article_id" value="<?= htmlspecialchars($data['article_id']) ?>">
                    <?php endif; ?>

                        <div class="form-group">
                            <label for="title">Article Title</label>
                            <input type="text" id="title" name="title" placeholder="Enter your article title" required value="<?= isset(($data['articles'])) ? htmlspecialchars($data['articles']->Title) : '' ?>">
                        </div>

                        <div class="article-meta-inputs">
                            <div class="form-group">
                                <label for="author">Author Name</label>
                                <input type="text" id="author" name="author" placeholder="Your Name" required value="<?= isset(($data['articles'])) ? htmlspecialchars($data['articles']->Author) : '' ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content">Article Content</label>
                            <textarea id="article-content" name="content" placeholder="Write your article here..." required><?= isset(($data['articles'])) ? htmlspecialchars($data['articles']->Content) : '' ?></textarea>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn-save"><?= isset($data['articles']) ? "Update Article" : "Create Article" ?></button>
                            <?php if (isset($data['articles'])): ?>
                            <button type="button" id="delete-article-trigger" class="btn-delete">Delete Article</button>
                            <?php endif; ?>
                        </div>
                </form>
            </div>

        <div class="modal" id="delete-article-modal">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="delete-article-form" method="POST" action="<?= ROOT ?>/articles/deleteArticle">
                    <h2 class="full-width">Delete Article</h2>
                    <p>Are you sure you want to delete this article?</p>
                    <p id="delete-article-details"></p>
                    <input type="hidden" id="delete-article-id" name="article_id" 
                        value="<?= htmlspecialchars($data['article_id']) ?>">
                    <div class="modal-actions">
                        <button type="submit" class="btn-delete">Delete</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

            <!-- Footer division begin -->
            <?php include 'smallFooter.view.php'; ?>
            <!-- Footer division end -->

        </div>

        <script src="<?= ROOT ?>/assets/JS/articleUpdate.js"></script>
        
    </body>
</html>