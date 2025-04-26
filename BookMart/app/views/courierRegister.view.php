<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierRegister.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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

        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/registerCourier" enctype="multipart/form-data" >
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
                        <label for="user-name">User Name:
                        <span class="error" style="display: none; color: red; font-weight:bold;">This username is taken.</span>
                        <span class="valid" style="display: none; color: green; font-weight:bold;">Username is available!</span>
                        </label>
                        <input type="text" id="user-name" name="username" placeholder="The user name of the account" required>
                    </div>
                    <div class="form-group">
                        <label for="email-address">Email Address:
                            <span class="error-email" style="display: none; color: red; font-weight:bold;">This email is already registered.</span>
                            <span class="valid-email" style="display: none; color: green; font-weight:bold;">Email is available!</span>
                        </label>
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
                        <label for="nic">NIC Number:
                            <span class="error-nic" style="display: none; color: red; font-weight:bold;">Please enter a valid NIC number</span>
                        </label>
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
                        <label for="phone-number">Phone Number:
                            <span class="error-phone" style="display: none; color: red; font-weight:bold;">Please enter a valid phone number</span>
                        </label>
                        <input type="text" id="phone-number" name="phone-number" placeholder="Enter your mobile number" required>
                    </div>
                    <div class="form-group">
                        <label for="secondary-number">Secondary Phone number (optional):
                            <span class="error-phone-second" style="display: none; color: red; font-weight:bold;">Please enter a valid phone number</span>
                        </label>
                        <input type="text" id="secondary-number" name="secondary-number" placeholder="Secondary Mobile Number (optional)">
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="password">Create a Password:
                            <span class="password-strength" style="display: none; color: green; font-weight:bold;">Strong password</span>
                        <span class="password-strength-weak" style="display: none; color: red; font-weight:bold;">Weak password</span>
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
                        <input type="password" id="password" name="password" placeholder="Create a strong password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:
                            <span class="confirm-password-error" style="display: none; color: red; font-weight:bold;"> Not matching with the password</span>
                        </label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter your password" required>
                    </div>
                </div>
                
                <br>
                <button class="next-button" onclick="showTab('bank-details')" type="button">Next</button>
                <br><br><br>
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
                        <label for="account-name">Account Holder's Name:</label>
                        <input type="text" id="account-name" name="account-name" placeholder="Enter the account holder's name" required>
                    </div>
                </div>

                <br>
                <button class="next-button" onclick="showTab('vehical-details')" type="button">Next</button>
                <br><br><br>

            </div>

            <div class="tab-content" id="vehical-details" style="display: none;">
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="vehicle-type">Vehicle Type:</label>
                        <select id="vehicle-type" name="vehicle-type" required>
                            <option value="" disabled selected>Choose type</option> 
                            <option value="bike">Bike</option>
                            <option value="three-wheeler">Three-Wheeler</option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vehicle-model">Vehicle Model:</label>
                        <input type="text" id="vehicle-model" 
                        name="vehicle-model"  placeholder="Enter vehicle model" required>
                    </div>
                </div>
    
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="vehicle-registration-number">Vehicle Registration Number:</label>
                        <input type="text" id="vehicle-registration-number" placeholder="Enter registration number" name="vehicle-registration-number" required>
                    </div>
                    <div class="form-group">
                        <label for="vehicle-registration-document">Upload Vehicle Registration Documents:</label>
                        <input type="file" id="vehicle-registration-document" name="vehicle-registration-document" >
                    </div>
                </div>

                <br>
                <button class="next-button" onclick="showTab('legal-agreements')" type="button">Next</button>
                <br><br><br>

            </div>

            <div class="tab-content" id="legal-agreements" style="display: none;">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="photo-of-driving-license">Photo of Driving License:</label>
                        <lable for="description">pdf file should have two pages with front and rear views</lable>
                        <input type="file" id="photo-of-driving-license" name="photo-of-driving-license" >
                    </div>
                    <div class="form-group">
                        <label for="photo-nic">Photo of NIC:</label>
                        <lable for="description">Pdf file should have two pages with front and rear views</lable>
                        <input type="file" id="photo-nic" name="photo-nic" >
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
                        <label for="privacy"> I agree to the <a href="./privacyPolicy.html">Privacy Policy</a> detailing how my data will be collected, used, shared, and protected, including my rights regarding my data.</label>
                        
                    </div>
                    
                </div>
                <button class="next-button" type="submit" >Register</button>
                <br><br><br>
            </div>
        </form>
        </div>
    </div>
    <br><br>
    <div id="custom-alert" class="error-alert" style="display: none;">
    <div class="error__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
            </svg>
        </div>
        <div class="error__title" id="alert-message"></div>
        <div class="error__close" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
            </svg>
        </div>
    </div>
    <script>
        function showAlert(message, type = "error") {
            const alertBox = document.getElementById("custom-alert");
            const alertMsg = document.getElementById("alert-message");
            const alertMsgbox = document.getElementsByClassName("error-alert")[0];

            // Change alert style based on the type
            if (type === "success") {
                alertBox.style.backgroundColor = "#4CAF50";  // green
            }

            alertMsg.textContent = message;
            alertBox.style.display = "flex";

            console.log(alertMsg.textContent);

            setTimeout(() => {
                closeAlert();
            }, 4000);
        }

        function closeAlert() {
            document.getElementById("custom-alert").style.display = "none";
        }
        <?php if (!empty($_SESSION['error'])): ?>
        <script>
            showAlert("<?= $_SESSION['error'] ?>", "error");
        </script>
        <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <script>
                showAlert("<?= $_SESSION['success'] ?>", "success");
            </script>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
    </script>
    <script src="<?= ROOT ?>/assets/JS/courierRegister.js"></script>
</body>
</html>