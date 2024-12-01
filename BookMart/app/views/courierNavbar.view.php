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
                <select id="orders" name="orders" class="navbar-links-select" >
                    <option value="" disabled selected>Orders</option>
                    <option value="all"><a href="<?= ROOT ?>/courierOrders">All Orders</a></option>
                    <option value="accepted">Accepted Orders</option>
                    <option value="pending">Pending Orders</option>
                    <option value="completed">Completed Orders</option>
                </select>
                <a href="<?= ROOT ?>/CourierProfile" class="navbar-links">My Profile</a>
                <a href="<?= ROOT ?>/Login" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <button class="navbar-links-select" id="logoutButton">Log Out</button>
            </div>
    </div>