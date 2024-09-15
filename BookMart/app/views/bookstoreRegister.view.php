<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/registerForm.css">
    <title>Register BookStore</title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
            <h2>Book<span class="highlight">Mart</span></h2>
        </span>
    </div>
    <div class="container"> <br><br>
        <h1>Register BookStore</h1>
        <br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('store-details')">Store Details</button>
            <button class="tab-button" onclick="showTab('owner-details')">Owner Details</button>
            <button class="tab-button last-child" onclick="showTab('legal-agreements')">Legal Agreements</button>
        </nav>

        <form id="registerForm"  class="registration-form">
            <div class="tab-content" id="store-details">
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="store-name">Store Name:</label>
                        <input type="text" id="store-name" placeholder="The name of the bookstore" required>
                    </div>
                    <div class="form-group">
                        <label for="store-name">Email:</label>
                        <input type="email" id="store-name" placeholder="The Email of the bookstore" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number">Phone Number:</label>
                        <input type="text" id="phone-number" placeholder="The contact number of the bookstore" required>
                    </div>
                    <div class="form-group">
                        <label for="street-address">Street Address:</label>
                        <input type="text" id="street-address" placeholder="The street address of the bookstore" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group-small">
                        <label for="city">City:</label>
                        <select id="city" name="city" >
                            <option value="" disabled selected>Select the city of the bookstore</option>
                            <option value="pannipitya">Pannipitya</option>
                            <option value="maharagama">Maharagama</option>
                        </select>
                    </div>
                    <div class="form-group-small">
                        <label for="district">District:</label>
                        <select id="" name="District" >
                            <option value="" disabled selected>Select the district of the bookstore</option>
                            <option value="colombo">Colombo</option>
                            <option value="gampaha">Gampaha</option>
                            <option value="kalutara">Kalutara</option>
                        </select>
                    </div>
                    <div class="form-group-small">
                        <label for="province">Province:</label>
                        <select id="" name="province" >
                            <option value="" disabled selected>Select the province of the bookstore</option>
                            <option value="colombo">Western</option>
                            <option value="gampaha">Eastern</option>
                            <option value="kalutara">North</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="password">Create a Password:</label>
                        <input type="password" id="password"  required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:</label>
                        <input type="password" id="confirm-password"  required>
                    </div>
                </div>
                
                <br>
                <button class="next-button" onclick="showTab('owner-details')" >Next</button>
                <br><br><br><br>
            
            </div>


            <div class="tab-content" id="owner-details" style="display: none;">
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="owner-name">Owner Name:</label>
                        <input type="text" id="owner-name" placeholder="The name of the owner" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email-owner" placeholder="The Email address of the owner" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number-owner">Phone Number:</label>
                        <input type="text" id="phone-number-owner" placeholder="The contact number of the owner" required>
                    </div>
                    <div class="form-group">
                        <label for="NIC-owner">Owner's NIC:</label>
                        <input type="text" id="NIC-owner" placeholder="The NIC number of the owner" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="manager-name">Manager Name:</label>
                        <input type="text" id="manager-name" placeholder="The name of the manager" required>
                    </div>
                    <div class="form-group">
                        <label for="email-manager">Email Address:</label>
                        <input type="email" id="email-manager" placeholder="The Email address of the manager" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number-manager">Phone Number:</label>
                        <input type="text" id="phone-number-manager" placeholder="The contact number of the manager" required>
                    </div>
                    <div class="form-group">
                        <label for="NIC-manager">Manager's NIC:</label>
                        <input type="text" id="NIC-manager" placeholder="The NIC of the manager" required>
                    </div>
                </div>
                <button class="next-button" onclick="showTab('legal-agreements')" >Next</button>
                <br>
            </div>

            <div class="tab-content" id="legal-agreements" style="display: none;">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="business-reg-NO">Business Registration Number:</label>
                        <input type="text" id="business-reg-NO" placeholder="The business number of the bookstore" required>
                    </div>
                    <div class="form-group">
                        <label for="evidence-docs">Upload evidence documents:</label>
                        <input type="file" id="evidence-docs" name="evidence-docs" required>
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
    <script src="<?= ROOT ?>/assets/JS/bookstoreRegisterPage.js"></script>
</body>
</html>