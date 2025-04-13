<?php

class Articles extends Controller {
    
    // Main index method - shows list of articles
    public function index() {
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
    
        // Fetch one extra to check if more articles exist
        $articles = $this->getArticles(null, $limit + 1);
    
        // Slice it to only show the actual limit
        $displayArticles = array_slice($articles, 0, $limit);
    
        $data = [
            'articles' => $displayArticles,
            'limit' => $limit,
            'hasMore' => count($articles) > $limit,
        ];
    
        $this->view('articles', $data);
    }
    
    // Get articles with optional limit
    public function getArticles($articleId = null, $limit = 5) {
        $article = new ArticleModel();
        $article->setLimit($limit);
    
        if ($articleId !== null) {
            return $article->where(['ID' => $articleId]);
        } else {
            return $article->findAll();
        }
    }    
    
    // Get only new articles
    public function getNewArticles() {
        $article = new ArticleModel();
        $article->setLimit(2);
        return $article->findAll();
    }

    public function getRecomendedArticles($id = null) {
        if ($id === null) {
            return null;
        }
        $article = new ArticleModel();
        $article->setLimit(2);
        return $article->where([], ['ID' => $id]);
    }
    
    // Article creation view
    public function create() {
        $this->view('articleCreation');
    }
    
    // Add new article functionality
    public function addArticle() {
        $articleModel = new ArticleModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $articleData = [
                'seller_id' => $_SESSION['user_id'],
                'title' => htmlspecialchars(trim($_POST['title'])),
                'author' => htmlspecialchars(trim($_POST['author'])),
                'content' => htmlspecialchars(trim($_POST['content'])),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            
            if ($articleModel->insert($articleData)) {
                redirect('articles/myArticles');
            } else {
                echo "Something went wrong!";
            }
        } else {
            $this->view('articleCreation');
        }
    }
    
    // Article detail view
    public function detail($id) {
        $articles = $this->getArticles($id);
        $recArticles = $this->getRecomendedArticles($id);
        
        $data = [
            'articles' => [$articles[0]],
            'article_id' => $id,
            'recomended' => $recArticles
        ];
        
        $this->view('articleDetail', $data);
    }
    
    // Article update view
    public function update($id) {
        $articles = $this->getArticles($id);
        
        $data = [
            'articles' => [$articles[0]],
            'article_id' => $id
        ];
        
        $this->view('articleUpdate', $data);
    }
    
    // Update article functionality
    public function updateArticle() {
        $articleModel = new ArticleModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $articleId = $_POST['article_id'];
            $articleData = [
                'title' => htmlspecialchars(trim($_POST['title'])),
                'author' => htmlspecialchars(trim($_POST['author'])),
                'content' => htmlspecialchars(trim($_POST['content'])),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            
            if (!($articleModel->update($articleId, $articleData))) {
                redirect('articles/myArticles');
            } else {
                echo "Something went wrong while updating!";
            }
        } else {
            echo("Invalid request method");
        }
    }
    
    // Delete article functionality
    public function deleteArticle() {
        $articleModel = new ArticleModel();
        $id = $_POST['article_id'];
        
        $articleModel->delete($id);
        redirect('articles/myArticles');
    }
    
    // MyArticles functionality - shows only user's articles
    public function myArticles() {
        $userId = $_SESSION['user_id'];

        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;

        $articles = $this->getUserArticles($userId, $limit + 1);

        $displayArticles = array_slice($articles, 0, $limit);

        $data = [
            'articles' => $displayArticles,
            'limit' => $limit,
            'hasMore' => count($articles) > $limit,
        ];
        
        $this->view('myArticles', $data);
    }
    
    // Get articles for a specific user
    public function getUserArticles($userId, $limit = 5) {
        $article = new ArticleModel();
        $article->setLimit($limit);
        return $article->where(['seller_id' => $userId]);
    }
    
}