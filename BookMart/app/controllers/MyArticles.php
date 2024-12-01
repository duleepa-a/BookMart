<?php

class MyArticles extends Controller{

    public function index(){

        $Id=$_SESSION['user_id'];
        $articles = $this->getArticles($Id);

        $data = ['articles' => $articles,
                ];

        $this->view('myArticles',$data);
    }

    public function getArticles($Id) {
        $article = new ArticleModel();
        $article->setLimit(5);
        return $article->where(['seller_id' => $Id]); 
    }

}
