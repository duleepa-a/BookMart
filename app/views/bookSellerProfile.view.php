<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerProfile.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>My Profile</title> 
</head>

<body>
    
    <!-- navBar division begin -->
    <?php include 'bookSellerNavBar.view.php'; ?>
    <!-- navBar division end -->
    
    <br><br>
    <div class="background-box">    <!-- inner background box begin -->        
        
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
                    
                    <div class="profile-group-row">
                        <div class="profile-group">
                            <label for="First-Name">First Name:</label>
                            <input type="text" id="first-name" placeholder="First Name">
                        </div>

                        <div class="profile-group">
                            <label for="Last-Name">Last Name:</label>
                            <input type="text" id="last-name" placeholder="Last Name">
                        </div>
                    </div>
                    
                    <div class="profile-group-row">
                        <div class="profile-group">
                            <label for="Name">Name With Initials:</label>
                            <input type="text" id="initial-name" placeholder="Name With Initials">
                        </div>

                        <div class="profile-group">
                            <label for="Gender">Gender:</label>
                            <input type="text" id="gender" placeholder="Gender">
                        </div>

                        <div class="profile-group">
                            <label for="Date-of-Birth">Date of Birth:</label>
                            <input type="text" id="date-of-birth" placeholder="Date of Birth">
                        </div>
                    </div>
                    
                    <div class="profile-group">
                        <label for="Address">Address:</label>
                        <input type="text" id="address" placeholder="Address">
                    </div>

                    <div class="profile-group-row">
                        <div class="profile-group">
                            <label for="City">City:</label>
                            <input type="text" id="city" placeholder="City">
                        </div>

                        <div class="profile-group">
                            <label for="District">District:</label>
                            <input type="text" id="district" placeholder="District">
                        </div>

                        <div class="profile-group">
                            <label for="Province">Province:</label>
                            <input type="text" id="province" placeholder="Province">
                        </div>

                    </div>

                    <div class="profile-group-row">
                        <div class="profile-group">
                            <label for="Email">Email Address:</label>
                            <input type="email" id="Email" placeholder="Email Address">
                        </div>

                        <div class="profile-group">
                            <label for="Phone-Number"> Phone Number:</label>
                            <input type="text" id="Phone-Number" placeholder="Phone Number">
                        </div>
                    </div>
                    
                
                <br>
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
                
                <br>
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

                <br>
                <button class="save-button" onclick="showTab('Password change')" >Change & Save</button>
            </div>                                              <!-- BookSeller Password change end -->

    </div>                          <!-- inner background box end -->

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->

    <script src="<?= ROOT ?>/assets/JS/bookSellerProfile.js"></script>

</body>
