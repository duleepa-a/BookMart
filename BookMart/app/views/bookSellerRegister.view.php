<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/registerForm.css">
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
                        <span class="error">This user name is taken.</span>
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
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="password">Create a Password:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
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
                        <label for="payment-method">Payment Method:</label>
                        <input type="text" id="payement-method" placeholder="Select your payment method" name="payment-method" >
                    </div>
                    <div class="form-group">
                        <label for="evidence-docs">Add your card details:</label>
                        <button class="form-bttn">Add</button>
                        <span style="color: #ACA3A3; margin-left: 5px;">(optional)</span> 
                    </div>
                    
                </div>
                <div class="form-group-row">
                    <div class="form-group checkbox-group">
                        <!-- <label for="TermsAndConditions" id="terms">Terms and Conditions:</label> <br> -->
                        <input type="checkbox"  name="terms" required>
                        <label for="terms">I agree to the <a href="<?= ROOT ?>/TermsAndConditions"> Terms and Conditions </a> which include my responsibilities, prohibited activities, intellectual property rights, liability limitations, and dispute resolution procedures</label>
                      </div>
                      <div class="form-group checkbox-group">
                        <!-- <label for="privacyPolicy" id="privacy">Privacy Policy:</label> <br> -->
                        <input type="checkbox"  name="privacy" required>
                        <label for="privacy"> I agree to the <a href="<?= ROOT ?>/privacyPolicy">Privacy Policy</a> detailing how my data will be collected, used, shared, and protected, including my rights regarding my data.</label>
                        
                    </div>
                    
                </div>
                <button class="next-button" type="submit" >Register</button>
                <br>
                <br>
            </div>
        </form>
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/buyerRegisterPage.js"></script>
</body>
</html>