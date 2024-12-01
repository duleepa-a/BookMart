<?php

class ArticleUpdate extends Controller{

    public function index($id){
       
        $articles = $this->getArticles($id);

        $data = [
            'articles' => [$articles[0]], 
            'article_id' => $id
        ];

        $this->view('articleUpdate', $data);
    }

    public function getArticles($articleId) {
        $article = new ArticleModel();
        $article->setLimit(1);
        return $article->where(['ID' => $articleId]);

    }

    public function updateArticle(){
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
                redirect('myArticles');
            } else {
                echo "Something went wrong while updating!";
            }
        } else {
            echo("Invalid request method");
        }
    }

    public function deleteArticle(){
        $articleModel = new articleModel();
        $id = $_POST['article_id'];
        
        $articleModel->delete($id);
        redirect('myArticles');
        
    }

}