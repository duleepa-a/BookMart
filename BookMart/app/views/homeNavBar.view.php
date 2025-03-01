<div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
        <div class="search-bar-div">
            <form action="<?= ROOT ?>/book/search" method="GET" class="search-form ">
                <input 
                    type="text" 
                    name="keyword" 
                    class="search-bar" 
                    placeholder="Search your book, bookstore"
                    required  
                />
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
            </form>
        </div>
        <div class="nav-links">
            <select id="genres" name="genres" class="navbar-links-select" onchange="navigateToGenre()">
                <option value="" disabled selected>Genres</option>
                <option value="fiction">Fiction</option>
                <option value="novels">Novels</option>
                <option value="history">History</option>
                <option value="romance">Romance</option>
            </select>
            <?php if (!isset($_SESSION['user_status'])): ?>
                <!-- Links for guests -->
                <a href="<?= ROOT ?>/Login" class="navbar-links">Log In</a>
                <a href="<?= ROOT ?>/Register" class="navbar-links">Sign In</a>
            <?php else: ?>
                <!-- Links for logged-in users -->
                <?php if ($_SESSION['user_role'] == 'bookStore'): ?>
                    <!-- Links for bookstore -->
                    <select id="menu" name="menu" class="navbar-links-select" >
                        <option value="" disabled selected>Menu</option>
                        <option value="My-Inventory">My Inventory</option>
                        <option value="Analytics">Analytics</option>
                        <option value="Orders">Orders</option>
                        <option value="Reviews">Reviews</option>
                        <option value="Ads">Ads & Offers</option>
                    </select>
                    <a href="<?= ROOT ?>/bookstoreProfile" class="navbar-links">My Profile</a>
                    <a href="<?= ROOT ?>/Chat" class="navbar-links">Chat</a>
                    <a href="" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <?php elseif ($_SESSION['user_role'] == 'buyer'): ?>
                    <!-- Links for buyer -->
                    <a href="<?= ROOT ?>/buyer/myProfile" class="navbar-links">My Profile</a>
                    <a href="<?= ROOT ?>/buyer/orders" class="navbar-links">Orders</a>
                    <a href="<?= ROOT ?>/Chat" class="navbar-links">Chat</a>
                    <a href="" class="navbar-links"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
                    <a href="" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <?php elseif ($_SESSION['user_role'] == 'bookSeller'): ?>
                    <!-- Links for bookseller -->
                    <a href="./bookSellerProfile" class="navbar-links">Profile</a>
                    <a href="./bookSellerListings" class="navbar-links">Listings</a>
                    <a href="./bookSellerSales" class="navbar-links">Sales</a>
                    <a href="./articles" class="navbar-links">Articles</a>
                    <a href="" class="navbar-links"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href="./notifications" class="navbar-links"><i class="fa-solid fa-bell"></i></a>
                <?php elseif ($_SESSION['user_role'] == 'admin'): ?>
                    <!-- Links for admin -->
                    <a href="" class="navbar-links">My Profile</a>
                    <a href="<?= ROOT ?>/Chat" class="navbar-links">Chat</a>
                    <a href="" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <?php elseif ($_SESSION['user_role'] == 'courier'): ?>
                    <!-- Links for courier -->
                    <select id="orders" name="orders" class="navbar-links-select" >
                        <option value="" disabled selected>Orders</option>
                        <option value="all"><a href="<?= ROOT ?>/courierOrders">All Orders</a></option>
                        <option value="accepted">Accepted Orders</option>
                        <option value="pending">Pending Orders</option>
                        <option value="completed">Completed Orders</option>
                    </select>
                    <a href="<?= ROOT ?>/CourierProfile" class="navbar-links">My Profile</a>
                    <a href="<?= ROOT ?>/Login" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <?php endif; ?>

                <!-- Log Out button for all roles -->
                <button id="logoutButton" class="navbar-links-select">Log Out</button>
            <?php endif; ?>
        </div>
     
    </div> 
    <!--navBar division end -->

<script>
    function navigateToGenre() {
        const genreSelect = document.getElementById('genres');
        const selectedGenre = genreSelect.value;
        if (selectedGenre) {
            window.location.href = "<?= ROOT ?>/bookByGenres/" + selectedGenre;
        }
    }
    document.getElementById('logoutButton').addEventListener('click', function() {
    
    fetch('http://localhost/BookMart/public/user/logout', { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            return response.json(); 
            throw new Error('Logout failed.');
        }
    })
    .then(data => {
        console.log(data); 
        if (data.status === 'success') {
            window.location.href = 'http://localhost/BookMart/public/'; 
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error during logout:', error);
        alert('Logout failed. Please try again.');
    });
});
</script>
<link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/navBar.css">


