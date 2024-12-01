<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminBookstore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Advertisements</title>
</head>
<body>
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
                <select id="genres" name="genres" class="navbar-links-select" >
                    <option value="" disabled selected>Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="novels">Novels</option>
                    <option value="history">History</option>
                </select>
                <a href="" class="navbar-links">My Profile</a>
                <a href="" class="navbar-links"><i class="fa-solid fa-bell fa-lg"></i></a>
                <button id="logoutButtonAdmin" class="navbar-links-select">Log Out</button>
        </div>
    </div>
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/" class="active" ><i class="Dashboard"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers" class="active" ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>

    <div class="container">
        <div class="box">
                <h1>Book Stores</h1>
                <nav class="tabs">
                    <button class="tab-button active first-child" onclick="showTab('pending-stores',event)">Pending Requests</button>
                    <button class="tab-button" onclick="showTab('all-stores',event)">All Stores</button>
                    <button class="tab-button last-child" onclick="showTab('accept-stores',event)">Accepted Stores</button>
                </nav>
            <div class="tab-content" id="pending-stores">
                <input type="text" id="searchInput" onkeyup="searchStores()" placeholder="Search...">
                <?php if (isset($pendingStores) && !empty($pendingStores)): ?>
                <table id="storesTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Street Address</th>
                            <th>Owner Name</th>
                            <th>Owner Email</th>
                            <th>Date Requested</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pendingStores as $store): ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><?= htmlspecialchars($store->store_name) ?></td>
                            <td><?= htmlspecialchars($store->manager_email) ?></td>
                            <td><?= htmlspecialchars($store->manager_phone_number) ?></td>
                            <td><?= htmlspecialchars($store->street_address) ?></td>
                            <td><?= htmlspecialchars($store->owner_name) ?></td>
                            <td><?= htmlspecialchars($store->owner_email) ?></td>
                            <td><?= htmlspecialchars($store->createdAt) ?></td>
                            <td><a href="<?= ROOT ?>/admin/viewBookStore/<?= $store->id ?>" class="view-btn">View</a></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="message-container">
                        <h2 class="empty-message">No pending bookstores at the moment.</h2>
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="tab-content" id="all-stores" style="display: none;">
                <input type="text" id="searchInput" onkeyup="searchStores()" placeholder="Search...">
                <?php if (isset($allStores) && !empty($allStores)): ?>
                <table id="storesTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Street Address</th>
                            <th>Owner Name</th>
                            <th>Owner Email</th>
                            <th>Date Requested</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allStores as $store): ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><?= htmlspecialchars($store->store_name) ?></td>
                            <td><?= htmlspecialchars($store->manager_email) ?></td>
                            <td><?= htmlspecialchars($store->manager_phone_number) ?></td>
                            <td><?= htmlspecialchars($store->street_address) ?></td>
                            <td><?= htmlspecialchars($store->owner_name) ?></td>
                            <td><?= htmlspecialchars($store->owner_email) ?></td>
                            <td><?= htmlspecialchars($store->createdAt) ?></td>
                            <td><a href="<?= ROOT ?>/admin/viewBookStore/<?= $store->id ?>" class="view-btn">View</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                        <div class="message-container">
                        <h2 class="empty-message">No bookstores registered at the moment.</h2>
                        </div>
                <?php endif; ?>
            </div>

            <div class="tab-content" id="accept-stores" style="display: none;">
                <input type="text" id="searchInput" onkeyup="searchStores()" placeholder="Search...">
                <?php if (isset($acceptedStores) && !empty($acceptedStores)): ?>
                <table id="storesTable">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Street Address</th>
                            <th>Owner Name</th>
                            <th>Owner Email</th>
                            <th>Date Requested</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($acceptedStores as $store): ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><?= htmlspecialchars($store->store_name) ?></td>
                            <td><?= htmlspecialchars($store->manager_email) ?></td>
                            <td><?= htmlspecialchars($store->manager_phone_number) ?></td>
                            <td><?= htmlspecialchars($store->street_address) ?></td>
                            <td><?= htmlspecialchars($store->owner_name) ?></td>
                            <td><?= htmlspecialchars($store->owner_email) ?></td>
                            <td><?= htmlspecialchars($store->createdAt) ?></td>
                            <td><button class="view-btn">View</button></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="message-container">
                        <h2 class="empty-message">No accepted bookstores at the moment.</h2>
                        </div>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
  <script src="<?= ROOT ?>/assets/JS/adminBookstore.js"></script>
    </body>
    </html>