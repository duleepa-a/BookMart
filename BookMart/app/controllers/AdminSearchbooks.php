<?php

class AdminSearchbooks extends Controller {
    public function index() {
        $bookModel = new BookModel();

        // Get total count of books for pagination
        $totalBooks = $bookModel->adminCount();

        $limit = 3; 
        $totalPages = ceil($totalBooks / $limit);

        // Get current page from query string or default to 1
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        if ($page > $totalPages && $totalPages > 0) $page = $totalPages;

        $offset = ($page - 1) * $limit;

        // Fetch books without search or sort
        $books = $bookModel->adminFindAllBooks($limit, $offset);

        // Load view with necessary data
        $this->view('adminSearchbooks', [
            'book' => $books,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }
}
