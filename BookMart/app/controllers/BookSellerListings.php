<?php
require 'Book.php';

class BookSellerListings extends Controller{

    public function index(){
        $bookController = new Book();
        $bookstoreId=$_SESSION['user_id'];
        $books = $bookController->getBooksByBookstore($bookstoreId);

        $data = ['inventory' => $books,
                ];
        $this->view('bookSellerListings',$data);
    }

    public function updateBook() {
        if (!isset($_SESSION['user_id'])) {
            $this->jsonResponse(['status' => 'error', 'message' => 'Unauthorized access']);
            return;
        }

        $bookModel = new BookModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookId = $_POST['book_id'];
            
            // Verify book ownership
            $currentBook = $bookModel->where(['id' => $bookId, 'seller_id' => $_SESSION['user_id']], true);
            if (!$currentBook) {
                $this->jsonResponse(['status' => 'error', 'message' => 'Unauthorized access to this book']);
                return;
            }

            // Prepare book data for update
            $bookData = [
                'title' => htmlspecialchars(trim($_POST['title'])),
                'ISBN' => htmlspecialchars(trim($_POST['ISBN'])),
                'author' => htmlspecialchars(trim($_POST['author'])),
                'genre' => htmlspecialchars(trim($_POST['genre'])),
                'publisher' => htmlspecialchars(trim($_POST['publisher'])),
                'price' => filter_var(trim($_POST['price']), FILTER_VALIDATE_FLOAT),
                'discount' => filter_var(trim($_POST['discount']), FILTER_VALIDATE_FLOAT),
                'quantity' => filter_var(trim($_POST['quantity']), FILTER_VALIDATE_INT),
                'book_condition' => htmlspecialchars(trim($_POST['book_condition'])),
                'language' => htmlspecialchars(trim($_POST['language'])),
                'description' => htmlspecialchars(trim($_POST['description'])),
            ];

            // Validate required fields
            if (!$this->validateBookData($bookData)) {
                $this->jsonResponse(['status' => 'error', 'message' => 'Invalid book data']);
                return;
            }

            // Handle cover image upload if provided
            if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
                $imageResult = $this->handleImageUpload($_FILES['cover_image']);
                if ($imageResult['status'] === 'success') {
                    $bookData['cover_image'] = $imageResult['filename'];
                } else {
                    $this->jsonResponse(['status' => 'error', 'message' => $imageResult['message']]);
                    return;
                }
            }

            // Update the book record
            if ($bookModel->update($bookId, $bookData)) {
                $this->jsonResponse(['status' => 'success']);
            } else {
                $this->jsonResponse(['status' => 'error', 'message' => 'Failed to update book']);
            }
        }
    }

    public function deleteBook() {
        if (!isset($_SESSION['user_id'])) {
            $this->jsonResponse(['status' => 'error', 'message' => 'Unauthorized access']);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookModel = new BookModel();
            $bookId = $_POST['book_id'];
            
            // Verify book ownership
            $book = $bookModel->where(['id' => $bookId, 'seller_id' => $_SESSION['user_id']], true);
            if (!$book) {
                $this->jsonResponse(['status' => 'error', 'message' => 'Unauthorized access to this book']);
                return;
            }

            if ($bookModel->delete($bookId)) {
                $this->jsonResponse(['status' => 'success']);
            } else {
                $this->jsonResponse(['status' => 'error', 'message' => 'Failed to delete book']);
            }
        }
    }

    private function validateBookData($data) {
        return (
            !empty($data['title']) &&
            !empty($data['ISBN']) &&
            !empty($data['author']) &&
            is_numeric($data['price']) &&
            $data['price'] > 0 &&
            is_numeric($data['quantity']) &&
            $data['quantity'] >= 0
        );
    }

    private function handleImageUpload($file) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            return ['status' => 'error', 'message' => 'Invalid file type'];
        }

        $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\Images\book cover images';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = uniqid() . '.' . $fileExtension;
        $filePath = $uploadDir . '\\' . $filename;

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return ['status' => 'success', 'filename' => $filename];
        }

        return ['status' => 'error', 'message' => 'Failed to upload image'];
    }

    private function jsonResponse($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

}