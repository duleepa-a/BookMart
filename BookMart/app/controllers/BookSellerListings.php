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

    public function updateBook(){
        $bookModel = new BookModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookId = $_POST['book_id'];

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

            show($bookData);

            // Handle cover image upload if a new image is provided
            if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
                
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\Images\book cover images';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $filename = uniqid() . '.' . $fileExtension;
                    $filePath = $uploadDir . '\\' . $filename;

                    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $filePath)) {
                        $bookData['cover_image'] = $filename;
                    } else {
                        echo "Error uploading cover image!";
                        return;
                    }
                } else {
                    echo "Invalid file type!";
                    return;
                }
            }


            show($bookId);
            // Update the book record in the database
            if (!($bookModel->update($bookId, $bookData))) {
                redirect('bookSellerListings');
            } else {
                echo "Something went wrong while updating the book!";
            }
        } else {
            echo "Invalid request method!";
        }
    }

    public function deleteBook(){
        $bookModel = new BookModel();
        $idString = $_POST['book_id'];
        
        show($idString);
        
        // Split the ID string into an array
        $ids = explode(',', $idString);
        
        // Delete all selected books
        foreach ($ids as $id) {
            if (!empty($id)) { // Check if the ID is not empty
                $result = $bookModel->delete($id);
                
                if (!$result) {
                    echo "Error deleting book with id: $id";
                }
            }
        }
        
        redirect('bookSellerListings');
    }

}