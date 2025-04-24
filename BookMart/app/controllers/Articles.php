<?php

class Articles extends Controller {

    public function index() {

        $user_id = $_SESSION['user_id'];

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $view = isset($_GET['view']) ? $_GET['view'] : 'latest';
        $validViews = ['latest', 'myArticles'];
        if (! in_array($view, $validViews)) {
            $view = 'latest';
        }

        switch ($view) {
            case 'myArticles':
                $data = $this->getSlicedArticles($user_id, $page, $view);
                break;
    
            case 'latest':
            default:
                $data = $this->getSlicedArticles(null, $page, $view);
                break;
        }
    
        $this->view('articles', $data);
    }

    public function getNewArticles() {
        $article = new ArticleModel();
        $article->setLimit(2);
        return $article->findAll();
    }

    public function detail($article_id) {

        $articleModel = new ArticleModel();
        $articles = $articleModel->getArticleById($article_id);
        $recArticles = $articleModel->getRecomendedArticles($article_id);

        if (!$articles) {
            redirect('articles?view=latest');
        }
        
        $data = [
            'articles' => $articles[0],
            'article_id' => $article_id,
            'recomended' => $recArticles
        ];
        
        $this->view('articleDetail', $data);
    }

    public function create() {
        $this->view('articleUpdate');
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
        $notificationModel = new NotificationModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'user_id' => $_SESSION['user_id'],
                'title' => trim($_POST['title']),
                'author' => trim($_POST['author']),
                'content' => trim($_POST['content']),
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
                'title' => trim($_POST['title']),
                'author' => trim($_POST['author']),
                'content' => trim($_POST['content']),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            
            if (!($articleModel->update($article_id, $articleData))) {
                redirect('articles?view=myArticles');
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

    public function getSlicedArticles($user_id = null, $page, $view) {

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
                'selectedTab' => $view,
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
                'selectedTab' => $view,
            ];
        }

        return $data;
    }
    
}