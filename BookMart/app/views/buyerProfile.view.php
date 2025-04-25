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
                                    <option value="colombo" <?= $buyer->city === 'colombo' ? 'selected' : ''; ?>>Colombo</option>
                                    <option value="dehiwala-mount-lavinia" <?= $buyer->city === 'dehiwala-mount-lavinia' ? 'selected' : ''; ?>>Dehiwala-Mount Lavinia</option>
                                    <option value="moratuwa" <?= $buyer->city === 'moratuwa' ? 'selected' : ''; ?>>Moratuwa</option>
                                    <option value="negombo" <?= $buyer->city === 'negombo' ? 'selected' : ''; ?>>Negombo</option>
                                    <option value="sri-jayawardenepura-kotte" <?= $buyer->city === 'sri-jayawardenepura-kotte' ? 'selected' : ''; ?>>Sri Jayawardenepura Kotte</option>
                                    <option value="ja-ela" <?= $buyer->city === 'ja-ela' ? 'selected' : ''; ?>>Ja-Ela</option>
                                    <option value="wattala" <?= $buyer->city === 'wattala' ? 'selected' : ''; ?>>Wattala</option>
                                    <option value="gampaha" <?= $buyer->city === 'gampaha' ? 'selected' : ''; ?>>Gampaha</option>
                                    <option value="kalutara" <?= $buyer->city === 'kalutara' ? 'selected' : ''; ?>>Kalutara</option>
                                    <option value="panadura" <?= $buyer->city === 'panadura' ? 'selected' : ''; ?>>Panadura</option>
                                    <option value="beruwala" <?= $buyer->city === 'beruwala' ? 'selected' : ''; ?>>Beruwala</option>
                                    <option value="pannipitiya" <?= $buyer->city === 'pannipitiya' ? 'selected' : ''; ?>>Pannipitiya</option>
                                    <option value="maharagama" <?= $buyer->city === 'maharagama' ? 'selected' : ''; ?>>Maharagama</option>

                                    <!-- Central Province -->
                                    <option value="kandy" <?= $buyer->city === 'kandy' ? 'selected' : ''; ?>>Kandy</option>
                                    <option value="matale" <?= $buyer->city === 'matale' ? 'selected' : ''; ?>>Matale</option>
                                    <option value="nuwara-eliya" <?= $buyer->city === 'nuwara-eliya' ? 'selected' : ''; ?>>Nuwara Eliya</option>
                                    <option value="gampola" <?= $buyer->city === 'gampola' ? 'selected' : ''; ?>>Gampola</option>
                                    <option value="hatton" <?= $buyer->city === 'hatton' ? 'selected' : ''; ?>>Hatton</option>
                                    <option value="nawalapitiya" <?= $buyer->city === 'nawalapitiya' ? 'selected' : ''; ?>>Nawalapitiya</option>

                                    <!-- Southern Province -->
                                    <option value="galle" <?= $buyer->city === 'galle' ? 'selected' : ''; ?>>Galle</option>
                                    <option value="matara" <?= $buyer->city === 'matara' ? 'selected' : ''; ?>>Matara</option>
                                    <option value="hambantota" <?= $buyer->city === 'hambantota' ? 'selected' : ''; ?>>Hambantota</option>
                                    <option value="tangalle" <?= $buyer->city === 'tangalle' ? 'selected' : ''; ?>>Tangalle</option>
                                    <option value="ambalangoda" <?= $buyer->city === 'ambalangoda' ? 'selected' : ''; ?>>Ambalangoda</option>
                                    <option value="weligama" <?= $buyer->city === 'weligama' ? 'selected' : ''; ?>>Weligama</option>

                                    <!-- Eastern Province -->
                                    <option value="batticaloa" <?= $buyer->city === 'batticaloa' ? 'selected' : ''; ?>>Batticaloa</option>
                                    <option value="trincomalee" <?= $buyer->city === 'trincomalee' ? 'selected' : ''; ?>>Trincomalee</option>
                                    <option value="kalmunai" <?= $buyer->city === 'kalmunai' ? 'selected' : ''; ?>>Kalmunai</option>
                                    <option value="ampara" <?= $buyer->city === 'ampara' ? 'selected' : ''; ?>>Ampara</option>
                                    <option value="eravur" <?= $buyer->city === 'eravur' ? 'selected' : ''; ?>>Eravur</option>
                                    <option value="kattankudy" <?= $buyer->city === 'kattankudy' ? 'selected' : ''; ?>>Kattankudy</option>

                                    <!-- Northern Province -->
                                    <option value="jaffna" <?= $buyer->city === 'jaffna' ? 'selected' : ''; ?>>Jaffna</option>
                                    <option value="vavuniya" <?= $buyer->city === 'vavuniya' ? 'selected' : ''; ?>>Vavuniya</option>
                                    <option value="mannar" <?= $buyer->city === 'mannar' ? 'selected' : ''; ?>>Mannar</option>
                                    <option value="point-pedro" <?= $buyer->city === 'point-pedro' ? 'selected' : ''; ?>>Point Pedro</option>
                                    <option value="chavakachcheri" <?= $buyer->city === 'chavakachcheri' ? 'selected' : ''; ?>>Chavakachcheri</option>
                                    <option value="valvettithurai" <?= $buyer->city === 'valvettithurai' ? 'selected' : ''; ?>>Valvettithurai</option>

                                    <!-- North Central Province -->
                                    <option value="anuradhapura" <?= $buyer->city === 'anuradhapura' ? 'selected' : ''; ?>>Anuradhapura</option>
                                    <option value="polonnaruwa" <?= $buyer->city === 'polonnaruwa' ? 'selected' : ''; ?>>Polonnaruwa</option>
                                    <option value="dambulla" <?= $buyer->city === 'dambulla' ? 'selected' : ''; ?>>Dambulla</option>

                                    <!-- North Western Province -->
                                    <option value="kurunegala" <?= $buyer->city === 'kurunegala' ? 'selected' : ''; ?>>Kurunegala</option>
                                    <option value="puttalam" <?= $buyer->city === 'puttalam' ? 'selected' : ''; ?>>Puttalam</option>
                                    <option value="chilaw" <?= $buyer->city === 'chilaw' ? 'selected' : ''; ?>>Chilaw</option>
                                    <option value="kuliyapitiya" <?= $buyer->city === 'kuliyapitiya' ? 'selected' : ''; ?>>Kuliyapitiya</option>

                                    <!-- Uva Province -->
                                    <option value="badulla" <?= $buyer->city === 'badulla' ? 'selected' : ''; ?>>Badulla</option>
                                    <option value="bandarawela" <?= $buyer->city === 'bandarawela' ? 'selected' : ''; ?>>Bandarawela</option>
                                    <option value="haputale" <?= $buyer->city === 'haputale' ? 'selected' : ''; ?>>Haputale</option>
                                    <option value="monaragala" <?= $buyer->city === 'monaragala' ? 'selected' : ''; ?>>Monaragala</option>

                                    <!-- Sabaragamuwa Province -->
                                    <option value="ratnapura" <?= $buyer->city === 'ratnapura' ? 'selected' : ''; ?>>Ratnapura</option>
                                    <option value="kegalle" <?= $buyer->city === 'kegalle' ? 'selected' : ''; ?>>Kegalle</option>
                                    <option value="balangoda" <?= $buyer->city === 'balangoda' ? 'selected' : ''; ?>>Balangoda</option>

                                    <!-- Other Notable Towns -->
                                    <option value="avissawella" <?= $buyer->city === 'avissawella' ? 'selected' : ''; ?>>Avissawella</option>
                                    <option value="horana" <?= $buyer->city === 'horana' ? 'selected' : ''; ?>>Horana</option>
                                    <option value="minuwangoda" <?= $buyer->city === 'minuwangoda' ? 'selected' : ''; ?>>Minuwangoda</option>
                                </select>
                            </div>
                            <div class="form-group-small">
                                <label for="district">District:</label>
                                <select id="district" name="district">
                                    <option value="" disabled <?= !isset($buyer->district) ? 'selected' : '' ?>>Please select your district</option>
                                    <option value="ampara" <?= $buyer->district === 'ampara' ? 'selected' : ''; ?>>Ampara</option>
                                    <option value="anuradhapura" <?= $buyer->district === 'anuradhapura' ? 'selected' : ''; ?>>Anuradhapura</option>
                                    <option value="badulla" <?= $buyer->district === 'badulla' ? 'selected' : ''; ?>>Badulla</option>
                                    <option value="batticaloa" <?= $buyer->district === 'batticaloa' ? 'selected' : ''; ?>>Batticaloa</option>
                                    <option value="colombo" <?= $buyer->district === 'colombo' ? 'selected' : ''; ?>>Colombo</option>
                                    <option value="galle" <?= $buyer->district === 'galle' ? 'selected' : ''; ?>>Galle</option>
                                    <option value="gampaha" <?= $buyer->district === 'gampaha' ? 'selected' : ''; ?>>Gampaha</option>
                                    <option value="hambantota" <?= $buyer->district === 'hambantota' ? 'selected' : ''; ?>>Hambantota</option>
                                    <option value="jaffna" <?= $buyer->district === 'jaffna' ? 'selected' : ''; ?>>Jaffna</option>
                                    <option value="kalutara" <?= $buyer->district === 'kalutara' ? 'selected' : ''; ?>>Kalutara</option>
                                    <option value="kandy" <?= $buyer->district === 'kandy' ? 'selected' : ''; ?>>Kandy</option>
                                    <option value="kegalle" <?= $buyer->district === 'kegalle' ? 'selected' : ''; ?>>Kegalle</option>
                                    <option value="kilinochchi" <?= $buyer->district === 'kilinochchi' ? 'selected' : ''; ?>>Kilinochchi</option>
                                    <option value="kurunegala" <?= $buyer->district === 'kurunegala' ? 'selected' : ''; ?>>Kurunegala</option>
                                    <option value="mannar" <?= $buyer->district === 'mannar' ? 'selected' : ''; ?>>Mannar</option>
                                    <option value="matale" <?= $buyer->district === 'matale' ? 'selected' : ''; ?>>Matale</option>
                                    <option value="matara" <?= $buyer->district === 'matara' ? 'selected' : ''; ?>>Matara</option>
                                    <option value="monaragala" <?= $buyer->district === 'monaragala' ? 'selected' : ''; ?>>Monaragala</option>
                                    <option value="mullaitivu" <?= $buyer->district === 'mullaitivu' ? 'selected' : ''; ?>>Mullaitivu</option>
                                    <option value="nuwara-eliya" <?= $buyer->district === 'nuwara-eliya' ? 'selected' : ''; ?>>Nuwara Eliya</option>
                                    <option value="polonnaruwa" <?= $buyer->district === 'polonnaruwa' ? 'selected' : ''; ?>>Polonnaruwa</option>
                                    <option value="puttalam" <?= $buyer->district === 'puttalam' ? 'selected' : ''; ?>>Puttalam</option>
                                    <option value="ratnapura" <?= $buyer->district === 'ratnapura' ? 'selected' : ''; ?>>Ratnapura</option>
                                    <option value="trincomalee" <?= $buyer->district === 'trincomalee' ? 'selected' : ''; ?>>Trincomalee</option>
                                    <option value="vavuniya" <?= $buyer->district === 'vavuniya' ? 'selected' : ''; ?>>Vavuniya</option>
                                </select>
                            </div>
                            <div class="form-group-small">
                                <label for="province">Province:</label>
                                <select id="province" name="province">
                                    <option value="" disabled <?= !isset($buyer->province) ? 'selected' : '' ?>>Please select your province</option>
                                    <option value="central" <?= $buyer->province === 'central' ? 'selected' : ''; ?>>Central</option>
                                    <option value="eastern" <?= $buyer->province === 'eastern' ? 'selected' : ''; ?>>Eastern</option>
                                    <option value="north-central" <?= $buyer->province === 'north-central' ? 'selected' : ''; ?>>North Central</option>
                                    <option value="northern" <?= $buyer->province === 'northern' ? 'selected' : ''; ?>>Northern</option>
                                    <option value="north-western" <?= $buyer->province === 'north-western' ? 'selected' : ''; ?>>North Western</option>
                                    <option value="sabaragamuwa" <?= $buyer->province === 'sabaragamuwa' ? 'selected' : ''; ?>>Sabaragamuwa</option>
                                    <option value="southern" <?= $buyer->province === 'southern' ? 'selected' : ''; ?>>Southern</option>
                                    <option value="uva" <?= $buyer->province === 'uva' ? 'selected' : ''; ?>>Uva</option>
                                    <option value="western" <?= $buyer->province === 'western' ? 'selected' : ''; ?>>Western</option>
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
    <script src="<?= ROOT ?>/assets/JS/buyerProfile.js"></script>
    <!-- <script>
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
    <?php endif; ?> -->
</body>
</html>