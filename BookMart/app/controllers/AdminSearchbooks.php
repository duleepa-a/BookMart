<?php

class AdminSearchbooks extends Controller {
    public function index() {
        $bookModel = new BookModel();
        $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
        $sort = isset($_GET['sort']) ? trim($_GET['sort']) : '';
        
        // Build the sort clause
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
            $sortClause = " ORDER BY title ASC"; // Default sorting
        }
        
        // Determine search field based on sort selection
        $searchField = "";
        if (!empty($searchQuery) && !empty($sort)) {
            $searchField = $sort; // Use the sort field as the search field
        }
        
        // Get total count for pagination (before applying pagination limits)
        if (!empty($searchQuery)) {
            $totalBooks = $bookModel->countSearchResults($searchQuery, $searchField);
        } else {
            $totalBooks = $bookModel->count();
        }
        
        // Pagination parameters - calculate after getting total count
        $limit = 3; // Books per page
        $totalPages = ceil($totalBooks / $limit); // Calculate the total number of pages
        
        // Make sure the page is valid
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        if ($page > $totalPages && $totalPages > 0) $page = $totalPages;
        
        $offset = ($page - 1) * $limit;
        
        // Now get the books for the current page
        if (!empty($searchQuery)) {
            $books = $bookModel->searchBooks($searchQuery, $limit, $offset, $sortClause, $searchField);
        } else {
            $books = $bookModel->findAll($limit, $offset, $sortClause);
        }
        
        // Pass data to the view
        $this->view('adminSearchbooks', [
            'book' => $books,
            'searchQuery' => $searchQuery,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'sort' => $sort
        ]);
    }
}