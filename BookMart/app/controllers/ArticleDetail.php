<?php
class ArticleDetail extends Controller{
    public function index($id){
       
        $articles = $this->getArticles($id);

        $data = [
            'articles' => [$articles[0]], 
            'article_id' => $id
        ];

        $this->view('articleDetail', $data);
    }

    public function getArticles($articleId) {
        $article = new ArticleModel();
        $article->setLimit(1);
        return $article->where(['ID' => $articleId]); 
    }
}