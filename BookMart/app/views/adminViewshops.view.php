<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminViewusers.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"><!--bell icon-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>view shops</title>
</head>
<body>
<!-- navBar division begin -->
<?php include 'adminNavBar.view.php'; ?>
    <!-- navBar division end -->
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers"  ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile" class="active"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>

<div class="container">
    <h2>User Information</h2>
    <div class="box">
        <div class="user-info">
            <div class="info-row">
                <span class="label">Name:</span>
                <span class="value" id="userName">Reading Corner</span>
            </div>
            <div class="info-row">
                <span class="label">Shop ID:</span>
                <span class="value" id="sellerId">BS001</span>
            </div>
            <div class="info-row">
                <span class="label">Location:</span>
                <span class="value" id="location">278A Delkada Colombo</span>
            </div>
            <div class="info-row">
                <span class="label">Email:</span>
                <span class="value" id="location">readingcorner@gmail.com</span>
            </div>
            <div class="info-row">
                <span class="label">Phone Number:</span>
                <span class="value" id="phoneNumber">0713989143</span>
            </div>
            <div class="info-row">
                <span class="label">Account created:</span>
                <span class="value" id="accountCreated">2024 January 25</span>
            </div>
            <div class="info-row">
                <span class="label">Last Login:</span>
                <span class="value" id="lastLogin">2024 December 23</span>
            </div>
            <div class="info-row">
                <span class="label">Status:</span>
                <span class="value" id="status">Active</span>
            </div>
        </div>
        <div class="button-group">
            <button class="btn suspendBtn">Suspend</button>
            <button class="btn deleteUserBtn">Delete User</button>
            <a href="<?= ROOT ?>/adminSendmsg" class="btn messageBtn">Send Message</a>
        </div>
    </div><br>  

<!--dialog box for deletion-->
<div id="confirmationDialog" class="dialog-overlay">
    <div class="dialog-box">
        <p>Are you sure you want to delete this User?</p>
        <div class="dialog-buttons">
            <button id="cancelBtn" class="btn">Cancel</button>
            <button id="confirmDeleteBtn" class="btn">Confirm deletion</button>
        </div>
    </div>
</div>

<div id="successMessage" class="dialog-overlay">
    <div class="dialog-box">
        <p>Successfully deleted.</p>
    </div>
</div>


<div class="container">
    <h2>Listings</h2>
    <div class="box">
        <input type="text" id="searchInput" placeholder="Search...">
        <table class="table">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Genre</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sales Quantity </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>    
    </div>
</div><br>


<div class="container">
    <h2>Ratings</h2>
    <div class="box">
        <input type="text" id="searchInput" placeholder="Search...">
        <table class="table">
            <thead>
                <tr>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Rating</th>
                    <th>Reviewed user</th>
                    <th>Date</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br><br>

    <script src="<?= ROOT ?>/assets/JS/adminViewusers.js"></script>

</body>
</html>
