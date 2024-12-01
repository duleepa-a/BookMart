<?php

class Articles extends Controller{

    public function index(){

        $articles = $this->getArticles();

        $data = ['articles' => $articles,
                ];

        $this->view('articles',$data);
    }

    public function getArticles() {
        $article = new ArticleModel();
        $article->setLimit(5);
        return $article->findAll(); 
    }

    public function getNewArticles() {
        $article = new ArticleModel();
        $article->setLimit(2);
        return $article->findAll(); 
    }

}