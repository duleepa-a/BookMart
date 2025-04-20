<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"><!--bell icon-->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminProfile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Admin Profile</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'adminNavBar.view.php'; ?>
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers"  ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminViewContactUs"><i class="fa-solid fa-envelope"></i>Inquiries</a></li>
            <li><a href="<?= ROOT ?>/adminViewCourierComplains"><i class="fa-solid fa-circle-exclamation"></i>Complains</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile" class="active"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <!-- navBar division end -->

    <div class="container"> 
        <div class="box"> 
            <h1>My Profile</h1><br>
            <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('Admin-details',event)">Personal Details</button>
                <button class="tab-button" onclick="showTab('Bank-details',event)">Bank Details</button>
                <button class="tab-button last-child" onclick="showTab('Password change',event)">Password Change</button>
            </nav>

            <form id="AdminProfile"  class="profile">
                <div class="tab-content" id="Admin-details">
                
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
                            <label for="Email">Email Address:</label>
                            <input type="email" id="Email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="profile-group">
                        <label for="Phone-Number"> Phone Number:</label>
                        <input type="text" id="Phone-Number" placeholder="Phone Number">
                    </div>

                    <button class="save-button" onclick="showTab('Admin-details')">Change & Save</button>
                
                </div>
            

                <div class="tab-content" id="Bank-details">

                    <div class="profile-group-row">
                        <div class="profile-group">
                            <label for="Bank">Bank Name:</label>
                            <input type="text" id="Bank-name" placeholder="Bank Name">
                        </div>

                        <div class="profile-group">
                            <label for="Branch">Branch Name:</label>
                            <input type="text" id="Branch-name" placeholder="Branch Name">
                        </div>
                    </div>
                    
                    <div class="profile-group-row">
                        <div class="profile-group">
                            <label for="AccNumber">Account Number:</label>
                            <input type="text" id="AccountNumber" placeholder="Account Number">
                        </div>

                        <div class="profile-group">
                            <label for="AccName">Account Name:</label>
                            <input type="text" id="AccountName" placeholder="Account Name">
                        </div>
                    </div>
                
                    <button class="save-button" onclick="showTab('Bank-details')" >Change & Save</button>
                
                </div>


                <div class="tab-content" id="Password change">

                    <div class="profile-group-row">
                        <div class="profile-group">
                            <div class="password-container">
                                <label for="current-password">Current password:</label>
                                <div class="input-wrapper">
                                    <input type="password" id="current-password" placeholder="Enter Current Password">
                                    <span class="toggle-password-visibility" data-target="current-password"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="profile-password">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>

                    <br>
                    <div class="profile-group-row">
                        <div class="profile-group">
                            <div class="password-container">
                                    <label for="new-password">New password:
                                        <span class="password-strength" style="display: none; color: green;">Strong password</span>
                                        <span class="password-strength-weak" style="display: none; color: red;">Weak password</span>
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="password" id="new-password" placeholder="Enter New Password">
                                        <span class="toggle-password-visibility" data-target="new-password"><i class="fa fa-eye"></i></span>
                                    </div>
                            </div>
                        </div>

                        <div class="profile-group">
                            <div class="password-container">
                                <label for="confirm-password">Confirm new password:
                                    <span class="confirm-password-error" style="display: none; color: red;"> Not matching with the password</span>
                                </label>
                                <div class="input-wrapper">
                                    
                                    <p class="confirm-password-error" style="display: none; color: red;">Passwords do not match.</p>
                                    <input type="password" id="confirm-password" placeholder="Re-enter New Password">
                                    <span class="toggle-password-visibility" data-target="confirm-password"><i class="fa fa-eye"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="save-button" onclick="showTab('Password change')" >Change & Save</button>
                </div>
        </div>
    </div>
    <br><br>
        <script src="<?= ROOT ?>/assets/JS/adminProfile.js"></script>
    
</body>
 </html>