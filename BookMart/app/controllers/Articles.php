<?php

class Articles extends Controller {

    public function index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max(1, $page); 
        $perPage = 5;
    
        $fetchLimit = $page * $perPage + 1;
        $articles = $this->getArticles(null, $fetchLimit);
    
        if (!is_array($articles) || empty($articles)) {
            $data = [
                'articles' => [],
                'page' => $page,
                'hasNext' => false,
                'hasPrevious' => false,
                'showPageControl' => false,
            ];
        } else {
            $start = ($page - 1) * $perPage;
            $pagedArticles = array_slice($articles, $start, $perPage);
            $hasNext = count($articles) > $page * $perPage;
    
            $data = [
                'articles' => $pagedArticles,
                'page' => $page,
                'hasNext' => $hasNext,
                'hasPrevious' => $page > 1,
                'showPageControl' => count($articles) > $perPage,
            ];
        }
    
        $this->view('articles', $data);
    }
    

    // MyArticles functionality - shows only user's articles
    public function myArticles() {
        $userId = $_SESSION['user_id'];

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max(1, $page); 
        $perPage = 5;
    
        $fetchLimit = $page * $perPage + 1;
        $articles = $this->getUserArticles($userId, $fetchLimit);
    
        if (!is_array($articles) || empty($articles)) {
            $data = [
                'articles' => [],
                'page' => $page,
                'hasNext' => false,
                'hasPrevious' => false,
                'showPageControl' => false,
            ];
        } else {
            $start = ($page - 1) * $perPage;
            $pagedArticles = array_slice($articles, $start, $perPage);
            $hasNext = count($articles) > $page * $perPage;
    
            $data = [
                'articles' => $pagedArticles,
                'page' => $page,
                'hasNext' => $hasNext,
                'hasPrevious' => $page > 1,
                'showPageControl' => count($articles) > $perPage,
            ];
        }
    
        $this->view('myArticles', $data);
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
    
    
    
    // Get articles for a specific user
    public function getUserArticles($userId, $limit = 5) {
        $article = new ArticleModel();
        $article->setLimit($limit);
        return $article->where(['seller_id' => $userId]);
    }
    
}