<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerSales.css">    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>My Sales</title> 
</head>

<body>
    
    <!-- navBar division begin -->
    <?php include 'bookSellerNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- navBar division begin -->
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <br><br>
    <center>
    <div class="background-box">    <!-- inner background box begin -->        
        
        <h1 class="title-text">My Sales</h1>
        
        <br><br>

        <div class="controls">  <!-- First row division begin -->
            <input type="text" placeholder="Search..." class="search-bar">
            <button>Search</button>
            <button>Filter</button>
            <button>Sort</button>
        </div>                  <!-- First row division end -->

        <table class="styled-table">    <!-- Table divison begin -->
            <thead>
                <tr>
                    <th></th>
                    <th>Book Cover</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Condition</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>The Great Gatsby</td>
                    <td>F. Scott Fitzgerald</td>
                    <td>Fiction</td>
                    <td>Rs.2000.00</td>
                    <td>Good</td>
                    <td>Available</td>
                    <td><button class="view-button">View</button></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>To Kill a Mockingbird</td>
                    <td>Harper Lee</td>
                    <td>Classic</td>
                    <td>Rs.1000.00</td>
                    <td>Like New</td>
                    <td>Delivering</td>
                    <td><button class="view-button">View</button></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>1984</td>
                    <td>George Orwell</td>
                    <td>Science Fiction</td>
                    <td>Rs.1500.00</td>
                    <td>Fair</td>
                    <td>Available</td>
                    <td><button class="view-button">View</button></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>Harry Potter and the Sorceror's Stone</td>
                    <td>J. K. Rowling</td>
                    <td>Fiction</td>
                    <td>Rs.3500.00</td>
                    <td>Fair</td>
                    <td>Available</td>
                    <td><button class="view-button">View</button></td>
                </tr>
                <tr>
                    <td><input type="checkbox" class="row-checkbox"></td>
                    <td><img src="/api/placeholder/50/75" alt="Book Cover" class="book-cover" onerror="this.onerror=null; this.src='./CSS/Images/Book Icon/Book Icon.jpeg';"></td>
                    <td>Percy Jackson and the Lighting Thief</td>
                    <td>Rick Riordan</td>
                    <td>Fiction</td>
                    <td>Rs.2500.00</td>
                    <td>Good</td>
                    <td>Available</td>
                    <td><button class="view-button">View</button></td>
                </tr>
            </tbody>
        </table>                        <!-- Table divison end -->

        <div class="controls">
            <button class="single-button">View More</button>
        </div>

    </div>                          <!-- inner background box end -->

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->

    <script src="<?= ROOT?>/assets/JS/bookSellerSales.js"></script>

</body>
