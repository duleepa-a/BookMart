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
    <!-- navBar sideBar begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar sideBar end -->
    <div class="container">
        <div class="profile-container">
                <h1 class="heading">My Profile</h1>
                <br>
                <nav class="tabs">
                    <button class="tab-button active first-child" onclick="showTab('login-credentials')">Login Credentials</button>
                    <button class="tab-button" onclick="showTab('personal-details')">Personal Details</button>
                    <button class="tab-button last-child" onclick="showTab('password-change')">Password Change</button>
                </nav>

                <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/buyer/updateLoginDetails" >
                    
                    <div class="tab-content" id="login-credentials" >
                        
                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="user-name">User Name:
                                    <span class="error" style="display: none; color: red;">This username is taken.</span>
                                <span class="valid" style="display: none; color: green;">Username is available!</span></label>
                                <input type="text" id="user-name" name="username" placeholder="Choose a username" required
    value="<?= htmlspecialchars($buyer->username ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="email-manager">Email Address:</label>
                                <input type="email" id="email" name="email" placeholder="Please enter your email address" required disabled
    value="<?= htmlspecialchars($buyer->email ?? '') ?>">
                            </div>
                        </div>
                        <br>
                        <button class="next-button" type="submit" >Change & Save</button>
                        <br>
                        <br><br>
                    </div>
                </form>
                <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/buyer/updatePersonalDetails" >
                    <div class="tab-content" id="personal-details" style="display: none;">
                        
                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="user-full-name">Full Name:</label>
                                <input type="text" id="full-name" name="full-name" placeholder="Enter your full name" required
    value="<?= htmlspecialchars($buyer->full_name ?? '') ?>">
                            </div>
                            <div class="form-group-smaller">
                                <label for="gender">Gender:</label>
                                <select id="gender" name="gender">
                                    <option value="" disabled <?= !isset($buyer->gender) ? 'selected' : '' ?>>Choose your gender</option>
                                    <option value="male" <?= ($buyer->gender ?? '') === 'male' ? 'selected' : '' ?>>Male</option>
                                    <option value="female" <?= ($buyer->gender ?? '') === 'female' ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group-smaller">
                                <label for="dob">Date of birth:</label>
                                <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($buyer->dob ?? '') ?>">
                            </div>
                        </div>
                        
                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="phone-number">Phone Number:
                                    <span class="error-phone" style="display: none; color: red;">Please enter a valid phone number</span>
                                </label>
                                <input type="text" id="phone-number" name="phone-number" placeholder="Please enter your phone number" required
    value="<?= htmlspecialchars($buyer->phone_number ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="street-address">Street Address:</label>
                                <input type="text" id="street-address" name="street-address" placeholder="The street address" required
    value="<?= htmlspecialchars($buyer->street_address ?? '') ?>">
                            </div>
                        </div>
                        
                        <div class="form-group-row">
                            <div class="form-group-small">
                                <label for="city">Zone:</label>
                                <select id="city" name="city">
                                    <option value="" disabled <?= !isset($buyer->city) ? 'selected' : '' ?>>Select your Zone:</option>
                                    <option value="pannipitya" <?= ($buyer->city ?? '') === 'pannipitya' ? 'selected' : '' ?>>Pannipitya</option>
                                    <option value="maharagama" <?= ($buyer->city ?? '') === 'maharagama' ? 'selected' : '' ?>>Maharagama</option>
                                </select>
                            </div>
                            <div class="form-group-small">
                                <label for="district">District:</label>
                                <select id="district" name="district">
                                    <option value="" disabled <?= !isset($buyer->district) ? 'selected' : '' ?>>Please select your district</option>
                                    <option value="colombo" <?= ($buyer->district ?? '') === 'colombo' ? 'selected' : '' ?>>Colombo</option>
                                    <option value="gampaha" <?= ($buyer->district ?? '') === 'gampaha' ? 'selected' : '' ?>>Gampaha</option>
                                    <option value="kalutara" <?= ($buyer->district ?? '') === 'kalutara' ? 'selected' : '' ?>>Kalutara</option>
                                </select>
                            </div>
                            <div class="form-group-small">
                                <label for="province">Province:</label>
                                <select id="province" name="province">
                                    <option value="" disabled <?= !isset($buyer->province) ? 'selected' : '' ?>>Please select your province</option>
                                    <option value="Western" <?= ($buyer->province ?? '') === 'Western' ? 'selected' : '' ?>>Western</option>
                                    <option value="Eastern" <?= ($buyer->province ?? '') === 'Eastern' ? 'selected' : '' ?>>Eastern</option>
                                    <option value="North" <?= ($buyer->province ?? '') === 'North' ? 'selected' : '' ?>>North</option>
                                </select>
                            </div>
                        </div>
                        
                        <br>
                        <button class="next-button" type="submit">Change & Save</button>
                        <br><br><br><br>
                    </div>
                </form>
                <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/changePassword" >
                    <div class="tab-content" id="password-change" style="display: none;">
                        <div class="form-group-row">
                                <div class="form-group">
                                    <label for="password">Current Password:
                                    </label>
                                    <input type="password" name="current-password" id="current-password"  required>
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
    <div id="custom-alert" class="error" style="display: none;">
    <div class="error__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
            </svg>
        </div>
        <div class="error__title" id="alert-message">Alert message goes here</div>
        <div class="error__close" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
            </svg>
        </div>
    </div>  
    <script src="<?= ROOT ?>/assets/JS/buyerProfile.js"></script>
    <script>
        const isLoggedIn = <?= isset($_SESSION['user_id']) ? 'true' : 'false' ?>;

        function showAlert(message, type = "error") {
            const alertBox = document.getElementById("custom-alert");
            const alertMsg = document.getElementById("alert-message");
            const alertMsgbox = document.getElementsByClassName("error")[0];

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
</body>
</html>