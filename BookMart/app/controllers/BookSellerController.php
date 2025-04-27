<?php

class BookSellerController extends Controller{

    public function index(){
        $this->view('bookSellerHome');
    }

    public function listings() {
        $id=$_SESSION['user_id'];
        $books = $this->getBooksByBookSeller($id);

        $data = ['inventory' => $books,
                ];
        $this->view('bookSellerListings',$data);
    }

    public function addBook(){
        $bookModel = new BookModel();
        echo("addBook");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo("addBook POST in");

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

            if ($bookModel->insert($bookData)) {
                redirect('bookSellerController/listings');
            } else {
                echo "Something went wrong!";
            }
        } else {
            echo("addBook GET request");
            $this->view('addBook');
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

            show($bookData);

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
            if (!($bookModel->update($bookId, $bookData))) {
                redirect('bookSellerController/listings');
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
        redirect('bookSellerController/listings');
        
    }

    public function getBooksByBookSeller($id) {
        $bookModel = new BookModel();

        return $bookModel->where(['seller_id' => $id], ['status' => 'removed']) ?? null;

    }

    public function myProfile(){
        $bookSellerModel = new BookSeller();
        $userModel = new UserModel();
        $data = ['user_id' => $_SESSION['user_id']];
        
        $bookSeller=$bookSellerModel->first($data);
        $user = $userModel->first(['ID' => $_SESSION['user_id']]);
        $bookSeller->email = $user->email;
        $bookSeller->username = $user->username;

        $bookSellerData = ['bookSeller' => $bookSeller];
        $this->view('bookSellerProfile',$bookSellerData);
    }

    public function register(){
        $this->view('bookSellerRegister');
    }
    
    public function updatePersonalDetails() {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
            return;
        }
    
        $bookSellerModel = new BookSeller();
        $userId = $bookSellerModel->first(['user_id' => $_SESSION['user_id']])->id;
    
        $data = [
            'full_name' => trim($_POST['full-name'] ?? ''),
            'gender' => $_POST['gender'] ?? null,
            'dob' => $_POST['dob'] ?? null,
            'phone_number' => trim($_POST['phone-number'] ?? ''),
            'street_address' => trim($_POST['street-address'] ?? ''),
            'city' => $_POST['city'] ?? null,
            'district' => $_POST['district'] ?? null,
            'province' => $_POST['province'] ?? null,
        ];
    
    
        $bookSellerModel->update($userId, $data);
    
        $_SESSION['success'] = "Your personal details have been updated successfully!";

        $this->myProfile();
    }

    public function uploadProfilePicture(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture'])) {
            $image = $_FILES['profile_picture'];

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $extension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

            if (!in_array($extension, $allowedExtensions)) {
                echo "Invalid image file type.";
                $_SESSION['error'] ='Invalid image file type.';
                return;
            }

            $uniqueName = uniqid('adv_', true) . '.' . $extension;
            $uploadDir = 'C:\xampp\htdocs\BookMart\public\assets\Images\bookstore-profile-pics';
            $uploadPath = $uploadDir . '\\' . $uniqueName;

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            if (!move_uploaded_file($image['tmp_name'], $uploadPath)) {
                $_SESSION['error'] ='File upload failed';
                echo json_encode(['status' => 'error', 'message' => 'File upload failed']);
            }

            $imagePath = $uniqueName;
            $targetPath = '\assets\Images\bookstore-profile-pics'. '\\' . $imagePath;

            $bookSellerModel = new BookSeller();
            $seller=$bookSellerModel->first(['user_id' => $_SESSION['user_id']]);

            $bookSellerModel->update($seller->id,['profile_picture' => $imagePath]);
            
            $_SESSION['success'] ='profile picture uploaded successfully';
            echo json_encode([
                'status' => 'success',
                'imageUrl' => ROOT  . $targetPath
            ]);
           
        } else {
            $_SESSION['error'] ='Invalid request';
            echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
        }
    }

    public function updateBankDetails(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bank = $_POST['bank'] ?? '';
            $branchName = $_POST['branch-name'] ?? '';
            $accountNumber = $_POST['account-number'] ?? '';
            $accountName = $_POST['account-name'] ?? '';

            $errors = [];

            if (empty($bank)) $errors['bank'] = "Bank is required.";
            if (empty($branchName)) $errors['branch-name'] = "Branch name is required.";
            if (!preg_match('/^\d{6,20}$/', $accountNumber)) $errors['account-number'] = "Invalid account number.";
            if (empty($accountName)) $errors['account-name'] = "Account holder name is required.";

            if (empty($errors)) {
                $sellerModel = new BookSeller();
                $userId = $_SESSION['user_id'] ?? null;

                if ($userId) {
                    $seller = $sellerModel->first(['user_id' => $userId]);

                    if ($seller) {
                        $sellerModel->update($seller->id, [
                            'bank' => $bank,
                            'branch_name' => $branchName,
                            'account_number' => $accountNumber,
                            'account_name' => $accountName,
                        ]);

                        $this->myProfile(); 
                    } else {
                        $_SESSION['error'] = "Seller not found.";
                        redirect('login');
                    }
                } else {
                    $_SESSION['error'] = "You must be logged in.";
                    redirect('login');
                }
            } else {
                $_SESSION['form_errors'] = $errors;
                $this->myProfile(); 
            }
        }
    }

    public function updateLoginDetails() {
        if (!isset($_SESSION['user_id'])) {
            redirect('login');
            return;
        }
    
        $userId = $_SESSION['user_id'];
        $newUsername = trim($_POST['username'] ?? '');
    
        if (empty($newUsername)) {
            $_SESSION['error'] = "Username cannot be empty.";
            $this->myProfile();
            return;
        }

        $userModel = new UserModel();
      
    
        if ($userModel->isUsernameTaken($newUsername)) {
            $_SESSION['error'] = "This username is already taken.";
            $this->myProfile();
            return;
        }
    
        $userModel->update($userId, ['username' => $newUsername]);
    
        $_SESSION['success'] = "Username updated successfully!";
        $this->myProfile();
    }
    

}
