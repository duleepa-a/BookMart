<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierRegister.css">
    <title>Register BookStore</title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
    </div>
    <div class="container"> <br><br>
        <h1>Register Courier</h1>
        <br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('personal-details')">Personal Details</button>
            <button class="tab-button" onclick="showTab('bank-details')">Bank Details</button>
            <button class="tab-button" onclick="showTab('vehical-details')">Vehical Details</button>
            <button class="tab-button last-child" onclick="showTab('legal-agreements')">Legal Agreements</button>
        </nav>

        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/registerCourier"  >
            <div class="tab-content" id="personal-details">
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="first-name">First Name:</label>
                        <input type="text" id="first-name" placeholder="Enter your first name" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name:</label>
                        <input type="text" id="last-name" placeholder="Enter your last name" name="lastname" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="user-name">User Name:</label>
                        <input type="text" id="user-name" name="username" placeholder="The user name of the account" required>
                    </div>
                    <div class="form-group">
                        <label for="email-address">Email Address:</label>
                        <input type="text" id="email-address"  name="email" placeholder="The email address of the courier" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" id="dob" placeholder="Enter your birthday" name="dob" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select id="gender" name="gender" required>
                            <option value="" disabled selected>Male / Female</option> 
                            <option value="male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="nic">NIC Number:</label>
                        <input type="text" id="nic" placeholder="Enter  your NIC number" name="nic" required>
                    </div>
                    <div class="form-group">
                        <label for="license">License Number:</label>
                        <input type="text" id="license" name="license" placeholder="Enter your driving license number" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group-small">
                        <label class="Address" for="address">Address line 1:</label>
                        <input type="text" id="address" name="address" placeholder="Address line 1" required>
                    </div>
                    <div class="form-group-small">
                        <label for="address-line-2">Address line 2:</label>
                        <input type="text" id="address-line-2" name="address-line-2" placeholder="Address line 2" required>
                    </div>
                    <div class="form-group-small">
                        <label for="city">City:</label>
                        <input type="text" id="city" placeholder="City" name="city" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number">Phone Number:</label>
                        <input type="text" id="phone-number" name="phone-number" placeholder="Enter your mobile number" required>
                    </div>
                    <div class="form-group">
                        <label for="secondary-number">Secondary Phone number (optional):</label>
                        <input type="text" id="secondary-number" name="secondary-number" placeholder="Secondary Mobile Number (optional)">
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="password">Create a Password:</label>
                        <input type="password" id="password" name="password" placeholder="Create a strong password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter your password" required>
                    </div>
                </div>
                
                <br>
                <button class="next-button" onclick="showTab('bank-details')" type="button">Next</button>
                <br><br><br><br>
            
            </div>


            <div class="tab-content" id="bank-details" style="display: none;">
                
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
                        <label for="account-name">Account Name:</label>
                        <input type="text" id="account-name" name="account-name" placeholder="Enter your account name" required>
                    </div>
                </div>

                <br>
                <button class="next-button" onclick="showTab('vehical-details')" type="button">Next</button>
                <br><br><br><br>

            </div>

            <div class="tab-content" id="vehical-details" style="display: none;">
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="vehical-type">Vehical Type:</label>
                        <select id="vehical-type" name="vehical-type" required>
                            <option value="" disabled selected>Choose type</option> 
                            <option value="bike">Bike</option>
                            <option value="three-wheeler">Three-Wheeler</option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vehical-model">Vehical Model:</label>
                        <input type="text" id="vehical-model" 
                        name="vehical-model"  placeholder="Enter vehical model" required>
                    </div>
                </div>
    
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="vehical-registration-number">Vehical Registration Number:</label>
                        <input type="text" id="vehical-registration-number" placeholder="Enter registration number" name="vehical-registration-number" required>
                    </div>
                    <div class="form-group">
                        <label for="vehical-registration-document">Upload Vehical Registration Documents:</label>
                        <input type="file" id="vehical-registration-document" name="vehical-registration-document" >
                    </div>
                </div>

                <br>
                <button class="next-button" onclick="showTab('legal-agreements')" type="button">Next</button>
                <br><br><br><br>

            </div>

            <div class="tab-content" id="legal-agreements" style="display: none;">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="driver's-photo">Driver's Photo:</label>
                        <input type="file" id="driver's-photo" name="driver's-photo" >
                    </div>
                    <div class="form-group">
                        <label for="photo-nic">Photo of NIC:</label>
                        <lable for="description">pdf file should have two pages with front and rear views</lable>
                        <input type="file" id="photo-nic" name="photo-nic" >
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="photo-of-driving-license">Photo of Driving License:</label>
                        <lable for="description">pdf file should have two pages with front and rear views</lable>
                        <input type="file" id="photo-of-driving-license" name="photo-of-driving-license" >
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group checkbox-group">
                        <!-- <label for="TermsAndConditions" id="terms">Terms and Conditions:</label> <br> -->
                        <input type="checkbox"  name="terms" required>
                        <label for="terms">I agree to the <a href="./TermsAndConditions.html"> Terms and Conditions </a> which include my responsibilities, prohibited activities, intellectual property rights, liability limitations, and dispute resolution procedures</label>
                    </div>
                    <div class="form-group checkbox-group">
                        <!-- <label for="privacyPolicy" id="privacy">Privacy Policy:</label> <br> -->
                        <input type="checkbox"  name="privacy" required>
                        <label for="privacy"> I agree to the <a href="./privacyPolicy.html">Privacy Policy</a> detailing how my data will be collected, used, shared, and protected, including my rights regarding my data.</label>
                        
                    </div>
                    
                </div>
                <button class="next-button" type="submit" >Register</button>
                <br>
                <br>
            </div>
        </form>
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/courierRegister.js"></script>
</body>
</html>