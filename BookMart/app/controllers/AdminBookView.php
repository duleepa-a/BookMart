<?php

class AdminBookView extends Controller {
    public function index() {
        // Ensure a book_id is passed in the URL
        if (!isset($_GET['book_id']) || empty($_GET['book_id'])) {
            die('Book ID is required');
        }
    
        $book_id = $_GET['book_id'];
    
        // Load the model
        $bookModel = new BookModel();
        $book = $bookModel->findById($book_id);
    
        // Check if the book exists
        if (!$book) {
            die('Book not found');
        }
    
        // Pass the book data to the view
        $this->view('adminBookView', ['book' => $book]);
    }
    
    // Add this method for book listing with pagination
    public function list($page = 1) {
        $page = max(1, (int)$page);
        $perPage = 11; // 11 books per page
        $offset = ($page - 1) * $perPage;
        
        $bookModel = new BookModel();
        $books = $bookModel->findAll($perPage, $offset);
        $totalBooks = $bookModel->count();
        $totalPages = ceil($totalBooks / $perPage);
        
        $this->view('adminBooks', [
            'books' => $books,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'perPage' => $perPage
        ]);
    }
    
    // Add this method for searching with pagination
    public function search() {
        $keyword = $_GET['keyword'] ?? '';
        $page = max(1, (int)($_GET['page'] ?? 1));
        $perPage = 11; // 11 books per page
        $offset = ($page - 1) * $perPage;
        
        $bookModel = new BookModel();
        $books = $bookModel->searchBooks($keyword, $perPage, $offset);
        $totalBooks = $bookModel->countSearchResults($keyword);
        $totalPages = ceil($totalBooks / $perPage);
        
        $this->view('adminSearchResults', [
            'books' => $books,
            'keyword' => $keyword,
            'currentPage' => $page,
            'totalPages' => $totalPages,
            'perPage' => $perPage
        ]);
    }

    public function bookdetails() {
        $bookModel = new BookModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ensure book_id exists in the request
            if (!isset($_POST['book_id']) || empty($_POST['book_id'])) {
                die('Book ID is required');
            }

            $book_id = $_POST['book_id'];
            
            // Sanitize and validate input
            $bookData = [
                'id' => (int)$book_id,
                'title' => trim($_POST['book_Title'] ?? ''),
                'author' => trim($_POST['author'] ?? ''),
                'publisher' => trim($_POST['publisher'] ?? ''),
                'ISBN' => trim($_POST['isbn'] ?? ''),
                'genre' => trim($_POST['genre'] ?? ''),
                'language' => trim($_POST['language'] ?? ''),
                'quantity' => trim($_POST['quantity'] ?? ''),
                'price' => filter_var(trim($_POST['Price'] ?? 0), FILTER_VALIDATE_FLOAT),
                'discount' => filter_var(trim($_POST['discount'] ?? 0), FILTER_VALIDATE_FLOAT),
                'book_condition' => trim($_POST['book_condition'] ?? ''),
                'description' => trim($_POST['description'] ?? '')
            ];

            // Make sure Price is valid
            if ($bookData['price'] === false) {
                die('Invalid Price');
            }

            if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === 0) {
                $uploadDir = 'assets/Images/books/';
                // Create directory if it doesn't exist
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                
                $filename = time() . '_' . basename($_FILES['cover_image']['name']);
                $targetFile = $uploadDir . $filename;
                
                if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $targetFile)) {
                    $bookData['cover_image'] = $targetFile;
                   
                }
            }
        
        // If not POST or update failed, redirect back to index
        redirect('AdminSearchbooks');
        }
    }
    

    public function deleteBook(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_id'])) {
            $bookModel = new BookModel();
            $id = $_POST['book_id'];
            
            $result = $bookModel->update($id,['status' => 'removed']);
            
            if($result) {
                $_SESSION['success_message'] = "Book successfully deleted";
            } else {
                $_SESSION['error_message'] = "Failed to delete book. It may be referenced by other records.";
            }
        }
        redirect('adminSearchbooks');
    }
}

