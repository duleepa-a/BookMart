<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminProfile.css">
    <title>Admin Profile</title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
            <h2>Book<span class="highlight">Mart</span></h2>
        </span>
    </div>
    <div class="container"> 
        <h1>My Profile</h1><br><br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('Admin-details',event)">Personal Details</button>
            <button class="tab-button" onclick="showTab('Bank-details',event)">Bank Details</button>
            <button class="tab-button last-child" onclick="showTab('Password change',event)">Password Change</button>
        </nav>

        <br>
        <form id="AdminProfile"  class="profile">
            <div class="tab-content" id="Admin-details">
              
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
               
                <button class="save-button" onclick="showTab('Admin-details')">Change & Save</button>
            
            </div>
        

            <div class="tab-content" id="Bank-details">
              
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
            
            </div>


            <div class="tab-content" id="Password change">

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
            </div>
    </div>

    <script src="<?= ROOT ?>/assets/JS/adminProfile.js"></script>
    
</body>
</html>