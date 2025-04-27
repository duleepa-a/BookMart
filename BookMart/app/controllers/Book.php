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
        $query = "
                SELECT 
                        b.*,
                        COUNT(o.order_id) AS total_sales
                    FROM 
                        book b
                    LEFT JOIN 
                        orders o ON b.id = o.book_id
                    WHERE 
                        b.status = 'available'
                        AND b.genre IN ('fiction', 'history', 'novel', 'romance', 'mystery', 'horror', 'young-adult', 'sci-fi', 'crime')
                        AND (o.order_status IS NULL OR o.order_status != 'canceled')
                    GROUP BY 
                        b.id
                    ORDER BY 
                        total_sales DESC
            ";
        $books= $bookModel->query($query);

        $groupedBooks = [];

        if (!is_array($books) && !is_object($books)) {
            return [];  
        }
    
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
        return $bookModel->where(['seller_id' => $bookstoreId, 'status' => 'available']);
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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $bookData = [
                'title' => trim($_POST['title']),
                'ISBN' => trim($_POST['ISBN']),
                'author' => trim($_POST['author']),
                'genre' => trim($_POST['genre']),
                'publisher' => trim($_POST['publisher']),
                'price' => filter_var(trim($_POST['price']), FILTER_VALIDATE_FLOAT),
                'discount' => filter_var(trim($_POST['discount']), FILTER_VALIDATE_FLOAT),
                'quantity' => filter_var(trim($_POST['quantity']), FILTER_VALIDATE_INT),
                'book_condition' => trim($_POST['book_condition']),
                'language' => trim($_POST['language']),
                'description' => trim($_POST['description']),
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
                        $_SESSION['error'] =  "Temporary file does not exist!<br>";
                        redirect('BookstoreController/inventory');
                        return;
                    }
                    if (!is_dir($uploadDir)) {
                        $_SESSION['error'] =  "Directory does not exist. Creating: $uploadDir<br>";
                        mkdir($uploadDir, 0777, true);
                        redirect('BookstoreController/inventory');
                        return;
                    }
                    if (!is_writable($uploadDir)) {
                       $_SESSION['error'] = "Directory is not writable: $uploadDir<br>";
                       redirect('BookstoreController/inventory');
                       return;
                    }
                    if (move_uploaded_file($_FILES['cover_image']['tmp_name'], $filePath)) {
                        $bookData['cover_image'] = $filename;
                    } else {
                        $_SESSION['error'] =  "Error uploading cover image!";
                        redirect('BookstoreController/inventory');
                        return;
                    }
                } else {
                    $_SESSION['error'] =  "Invalid file type!";
                    redirect('BookstoreController/inventory');
                    return;
                }
            } else {
                $_SESSION['error'] =  "Cover image is required!";
                redirect('BookstoreController/inventory');
                return;
            }

                if ($bookModel->insert($bookData)) {
                    $_SESSION['success'] = "successfully added";
                    redirect('BookstoreController/inventory');
                    return;
                } else {
                    $_SESSION['error'] =  "Something went wrong!";
                    redirect('BookstoreController/inventory');
                    return;
                }
        } else {
            redirect('BookstoreController/inventory');
            return;
        }
    }

    public function updateBook(){
        $bookModel = new BookModel();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $bookId = $_POST['book_id'];

            $bookData = [
                'title' => trim($_POST['title']),
                'ISBN' => trim($_POST['ISBN']),
                'author' => trim($_POST['author']),
                'genre' => trim($_POST['genre']),
                'publisher' => trim($_POST['publisher']),
                'price' => filter_var(trim($_POST['price']), FILTER_VALIDATE_FLOAT),
                'discount' => filter_var(trim($_POST['discount']), FILTER_VALIDATE_FLOAT),
                'quantity' => filter_var(trim($_POST['quantity']), FILTER_VALIDATE_INT),
                'book_condition' => trim($_POST['book_condition']),
                'language' => trim($_POST['language']),
                'description' => trim($_POST['description']),
            ];

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
                        $_SESSION['error'] = "Error uploading cover image!";
                        redirect('BookstoreController/inventory');
                        return;
                    }
                } else {
                    $_SESSION['error'] = "Invalid file type!";
                    redirect('BookstoreController/inventory');
                    return;
                }
            }

            if (!($bookModel->update($bookId, $bookData))) {

                $_SESSION['success'] = "Successfully added";
                redirect('BookstoreController/inventory');
            } else {
                $_SESSION['error'] = "Something went wrong while updating the book!";
                redirect('BookstoreController/inventory');
            }
        } else {
            $_SESSION['error'] = "Invalid request method!";
            redirect('BookstoreController/inventory');
        }
    }

    public function deleteBook(){
        $bookModel = new BookModel();
        $id = $_POST['book_id'];
        
        show($id);
        $bookModel->update($id,['status' => 'removed']);
        $_SESSION['success'] = "Successfully updated";
        redirect('BookstoreController/inventory');
        
    }
}