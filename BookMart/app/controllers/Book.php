<?php

class Book extends Controller{

    public function index(){
        $this->view('bookSellerHome');
    }

    public function search(){
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

        if (empty($keyword)) {
            redirect("/"); 
        }

        $bookModel = new BookModel();

        $books = $bookModel->searchBooks($keyword);

        $data = [
            'books' => $books,
            'keyword'=> $keyword
       ];

        $this->view('bookSearch',$data);
    }

    public function getNewArrivals() {
        $bookModel = new BookModel();
        return $bookModel->where(['status' => 'available']); 
    }

    public function getBestSellers() {
        $bookModel = new BookModel();
        $bookModel->setLimit(50);
        $books= $bookModel->where(['status' => 'available']);

        $groupedBooks = [];

        foreach ($books as $book) {
            $genre = $book->genre;
            if (!isset($groupedBooks[$genre])) {
                $groupedBooks[$genre] = [];
            }
            $groupedBooks[$genre][] = $book;
        }
        
        return $groupedBooks;
    }

    public function getBooksByBookstore($bookstoreId) {
        $bookModel = new BookModel();
        return $bookModel->where(['seller_id' => $bookstoreId]);
    }

    public function getBooksByGenre($genre) {
        $bookModel = new BookModel();
        return $bookModel->where(['genre' => $genre , 'status' => 'available']);
    }

    public function getReviews($id){
        $reviewModel = new ReviewModel();

        return $reviewModel->where(['book_id' => $id]);
    }

    public function addBook(){
        $bookModel = new BookModel();
        $bookstore = new BookstoreController();
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
                    redirect('BookstoreController/inventory');
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
                redirect('BookstoreController/inventory');
            } else {
                echo "Something went wrong while updating the book!";
            }
        } else {
            echo "Invalid request method!";
        }
    }

    public function deleteBook(){
        $bookModel = new BookModel();
        $id = $_POST['book_id'];
        
        show($id);
        $bookModel->update($id,['status' => 'removed']);
        redirect('BookstoreController/inventory');
        
    }
}