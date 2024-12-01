<?php

class ArticleCreation extends Controller{

    public function index(){
        $this->view('articleCreation');
    }

    public function addArticle(){
        $articleModel = new ArticleModel();
        echo("addArticle");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo("add Article POST in");

            $articleData = [
                'seller_id' => $_SESSION['user_id'],
                'title' => htmlspecialchars(trim($_POST['title'])),
                'author' => htmlspecialchars(trim($_POST['author'])),
                'content' => htmlspecialchars(trim($_POST['content'])),
                'created_at' => date('Y-m-d H:i:s'),

            ];
           
                echo("Validation passed");
                if ($articleModel->insert($articleData)) {
                    redirect('myArticles');
                } else {
                    echo "Something went wrong!";
                }
        } else {
            echo("addArticle GET request");
            $this->view('articleCreation');
        }
    }

}