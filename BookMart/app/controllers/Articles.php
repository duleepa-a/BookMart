<?php

class Articles extends Controller {

    public function index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $data = $this->getSlicedArticles(null, $page);
    
        $this->view('articles', $data);
    }
    
    public function myArticles() {
        $user_id = $_SESSION['user_id'];
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        $data = $this->getSlicedArticles($user_id, $page);

        $this->view('myArticles', $data);
    }

    public function detail($article_id) {

        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticleById($article_id);
        $recArticles = $articleModel->getRecomendedArticles($article_id);
        
        $data = [
            'articles' => $articles[0],
            'article_id' => $article_id,
            'recomended' => $recArticles
        ];
        
        $this->view('articleDetail', $data);
    }

    public function create() {
        $this->view('articleCreation');
    }

    public function update($article_id) {

        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticleById($article_id);
        
        $data = [
            'articles' => $articles[0],
            'article_id' => $article_id
        ];
        
        $this->view('articleUpdate', $data);
    }
    
    public function addArticle() {
        $articleModel = new ArticleModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => htmlspecialchars(trim($_POST['title'])),
                'author' => htmlspecialchars(trim($_POST['author'])),
                'content' => htmlspecialchars(trim($_POST['content'])),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            
            $articleModel->insert($data);
                
            redirect('articles/myArticles');
            
        } else {
            $this->view('articleCreation');
        }
    }
    
    public function updateArticle() {
        $articleModel = new ArticleModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $article_id = $_POST['article_id'];
            $articleData = [
                'title' => htmlspecialchars(trim($_POST['title'])),
                'author' => htmlspecialchars(trim($_POST['author'])),
                'content' => htmlspecialchars(trim($_POST['content'])),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            
            if (!($articleModel->update($article_id, $articleData))) {
                redirect('articles/myArticles');
            } else {
                echo "Something went wrong while updating!";
            }
        } else {
            echo("Invalid request method");
        }
    }
    
    public function deleteArticle() {
        $articleModel = new ArticleModel();
        $article_id = $_POST['article_id'];
        
        $articleModel->delete($article_id);
        redirect('articles/myArticles');
    }

    public function getSlicedArticles($user_id = null, $page) {

        $articleModel = new ArticleModel();
        
        $page = max(1, $page); 
        $perPage = 5;
    
        $fetchLimit = $page * $perPage + 1;

        $articles = $articleModel->getArticles($user_id, $fetchLimit);
        
    
        if (!is_array($articles) || empty($articles)) {
            $data = [
                'articles' => [],
                'page' => $page,
                'hasNext' => false,
                'hasPrevious' => false,
                'showPageControl' => false,
            ];
        } 
        else {
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

        return $data;
    }
    
}