<?php
require 'Book.php';

class BookSellerSidebar extends Controller{

    public function index(){
        $this->view('bookSellerHome');
    }

    public function addBook(){
        $bookModel = new BookModel();
        echo("addBook");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo("addBook POST in");

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
                'seller_id' => $_SESSION['user_id'],
            ];
           
            if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] == 0) {
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $fileExtension = strtolower(pathinfo($_FILES['cover_image']['name'], PATHINFO_EXTENSION));

                if (in_array($fileExtension, $allowedExtensions)) {
                    $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\Images\book cover images';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true); 
                    }
                    $filename= uniqid() . '.' . $fileExtension;
                    $filePath = $uploadDir. '\\' . $filename; 
                    if (!file_exists($_FILES['cover_image']['tmp_name'])) {
                        echo "Temporary file does not exist!<br>";
                    }
                    if (!is_dir($uploadDir)) {
                        echo "Directory does not exist. Creating: $uploadDir<br>";
                        mkdir($uploadDir, 0777, true); // Creates directory if missing
                    }
                    if (!is_writable($uploadDir)) {
                        echo "Directory is not writable: $uploadDir<br>";
                    }
                    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $filePath)) {
                        $bookData['cover_image'] = $filename;
                    } else {
                        echo "Error uploading cover image!";
                        // $this->view('addBook', $bookData);
                        return;
                    }
                } else {
                    echo "Invalid file type!";
                    // $this->view('addBook', $bookData);
                    return;
                }
            } else {
                echo "Cover image is required!";
                // $this->view('addBook', $bookData);
                return;
            }

            // Validate and save the book data
            // if ($bookModel->validate($bookData)) {
                echo("Validation passed");
                if ($bookModel->insert($bookData)) {
                    redirect('bookSellerListings');
                } else {
                    echo "Something went wrong!";
                }
            // } else {
            //     echo("Validation failed");
                // $this->view('addBook', $bookData);
            // }
        } else {
            echo("addBook GET request");
            $this->view('addBook');
        }
    }
}