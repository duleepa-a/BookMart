<div class="navBar">        <!-- navBar division begin -->
    <span class = "title">
    <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
    </span>
    <div class="search-bar-div">
        <input type="text" class="search-bar" placeholder="Search your book, bookstore" />
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
    </div>
    <div class="nav-links">
            <select id="genres" name="genres" class="navbar-links-select" >
                <option value="" disabled selected>Genres</option>
                <option value="fiction">Fiction</option>
                <option value="novels">Novels</option>
                <option value="history">History</option>
            </select>
            <a href="./bookSellerProfile" class="navbar-links">Profile</a>
            <a href="./bookSellerListings" class="navbar-links">Listings</a>
            <a href="./bookSellerSales" class="navbar-links">Sales</a>
            <a href="" class="navbar-links">Chat</a>
            <a href="" class="navbar-links"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="" class="navbar-links"><i class="fa-solid fa-bell"></i></a>
            <button id="logoutButton" class="navbar-links-select">Log Out</button>
    </div>
</div>                  <!-- navBar division end -->

<link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/index.css">