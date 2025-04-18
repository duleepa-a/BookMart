<?php

class ArticleModel {

    use Model;

    protected $table = 'article';

    protected $allowedColumns = [
        'id',
        'user_id',
        'title',
        'author',
        'content',
        'created_at'
    ];

    public function getArticleById($article_id) {

        return $this->where(['ID' => $article_id]);
    }
    
    public function getArticles($user_id = null, $limit = 5) {

        $this->setLimit($limit);
    
        if ($user_id !== null) {
            return $this->where(['user_id' => $user_id]);
        } else {
            return $this->findAll();
        }
    } 

    public function getRecomendedArticles($article_id) {

        $this->setLimit(2);
        return $this->where([], ['ID' => $article_id]);
    }

}