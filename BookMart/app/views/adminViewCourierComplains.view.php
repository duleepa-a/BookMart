<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Courier Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"><!--bell icon-->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminViewContactUs.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                <select id="orders" name="orders" class="navbar-links-select" >
                    <option value="" disabled selected>Orders</option>
                    <option value="all">All Orders</option>
                    <option value="accepted">Accepted Orders</option>
                    <option value="pending">Pending Orders</option>
                    <option value="completed">Completed Orders</option>
                </select>
                <a href="<?= ROOT ?>/CourierProfile" class="navbar-links">My Profile</a>
                <a href="<?= ROOT ?>/Login" class="navbar-links"><i class="fa-solid fa-bell"></i></a>
                <button class="navbar-links-select" id="logoutButton">Log Out</button>
            </div>
    </div>
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers"  ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminViewContactUs" ><i class="fa-solid fa-envelope"></i>Complaints</a></li>
            <li><a href="<?= ROOT ?>/adminViewCourierComplains" class="active"><i class="fa-solid fa-circle-exclamation"></i>Complains</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    
    <main>
        <h1 class="mtopic">Courier Complains</h1> <br><br>
        
            
            <br>
            <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('new-details')">New Complains</button>
                <button class="tab-button" onclick="showTab('bank-details')">Viewed</button>
            </nav>
    
                <div class="tab-content" id="new-details">
                    
                    
                          <div class="table-wrapper">
                            <table>
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <!-- <th>Courier ID</th> -->
                                  <th>Order ID</th>
                                  <th>Complain</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if(!empty($complains)): ?>
                                  <?php foreach ($complains as $complain): ?>
                                <tr>
                                <td><?= $complain->id ?></td>
                                  <td><?= $complain->order_id ?></td>
                                  <td><?= $complain->complain ?></td>
                                  <td>
                                  <form action="<?= ROOT ?>/adminViewCourierComplains/update" method="POST">
                                    <input type="hidden" name="complain_id" value="<?= $complain->id ?>"> 
                                    <button type="submit" class="view-btn">Mark As Read</button>
                                    </form>
                                  </td>
                                </tr>
                                    <?php endforeach; ?>
                                  <?php else: ?>
                                    <p>No Complains</p>
                                  <?php endif; ?>
                              
                              </tbody>
                            </table>
                          </div>
                        </div>
                    
                    

    
    
                <div class="tab-content" id="bank-details" style="display: none;">
                        <div class="table-wrapper">
                          <table>
                            <thead>
                              <tr>
                                  <th>ID</th>
                                  <!-- <th>Courier ID</th> -->
                                  <th>Order ID</th>
                                  <th>Complain</th>
                                  <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($markedcomplains)): ?>
                                  <?php foreach ($markedcomplains as $complain): ?>
                                <tr>
                                  <td><?= $complain->id ?></td>
                                  <td><?= $complain->order_id ?></td>
                                  <td><?= $complain->complain ?></td>
                                  <!-- <td><?= $complain->message ?></td> -->
                                  <td>
                                    <form action="<?= ROOT ?>/adminViewCourierComplains/delete" method="POST">
                                    <input type="hidden" name="complain_id" value="<?= $complain->id ?>"> 
                                    <button type="submit" class="view-btn">Delete</button>
                                    </form>
                                  </td>
                                </tr>
                                    <?php endforeach; ?>
                                  <?php else: ?>
                                    <p>No Complains</p>
                                  <?php endif; ?>

                              
                            </tbody>
                          </table>
                        </div>
                      
                    </main>
                </div>
                    

   
    <script src="<?= ROOT ?>/assets/JS/adminViewContactUs.js"></script>
</body>
</html>