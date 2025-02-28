<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/buyerProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>        
    <!-- navBar division end -->
        <div class="sidebar">
            <h3 class="sidebar-heading">Welcome back,<br>Duleepa Edirisinghe</h3>
            <ul>
                <li><a href="<?= ROOT ?>/buyer/orders" ><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
                <li><a href="<?= ROOT ?>/buyer/reviews"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
                <li><a href="<?= ROOT ?>/buyer/myProfile" class="active"><i class="fa-regular fa-user"></i>Profile</a></li>
            </ul>   
        </div>
        <div class="container">
            <div class="profile-container">
                    <h1 class="heading">My Profile</h1>
                    <br>
                    <nav class="tabs">
                        <button class="tab-button active first-child" onclick="showTab('login-credentials')">Login Credentials</button>
                        <button class="tab-button" onclick="showTab('personal-details')">Personal Details</button>
                        <button class="tab-button" onclick="showTab('payment-details')">Payment Details</button>
                        <button class="tab-button last-child" onclick="showTab('password-change')">Password Change</button>
                    </nav>

                    <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/registerBuyer" >
                        
                        <div class="tab-content" id="login-credentials" >
                            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="user-name">User Name:</label>
                                    <input type="text" id="user-name" placeholder="Choose a username" name="username"required>
                                </div>
                                <div class="form-group">
                                    <br><br>
                                    <span class="error" style="display: none; color: red;">This username is taken.</span>
                                    <span class="valid" style="display: none; color: green;">Username is available!</span>
                                </div>
                            </div>
                            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="email-manager">Email Address:</label>
                                    <input type="email" id="email" placeholder="Please enter your email address" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="verification-code">Verification code(sent to your email): </label>
                                    <input type="text" id="verfication-code" placeholder="6 Digit code" >
                                    <button type="button" class="btn-inside-input">Send</button>
                                </div>
                            </div>
                            <button class="next-button" onclick="showTab('personal-details')" type="button" >Change & Save</button>
                            <br>
                            <br><br>
                        </div>

                        <div class="tab-content" id="personal-details" style="display: none;">
                            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="user-full-name">Full Name:</label>
                                    <input type="text" id="full-name" placeholder="Enter your full name" name="full-name" required>
                                </div>
                                <div class="form-group-smaller">
                                    <label for="gender">Gender:</label>
                                    <select id="gender" name="gender" >
                                        <option value="" disabled selected>Choose your gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group-smaller">
                                    <label for="dob">Date of birth:</label>
                                    <input type="date" id="dob" name="dob"/>
                                </div>
                            </div>
                            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="phone-number">Phone Number:</label>
                                    <input type="text" id="phone-number" placeholder="Please enter your phone number" name="phone-number" required>
                                </div>
                                <div class="form-group">
                                    <label for="street-address">Street Address:</label>
                                    <input type="text" id="street-address" placeholder="The street address" name="street-address" required>
                                </div>
                            </div>
                            
                            <div class="form-group-row">
                                <div class="form-group-small">
                                    <label for="city">Zone:</label>
                                    <select id="city" name="city" >
                                        <option value="" disabled selected>Select your Zone:</option>
                                        <option value="pannipitya">Pannipitya</option>
                                        <option value="maharagama">Maharagama</option>
                                    </select>
                                </div>
                                <div class="form-group-small">
                                    <label for="district">District:</label>
                                    <select id="district" name="district" >
                                        <option value="" disabled selected>Please select your district</option>
                                        <option value="colombo">Colombo</option>
                                        <option value="gampaha">Gampaha</option>
                                        <option value="kalutara">Kalutara</option>
                                    </select>
                                </div>
                                <div class="form-group-small">
                                    <label for="province">Province:</label>
                                    <select id="province" name="province" >
                                        <option value="" disabled selected>Please select your province</option>
                                        <option value="Western">Western</option>
                                        <option value="Eastern">Eastern</option>
                                        <option value="kalutara">North</option>
                                    </select>
                                </div>
                            </div>
                            
                            <br>
                            <button class="next-button" onclick="showTab('payment-details')" type="button">Change & Save</button>
                            <br><br><br><br>
                        
                        </div>
                        <div class="tab-content" id="payment-details" style="display: none;">
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="payment-method">Payment Method:</label>
                                    <input type="text" id="payement-method" placeholder="Select your payment method" name="payment-method" >
                                </div>
                                <div class="form-group">
                                    <label for="evidence-docs">Add your card details:</label>
                                    <button class="form-bttn" type="button">Add</button>
                                    <span style="color: #ACA3A3; margin-left: 5px;">(optional)</span> 
                                </div>
                                
                            </div>
                            <button class="next-button" type="submit" >Change & Save</button>
                            <br>
                            <br>
                        </div>
                        <div class="tab-content" id="password-change" style="display: none;">
                            <div class="form-group-row">
                                    <div class="form-group">
                                        <label for="password">Current Password:
                                        </label>
                                        <input type="password" name="password" id="password"  required>
                                    </div>
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="form-group-row">
                                    <div class="form-group">
                                        <label for="password">Create New Password:
                                            <span class="password-strength" style="display: none; color: green;">Strong password</span>
                                        <span class="password-strength-weak" style="display: none; color: red;">Weak password</span>
                                        <div class="tooltip">
                                            <div class="icon">i</div>
                                            <div class="tooltiptext">
                                                <ul>
                                                <li>Use at least <strong>8 characters.</strong></li>
                                                <li>Include <strong>uppercase</strong> and <strong>lowercase</strong> letters.</li>
                                                <li>Add <strong>numbers</strong> and <strong>special characters (e.g., !, @, #, $, etc.).</strong></li>
                                                <li><strong>Avoid personal information</strong>(like names or birthdays).</li>
                                                </ul>
                                            </div>
                                        </div>
                                        </label>
                                        <input type="password" name="password" id="password"  required>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirm New Password:
                                            <span class="confirm-password-error" style="display: none; color: red;"> Not matching with the password</span>
                                        </label>
                                        <input type="password" name="confirm-password" id="confirm-password"  required>
                                    </div>
                                </div>
                                <button class="next-button" type="submit" >Change & Save</button>
                                <br>
                                <br>
                            </div>
                    </form>
                </div>

        </div>
        <footer class="small-footer">
                <p>&copy; 2024 BookMart, all rights reserved.</p>
            </footer> 
        <script src="<?= ROOT ?>/assets/JS/buyerProfile.js"></script>
</body>
</html>