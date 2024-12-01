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
            <li><a href="<?= ROOT ?>/adminViewContactUs" class="active"><i class="fa-solid fa-envelope"></i>Complaints</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    
    <main>
        <h1 class="mtopic">Contact Us Forms</h1> <br><br>
        
            
            <br>
            <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('new-details')">New Forms</button>
                <button class="tab-button" onclick="showTab('bank-details')">Viewed</button>
            </nav>
    
            <!-- <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/registerCourier"  > -->
                <div class="tab-content" id="new-details">
                    
                    
                          <div class="table-wrapper">
                            <table>
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>E-mail</th>
                                  <th>Message</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if(!empty($contactform)): ?>
                                  <?php foreach ($contactform as $contactdetails): ?>
                                <tr>
                                  <td><?= $contactdetails->id ?></td>
                                  <td><?= $contactdetails->name ?></td>
                                  <td><?= $contactdetails->email ?></td>
                                  <td><?= $contactdetails->message ?></td>
                                  <td>
                                  <form action="<?= ROOT ?>/adminViewContactUs/update" method="POST">
                                    <input type="hidden" name="contactform_id" value="<?= $contactdetails->id ?>"> 
                                    <button type="submit" class="view-btn">Mark As Read</button>
                                    </form>
                                  </td>
                                </tr>
                                    <?php endforeach; ?>
                                  <?php else: ?>
                                    <p>No submited forms</p>
                                  <?php endif; ?>
                                <!-- <tr>
                                  <td>002</td>
                                  <td>Kasun</td>
                                  <td>Kasun@gmail.com</td>
                                  <td>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>
                                  <td><button class="view-btn">View</button></td>
                                </tr>
                                <tr>
                                    <td>002</td>
                                    <td>Kasun</td>
                                    <td>Kasun@gmail.com</td>
                                    <td>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>
                                    <td><button class="view-btn">View</button></td>
                                  </tr>
                                  <tr>
                                    <td>002</td>
                                    <td>Kasun</td>
                                    <td>Kasun@gmail.com</td>
                                    <td>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>
                                    <td><button class="view-btn">View</button></td>
                                  </tr> -->
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
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Message</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if(!empty($markedcontact)): ?>
                                  <?php foreach ($markedcontact as $contactdetails): ?>
                                <tr>
                                  <td><?= $contactdetails->id ?></td>
                                  <td><?= $contactdetails->name ?></td>
                                  <td><?= $contactdetails->email ?></td>
                                  <td><?= $contactdetails->message ?></td>
                                  <td>
                                    <form action="<?= ROOT ?>/adminViewContactUs/delete" method="POST">
                                    <input type="hidden" name="contactform_id" value="<?= $contactdetails->id ?>"> 
                                    <button type="submit" class="view-btn">Delete</button>
                                    </form>
                                  </td>
                                </tr>
                                    <?php endforeach; ?>
                                  <?php else: ?>
                                    <!-- <p>No submited forms</p> -->
                                  <?php endif; ?>

                              <!-- <tr>
                                <td>002</td>
                                <td>Kasun</td>
                                <td>Kasun@gmail.com</td>
                                <td>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>
                                <td><button class="view-btn">Delete</button></td>
                              </tr>
                              <tr>
                                  <td>002</td>
                                  <td>Kasun</td>
                                  <td>Kasun@gmail.com</td>
                                  <td>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>
                                  <td><button class="view-btn">Delete</button></td>
                                </tr>
                                <tr>
                                  <td>002</td>
                                  <td>Kasun</td>
                                  <td>Kasun@gmail.com</td>
                                  <td>kkkkkkkkkkkkkkkkkkkkkkkkkkkkkk</td>
                                  <td><button class="view-btn">Delete</button></td>
                                </tr> -->
                            </tbody>
                          </table>
                        </div>
                      
                    </main>
                </div>
                    

   
    <script src="<?= ROOT ?>/assets/JS/adminViewContactUs.js"></script>
</body>
</html>