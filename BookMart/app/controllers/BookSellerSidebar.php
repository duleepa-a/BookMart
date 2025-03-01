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
                        mkdir($uploadDir, 0777, true);
                    }
                    if (!is_writable($uploadDir)) {
                        echo "Directory is not writable: $uploadDir<br>";
                    }
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
            } else {
                echo "Cover image is required!";
                return;
            }

            echo("Validation passed");
            if ($bookModel->insert($bookData)) {
                // Get the last inserted book ID using the bookModel
                $query = "SELECT id FROM book WHERE seller_id = :seller_id ORDER BY id DESC LIMIT 1";
                $data = ['seller_id' => $_SESSION['user_id']];
                $result = $bookModel->query($query, $data);
                
                if ($result) {
                    // Insert into listing table using the bookModel
                    $listingQuery = "INSERT INTO book_status (book_id, seller_id) VALUES (:book_id, :seller_id)";
                    $listingData = [
                        'book_id' => $result[0]->id,
                        'seller_id' => $_SESSION['user_id']
                    ];
                    
                    if (!$bookModel->query($listingQuery, $listingData)) {
                        redirect('bookSellerListings');
                    } else {
                        echo "Error creating listing!";
                    }
                } else {
                    echo "Error retrieving book ID!";
                }
            } else {
                echo "Something went wrong!";
            }
        } else {
            echo("addBook GET request");
            $this->view('addBook');
        }
    }
}