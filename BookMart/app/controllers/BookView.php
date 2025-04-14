<?php

require 'Book.php';

class BookView extends Controller{

    public function index($id = 'hello'){
        $bookModel = new BookModel();
        $reviewLikeModel = new ReviewLike();
        $bookController = new Book();
        $book = $bookModel->first(['id' => $id]);
        $recom = $bookModel->findAll();
        $reviews =$bookController->getReviews($id);

       

        $sellerm = new UserModel;
        $seller= $sellerm->first(['id' => $book->seller_id]);
        
        if (!empty($reviews)) {
            foreach ($reviews as &$review) {
                $buyer = $sellerm->first(['id' => $review->buyer_id]);
                $review->username = $buyer ? $buyer->username : 'Unknown';
                
                if(isset($_SESSION['user_id'])){
                    if($reviewLikeModel->first(['user_id' => $_SESSION['user_id'] , 'review_id' => $review->id])){
                        $review->liked=1;
                    }
                    else{
                        $review->liked=0;
                    }
                }
            }
        }

        $data = 
        [
            'book' => $book,
            'seller' => $seller,
            'recommended'=>$recom,
            'reviews' => $reviews ,
        ]; 

        
        $this->view('bookView',$data);
    }

}
