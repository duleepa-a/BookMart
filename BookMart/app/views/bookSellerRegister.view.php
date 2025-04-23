<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/registerForm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Register Buyer</title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
    </div>
    <br>
    <div class="container"> <br><br>
        <h1>Register BookSeller</h1>
        <br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('login-credentials')">Login Credentials</button>
            <button class="tab-button" onclick="showTab('personal-details')">Personal Details</button>
            <button class="tab-button last-child" onclick="showTab('payment-details')">Payment Details</button>
        </nav>

        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/registerBookSeller" >
            
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
                    <br><br>
                    <span class="error-email" style="display: none; color: red;">This email is already registered.</span>
                    <span class="valid-email" style="display: none; color: green;">Email is available!</span>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="password">Create a Password:
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
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:<span class="confirm-password-error" style="display: none; color: red;"> Not matching with the password</span></label>
                        <input type="password" id="confirm-password" name="confirm-password" required>
                    </div>
                </div>
                <button class="next-button" onclick="showTab('personal-details')" type="button" >Next</button>
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
                        <select id="" name="gender" >
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
                        <select id="" name="district" >
                            <option value="" disabled selected>Please select your district</option>
                            <option value="colombo">Colombo</option>
                            <option value="gampaha">Gampaha</option>
                            <option value="kalutara">Kalutara</option>
                        </select>
                    </div>
                    <div class="form-group-small">
                        <label for="province">Province:</label>
                        <select id="" name="province" >
                            <option value="" disabled selected>Please select your province</option>
                            <option value="Western">Western</option>
                            <option value="Eastern">Eastern</option>
                            <option value="kalutara">North</option>
                        </select>
                    </div>
                </div>
                
                <br>
                <button class="next-button" onclick="showTab('payment-details')" type="button" >Next</button>
                <br><br><br><br>
            
            </div>


            <div class="tab-content" id="payment-details" style="display: none;">
            <div class="form-group-row">
                    <div class="form-group">
                        <label for="bank">Bank:</label>
                        <select id="bank" name="bank" required>
                            <option value="" disabled selected>Choose Bank</option> 
                            <option value="boc">Bank of Ceylon</option>
                            <option value="sampath">Sampath Bank</option>
                            <option value="peoples">People's Bank</option>
                            <option value="hnb">Hatton National Bank</option>
                            <option value="nsb">National Savings Bank</option>
                            <option value="seylan">Seylan Bank</option>
                            <option value="dfcc">DFCC Bank</option>
                            <option value="pan-asia">Pan Asia Bank</option>
                            <option value="nation-trust">Nations Trust Bank</option>
                            <option value="commercial-bank">Commercial Bank of Ceylon</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="branch-name">Branch Name:</label>
                        <input type="text" id="branch-name" name="branch-name" placeholder="Enter branch-name" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="account-number">Account Number:</label>
                        <input type="text" id="account-number" name="account-number" placeholder="Enter account number" required>
                    </div>
                    <div class="form-group">
                        <label for="account-name">Account Holder's Name:</label>
                        <input type="text" id="account-name" name="account-name" placeholder="Enter the account holder's name" required>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group checkbox-group">
                        <!-- <label for="TermsAndConditions" id="terms">Terms and Conditions:</label> <br> -->
                        <input type="checkbox"  name="terms" required>
                        <label for="terms">I agree to the <a href="<?= ROOT ?>/user/termsConditions"> Terms and Conditions </a> which include my responsibilities, prohibited activities, intellectual property rights, liability limitations, and dispute resolution procedures</label>
                      </div>
                      <div class="form-group checkbox-group">
                        <!-- <label for="privacyPolicy" id="privacy">Privacy Policy:</label> <br> -->
                        <input type="checkbox"  name="privacy" required>
                        <label for="privacy"> I agree to the <a href="<?= ROOT ?>/privacyPolicy">Privacy Policy</a> detailing how my data will be collected, used, shared, and protected, including my rights regarding my data.</label>
                        
                    </div>
                </div>
                <button class="next-button" type="submit" >Register</button>
                <br><br><br>
            </div>
        </form>
    </div>
    <br><br>
    <script src="<?= ROOT ?>/assets/JS/buyerRegisterPage.js"></script>
</body>
</html>