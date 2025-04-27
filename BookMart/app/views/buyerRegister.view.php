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
        <h1>Register Buyer</h1>
        <br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('login-credentials')">Login Credentials</button>
            <button class="tab-button" onclick="showTab('personal-details')">Personal Details</button>
            <button class="tab-button last-child" onclick="showTab('payment-details')">Terms and Conditions</button>
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
                        <span class="error" style="display: none; color: red; font-weight: bold;">This username is taken.</span>
                        <span class="valid" style="display: none; color: green; font-weight: bold;">Username is available!</span>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="email-manager">Email Address: </label>
                        <input type="email" id="email" placeholder="Please enter your email address" name="email" required>
                    </div>
                    <div class="form-group">
                    <br><br>
                    <span class="error-email" style="display: none; color: red; font-weight: bold;">This email is already registered.</span>
                    <span class="valid-email" style="display: none; color: green; font-weight: bold;">Email is available!</span>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="password">Create a Password:
                            <span class="password-strength" style="display: none; color: green; font-weight: bold;">Strong password</span>
                        <span class="password-strength-weak" style="display: none; color: red; font-weight: bold;">Weak password</span>
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
                        <label for="confirm-password">Confirm Password:<span class="confirm-password-error" style="display: none; color: red; font-weight: bold;"> Not matching with the password</span></label>
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
                        <label for="phone-number">Phone Number:
                            <span class="error-phone" style="display: none; color: red; font-weight: bold;">Please enter a valid phone number</span>
                        </label>
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
                        <select id="city" name="city">
                            <option value="" disabled selected>Select your city:</option>
                            <!-- Western Province -->
                            <option value="colombo">Colombo</option>
                            <option value="dehiwala-mount-lavinia">Dehiwala-Mount Lavinia</option>
                            <option value="moratuwa">Moratuwa</option>
                            <option value="negombo">Negombo</option>
                            <option value="sri-jayawardenepura-kotte">Sri Jayawardenepura Kotte</option>
                            <option value="ja-ela">Ja-Ela</option>
                            <option value="wattala">Wattala</option>
                            <option value="gampaha">Gampaha</option>
                            <option value="kalutara">Kalutara</option>
                            <option value="panadura">Panadura</option>
                            <option value="beruwala">Beruwala</option>
                            <option value="pannipitiya">Pannipitiya</option>
                            <option value="maharagama">Maharagama</option>

                            <!-- Central Province -->
                            <option value="kandy">Kandy</option>
                            <option value="matale">Matale</option>
                            <option value="nuwara-eliya">Nuwara Eliya</option>
                            <option value="gampola">Gampola</option>
                            <option value="hatton">Hatton</option>
                            <option value="nawalapitiya">Nawalapitiya</option>

                            <!-- Southern Province -->
                            <option value="galle">Galle</option>
                            <option value="matara">Matara</option>
                            <option value="hambantota">Hambantota</option>
                            <option value="tangalle">Tangalle</option>
                            <option value="ambalangoda">Ambalangoda</option>
                            <option value="weligama">Weligama</option>

                            <!-- Eastern Province -->
                            <option value="batticaloa">Batticaloa</option>
                            <option value="trincomalee">Trincomalee</option>
                            <option value="kalmunai">Kalmunai</option>
                            <option value="ampara">Ampara</option>
                            <option value="eravur">Eravur</option>
                            <option value="kattankudy">Kattankudy</option>

                            <!-- Northern Province -->
                            <option value="jaffna">Jaffna</option>
                            <option value="vavuniya">Vavuniya</option>
                            <option value="mannar">Mannar</option>
                            <option value="point-pedro">Point Pedro</option>
                            <option value="chavakachcheri">Chavakachcheri</option>
                            <option value="valvettithurai">Valvettithurai</option>

                            <!-- North Central Province -->
                            <option value="anuradhapura">Anuradhapura</option>
                            <option value="polonnaruwa">Polonnaruwa</option>
                            <option value="dambulla">Dambulla</option>

                            <!-- North Western Province -->
                            <option value="kurunegala">Kurunegala</option>
                            <option value="puttalam">Puttalam</option>
                            <option value="chilaw">Chilaw</option>
                            <option value="kuliyapitiya">Kuliyapitiya</option>

                            <!-- Uva Province -->
                            <option value="badulla">Badulla</option>
                            <option value="bandarawela">Bandarawela</option>
                            <option value="haputale">Haputale</option>
                            <option value="monaragala">Monaragala</option>

                            <!-- Sabaragamuwa Province -->
                            <option value="ratnapura">Ratnapura</option>
                            <option value="kegalle">Kegalle</option>
                            <option value="balangoda">Balangoda</option>

                            <!-- Other Notable Towns -->
                            <option value="avissawella">Avissawella</option>
                            <option value="horana">Horana</option>
                            <option value="minuwangoda">Minuwangoda</option>
                        </select>

                    </div>
                    <div class="form-group-small">
                        <label for="district">District:</label>
                        <select id="district" name="district" >
                            <option value="" disabled selected>Please select your district</option>
                            <option value="ampara">Ampara</option>
                            <option value="anuradhapura">Anuradhapura</option>
                            <option value="badulla">Badulla</option>
                            <option value="batticaloa">Batticaloa</option>
                            <option value="colombo">Colombo</option>
                            <option value="galle">Galle</option>
                            <option value="gampaha">Gampaha</option>
                            <option value="hambantota">Hambantota</option>
                            <option value="jaffna">Jaffna</option>
                            <option value="kalutara">Kalutara</option>
                            <option value="kandy">Kandy</option>
                            <option value="kegalle">Kegalle</option>
                            <option value="kilinochchi">Kilinochchi</option>
                            <option value="kurunegala">Kurunegala</option>
                            <option value="mannar">Mannar</option>
                            <option value="matale">Matale</option>
                            <option value="matara">Matara</option>
                            <option value="monaragala">Monaragala</option>
                            <option value="mullaitivu">Mullaitivu</option>
                            <option value="nuwara-eliya">Nuwara Eliya</option>
                            <option value="polonnaruwa">Polonnaruwa</option>
                            <option value="puttalam">Puttalam</option>
                            <option value="ratnapura">Ratnapura</option>
                            <option value="trincomalee">Trincomalee</option>
                            <option value="vavuniya">Vavuniya</option>
                        </select>
                    </div>
                    <div class="form-group-small">
                        <label for="province">Province:</label>
                        <select id="province" name="province" >
                            <option value="" disabled selected>Please select your province</option>
                            <option value="central">Central</option>
                            <option value="eastern">Eastern</option>
                            <option value="north-central">North Central</option>
                            <option value="northern">Northern</option>
                            <option value="north-western">North Western</option>
                            <option value="sabaragamuwa">Sabaragamuwa</option>
                            <option value="southern">Southern</option>
                            <option value="uva">Uva</option>
                            <option value="western">Western</option>
                        </select>
                    </div>
                </div>
                
                <br>
                <button class="next-button" onclick="showTab('payment-details')" type="button">Next</button>
                <br><br><br><br>
            
            </div>


            <div class="tab-content" id="payment-details" style="display: none;">
                <br>
                <div class="form-group-row">
                    <div class="form-group checkbox-group">
                        <!-- <label for="TermsAndConditions" id="terms">Terms and Conditions:</label> <br> -->
                        <input type="checkbox"  name="terms" required>
                        <label for="terms">I agree to the <a href="<?= ROOT ?>/user/termsConditions" class="check-box-link"> Terms and Conditions </a> which include my responsibilities, prohibited activities, intellectual property rights, liability limitations, and dispute resolution procedures</label>
                      </div>
                      <div class="form-group checkbox-group">
                        <!-- <label for="privacyPolicy" id="privacy">Privacy Policy:</label> <br> -->
                        <input type="checkbox"  name="privacy" required>
                        <label for="privacy"> I agree to the <a href="<?= ROOT ?>/user/privacyAndPolicies" class="check-box-link">Privacy Policy</a> detailing how my data will be collected, used, shared, and protected, including my rights regarding my data.</label>
                        
                    </div>
                    
                </div>
                <button class="next-button" type="submit" >Register</button>
                <br>
                <br>
            </div>
        </form>
        </div>
    </div>
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
    </script>
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
    <script src="<?= ROOT ?>/assets/JS/buyerRegisterPage.js"></script>
</body>
</html>