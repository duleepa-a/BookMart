<?php

class AdminSearchbooks extends Controller {
    public function index() {
        $bookModel = new BookModel();
        $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';
        
        $sortClause = "";
        if ($sort) {
            switch ($sort) {
                case 'title':
                    $sortClause = " ORDER BY title ASC";
                    break;
                case 'author':
                    $sortClause = " ORDER BY author ASC";
                    break;
                case 'publisher':
                    $sortClause = " ORDER BY publisher ASC";
                    break;
                default:
                    $sortClause = " ORDER BY title ASC";
            }
        } else {
            $sortClause = " ORDER BY title ASC"; 
        }
        
        $searchField = "";
        if (!empty($searchQuery) && !empty($sort)) {
            $searchField = $sort; 
        }

        if (!empty($searchQuery)) {
            $totalBooks = $bookModel->countSearchResults($searchQuery, $searchField);
        } else {
            $totalBooks = $bookModel->count();
        }

        $limit = 3; 
        $totalPages = ceil($totalBooks / $limit);
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        if ($page > $totalPages && $totalPages > 0) $page = $totalPages;
        
        $offset = ($page - 1) * $limit;

        if (!empty($searchQuery)) {
            $books = $bookModel->adminsearchBooks($searchQuery, $limit, $offset, $sortClause, $searchField);
        } else {
            $books = $bookModel->adminFindAllBooks($limit, $offset, $sortClause);
        }

        $this->view('adminSearchbooks', [
                                            'book' => $books,
                                            'searchQuery' => $searchQuery,
                                            'currentPage' => $page,
                                            'totalPages' => $totalPages,
                                            'sort' => $sort
                                         ]);
    }
}