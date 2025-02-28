<div class="navBar">        <!-- navBar division begin -->
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
            <select id="genres" name="genres" class="navbar-links-select" >
                <option value="" disabled selected>Genres</option>
                <option value="fiction">Fiction</option>
                <option value="novels">Novels</option>
                <option value="history">History</option>
            </select>
            <a href="./chat" class="navbar-links">Chat</a>
            <a href="" class="navbar-links"><i class="fa-solid fa-cart-shopping"></i></a>
            <a href="./notifications" class="navbar-links"><i class="fa-solid fa-bell"></i></a>
            <button id="logoutButtonBookSeller" class="navbar-links-select">Log Out</button>
    </div>
</div>                  <!-- navBar division end -->

<link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerNavBar.css">


