<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/registerForm.css">
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
        <h1>Register BookStore</h1>
        <br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('store-details')">Store Details</button>
            <button class="tab-button" onclick="showTab('owner-details')">Owner Details</button>
            <button class="tab-button" onclick="showTab('bank-details')">Bank Details</button>
            <button class="tab-button last-child" onclick="showTab('legal-agreements')">Legal Agreements</button>
        </nav>

        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/registerBookStore"  enctype="multipart/form-data">
            <div class="tab-content" id="store-details">
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="store-name">Store Name:
                            <span class="error" style="display: none; color: red;">This username is taken.</span>
                        <span class="valid" style="display: none; color: green;">Username is available!</span>
                        </label>
                        <input type="text" id="store-name" placeholder="The name of the bookstore" name="store-name" required>
                    </div>
                    <div class="form-group">
                        <label for="store-name">Email:
                            <span class="error-email" style="display: none; color: red;">This email is already registered.</span>
                            <span class="valid-email" style="display: none; color: green;">Email is available!</span>
                        </label>
                        <input type="email" name="email" id="email" placeholder="The Email of the bookstore" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number">Phone Number:
                            <span class="error-phone" style="display: none; color: red;">Please enter a valid phone number</span>
                        </label>
                        <input type="text" name="phone-number" id="phone-number" placeholder="The contact number of the bookstore" required>
                    </div>
                    <div class="form-group">
                        <label for="street-address">Street Address:</label>
                        <input type="text" name="street-address" id="street-address" placeholder="The street address of the bookstore" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group-small">
                        <label for="city">City:</label>
                        <select id="city" name="city">
                            <option value="" disabled selected>Select the city of the bookstore</option>
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
                        <select id="district" name="district">
                            <option value="" disabled selected>Select the district of the bookstore</option>
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
                        <select id="province" name="province">
                            <option value="" disabled selected>Select the province of the bookstore</option>
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
                        <input type="password" name="password" id="password"  required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password:
                            <span class="confirm-password-error" style="display: none; color: red;"> Not matching with the password</span>
                        </label>
                        <input type="password" name="confirm-password" id="confirm-password"  required>
                    </div>
                </div>
                
                <br>
                <button class="next-button" onclick="showTab('owner-details')" type="button" >Next</button>
                <br><br><br>
            </div>

            <div class="tab-content" id="owner-details" style="display: none;">
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="owner-name">Owner Name:</label>
                        <input type="text" name="owner-name" id="owner-name" placeholder="The name of the owner" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email-owner" id="email-owner" placeholder="The Email address of the owner" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number-owner">Phone Number:
                            <span class="error-phone-owner" style="display: none; color: red;">Please enter a valid phone number</span>
                        </label>
                        <input type="text" name="phone-number-owner" id="phone-number-owner" placeholder="The contact number of the owner" required>
                    </div>
                    <div class="form-group">
                        <label for="NIC-owner">Owner's NIC:
                            <span class="error-nic-owner" style="display: none; color: red;">Please enter a valid NIC number</span>
                        </label>
                        <input type="text" name="NIC-owner" id="NIC-owner" placeholder="The NIC number of the owner" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="manager-name">Manager Name:</label>
                        <input type="text" name="manager-name" id="manager-name" placeholder="The name of the manager" required>
                    </div>
                    <div class="form-group">
                        <label for="email-manager">Email Address:</label>
                        <input type="email" name="email-manager" id="email-manager" placeholder="The Email address of the manager" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number-manager">Phone Number:
                            <span class="error-phone-manager" style="display: none; color: red;">Please enter a valid phone number</span>
                        </label>
                        <input type="text" name="phone-number-manager"  id="phone-number-manager" placeholder="The contact number of the manager" required>
                    </div>
                    <div class="form-group">
                        <label for="NIC-manager">Manager's NIC:
                            <span class="error-nic-manager" style="display: none; color: red;">Please enter a valid NIC number</span>
                        </label>
                        <input type="text" name="NIC-manager" id="NIC-manager" placeholder="The NIC of the manager" required>
                    </div>
                </div>
                <button class="next-button" onclick="showTab('legal-agreements')" type="button" >Next</button>
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

            <div class="tab-content" id="legal-agreements" style="display: none;">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="business-reg-NO">Business Registration Number:</label>
                        <input type="text" name="business-reg-NO" id="business-reg-NO" placeholder="The business number of the bookstore" required>
                    </div>
                    <div class="form-group">
                        <label for="evidence-docs">Upload evidence documents:</label>
                        <input type="file" id="evidence-docs" name="evidence-docs" >
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
    </script>
    <script src="<?= ROOT ?>/assets/JS/bookstoreRegisterPage.js"></script>
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
</body>
</html>