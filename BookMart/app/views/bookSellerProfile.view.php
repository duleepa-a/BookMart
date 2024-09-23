<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/CSS/bookSellerProfile.css">    <!-- Edit path later -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>My Profile</title>
</head>

<body>

    <div class="navBar">        <!-- NavBar division begin -->
        <span class = "title">
            <h2>Book<span class="highlight">Mart</span></h2>
        </span>
        <div class="search-bar-div">
            <input type="text" class="search-bar" placeholder="Search your book, bookstore" />
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
        </div>
        <div class="nav-links">
                <select id="genres" name="genres" class="transperant-bttn" >
                    <option value="" disabled selected>Genres</option>
                    <option value="fiction">Fiction</option>
                    <option value="novels">Novels</option>
                    <option value="history">History</option>
                </select>
                <a href="./Login.html" class="transperant-bttn">My Profile</a>
                <a href="./Login.html" class="transperant-bttn">Orders</a>
                <a href="./Login.html" class="transperant-bttn">Chat</a>
                <a href="./Login.html" class="transperant-bttn"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="./Login.html" class="transperant-bttn"><i class="fa-solid fa-bell"></i></a>
                <button class="transperant-bttn">Log Out</button>
            </div>
    </div>                      <!-- NavBar division end -->
    
    <br><br>
  
    <div class="background-box">    <!-- Inner background box begin -->  
        <h1 class="title-text">My Profile</h1>
    
        <br><br>

        <nav class="tabs">      <!-- Title tabs begin -->
            <button class="tab-button active first-child" onclick="showTab('BookSeller-details',event)">Personal Details</button>
            <button class="tab-button" onclick="showTab('Bank-details',event)">Bank Details</button>
            <button class="tab-button last-child" onclick="showTab('Password change',event)">Password Change</button>
        </nav>                  <!-- Title tabs end -->

        <br>

        <form id="BookSellerProfile"  class="profile">  
            <div class="tab-content" id="BookSeller-details">   <!-- BookSeller Personal Details begin -->
              
                    <div class="profile-group">
                        <label for="First-Name">First Name:</label>
                        <input type="text" id="first-name" placeholder="First Name">
                    </div>

                    <div class="profile-group">
                        <label for="Last-Name">Last Name:</label>
                        <input type="text" id="last-name" placeholder="Last Name">
                    </div>
                
                    <div class="profile-group">
                        <label for="Name">Name With Initials:</label>
                        <input type="text" id="initial-name" placeholder="Name With Initials">
                    </div>

                    <div class="profile-group">
                        <label for="Email">Email Address:</label>
                        <input type="email" id="Email" placeholder="Email Address">
                    </div>

                    <div class="profile-group">
                        <label for="Phone-Number"> Phone Number:</label>
                        <input type="text" id="Phone-Number" placeholder="Phone Number">
                    </div>
               
                <button class="save-button" onclick="showTab('BookSeller-details')">Change & Save</button>
            
            </div>                                                  <!-- BookSeller Personal Details end -->

            <div class="tab-content" id="Bank-details">             <!-- BookSeller Bank Details begin -->
              
                    <div class="profile-group">
                        <label for="Bank">Bank Name:</label>
                        <input type="text" id="Bank-name" placeholder="Bank Name">
                    </div>

                    <div class="profile-group">
                        <label for="Branch">Branch Name:</label>
                        <input type="text" id="Branch-name" placeholder="Branch Name">
                    </div>
                
                    <div class="profile-group">
                        <label for="AccNumber">Account Number:</label>
                        <input type="text" id="AccountNumber" placeholder="Account Number">
                    </div>

                    <div class="profile-group">
                        <label for="AccName">Account Name:</label>
                        <input type="text" id="AccountName" placeholder="Account Name">
                    </div>
               
                <button class="save-button" onclick="showTab('Bank-details')" >Change & Save</button>
            
            </div>                                                  <!-- BookSeller Personal Details end -->

            <div class="tab-content" id="Password change">          <!-- BookSeller Password change begin -->

                <div class="profile-group-row">
                    <div class="profile-group">
                        <label for="current-password">Current password:</label>
                        <input type="password" id="current-password" placeholder="Enter Current Password">
                    </div>
                    <div class="profile-password">
                        <a href="#">Forgot Password?</a>
                    </div>
                </div>

                <br>
                <div class="profile-group-row">
                    <div class="profile-group">
                        <label for="new-password">New password:</label>
                        <input type="password" id="new-password" placeholder="Enter New Password">
                    </div>

                    <div class="profile-group">
                        <label for="confirm-password">Confirm new password:</label>
                        <input type="password" id="confirm-password" placeholder="Re enter New Password">
                    </div>
                </div>

                <button class="save-button" onclick="showTab('Password change')" >Change & Save</button>
            </div>                                              <!-- BookSeller Password change end -->

    </div>                          <!-- Inner background box end -->

    <br><br>

    <div class="footer">    <!-- Footer division begin -->
        <div class="links">
            <a href="./contactUs.html">Contact Us</a><br><br>
            <a href="./aboutUs.html">About Us</a>
        </div>
        <br>
        <div class="copyright">
            &copy; 2024 BookMart. All rights reserved.
        </div>
    </div>                  <!-- Footer division end -->

    <script src="../../public/assets/JS/bookSellerProfile.js"></script>

</body>
