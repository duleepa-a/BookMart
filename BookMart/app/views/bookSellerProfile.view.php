<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookSellerProfile.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>My Profile</title> 
</head>

<body>
    
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <div class="container">
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-heading">
                <h1 class="heading"> My Profile </h1>
                </div>
                <div class="profile-right">
                    <form id="profilePicForm" enctype="multipart/form-data">
                        <label for="profile-upload" class="upload-btn">Upload</label>
                        <input type="file" id="profile-upload" name="profile_picture" style="display: none;">
                    </form>

                    <?php if (!empty($bookSeller->profile_picture)): ?>
                        <img id="profileImagePreview" 
                            src="<?= ROOT ?>/assets/Images/bookstore-profile-pics/<?= htmlspecialchars($bookSeller->profile_picture) ?>" 
                            alt="Profile Picture" 
                            class="profile-image">
                    <?php else: ?>
                        <div class="profile-placeholder">
                            <?= strtoupper(substr($bookSeller->full_name, 0, 2)) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <br>
                <nav class="tabs">
                    <button class="tab-button active first-child" onclick="showTab('login-credentials')">Login Credentials</button>
                    <button class="tab-button" onclick="showTab('personal-details')">Personal Details</button>
                    <button class="tab-button" onclick="showTab('bank-details')">Bank Details</button>
                    <button class="tab-button last-child" onclick="showTab('password-change')">Password Change</button>
                </nav>

                <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/bookSellerController/updateLoginDetails" >
                    
                    <div class="tab-content" id="login-credentials" >
                        
                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="user-name">User Name:
                                    <span class="error" style="display: none; color: red;">This username is taken.</span>
                                <span class="valid" style="display: none; color: green;">Username is available!</span></label>
                                <input type="text" id="user-name" name="username" placeholder="Choose a username" required value="<?= htmlspecialchars($bookSeller->username ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="email-manager">Email Address:</label>
                                <input type="email" id="email" name="email" placeholder="Please enter your email address" required disabled value="<?= htmlspecialchars($bookSeller->email ?? '') ?>">
                            </div>
                        </div>
                        <br>
                        <button class="next-button" type="submit" >Change & Save</button>
                        <br>
                        <br><br>
                    </div>
                </form>

                <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/bookSellerController/updatePersonalDetails" >
                    <div class="tab-content" id="personal-details" style="display: none;">
                        
                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="user-full-name">Full Name:</label>
                                <input type="text" id="full-name" name="full-name" placeholder="Enter your full name" required value="<?= htmlspecialchars($bookSeller->full_name ?? '') ?>">
                            </div>
                            <div class="form-group-smaller">
                                <label for="gender">Gender:</label>
                                <select id="gender" name="gender">
                                    <option value="" disabled <?= !isset($bookSeller->gender) ? 'selected' : '' ?>>Choose your gender</option>
                                    <option value="male" <?= ($bookSeller->gender ?? '') === 'male' ? 'selected' : '' ?>>Male</option>
                                    <option value="female" <?= ($bookSeller->gender ?? '') === 'female' ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group-smaller">
                                <label for="dob">Date of birth:</label>
                                <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($bookSeller->dob ?? '') ?>">
                            </div>
                        </div>
                        
                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="phone-number">Phone Number:
                                    <span class="error-phone" style="display: none; color: red;">Please enter a valid phone number</span>
                                </label>
                                <input type="text" id="phone-number" name="phone-number" placeholder="Please enter your phone number" required value="<?= htmlspecialchars($bookSeller->phone_number ?? '') ?>">
                            </div>
                            <div class="form-group">
                                <label for="street-address">Street Address:</label>
                                <input type="text" id="street-address" name="street-address" placeholder="The street address" required value="<?= htmlspecialchars($bookSeller->street_address ?? '') ?>">
                            </div>
                        </div>
                        
                        <div class="form-group-row">
                            <div class="form-group-small">
                                <label for="city">Zone:</label>
                                <select id="city" name="city">
                                    <option value="" disabled <?= !isset($bookSeller->city) ? 'selected' : '' ?>>Select your Zone:</option>
                                    <option value="colombo" <?= $bookSeller->city === 'colombo' ? 'selected' : ''; ?>>Colombo</option>
                                    <option value="dehiwala-mount-lavinia" <?= $bookSeller->city === 'dehiwala-mount-lavinia' ? 'selected' : ''; ?>>Dehiwala-Mount Lavinia</option>
                                    <option value="moratuwa" <?= $bookSeller->city === 'moratuwa' ? 'selected' : ''; ?>>Moratuwa</option>
                                    <option value="negombo" <?= $bookSeller->city === 'negombo' ? 'selected' : ''; ?>>Negombo</option>
                                    <option value="sri-jayawardenepura-kotte" <?= $bookSeller->city === 'sri-jayawardenepura-kotte' ? 'selected' : ''; ?>>Sri Jayawardenepura Kotte</option>
                                    <option value="ja-ela" <?= $bookSeller->city === 'ja-ela' ? 'selected' : ''; ?>>Ja-Ela</option>
                                    <option value="wattala" <?= $bookSeller->city === 'wattala' ? 'selected' : ''; ?>>Wattala</option>
                                    <option value="gampaha" <?= $bookSeller->city === 'gampaha' ? 'selected' : ''; ?>>Gampaha</option>
                                    <option value="kalutara" <?= $bookSeller->city === 'kalutara' ? 'selected' : ''; ?>>Kalutara</option>
                                    <option value="panadura" <?= $bookSeller->city === 'panadura' ? 'selected' : ''; ?>>Panadura</option>
                                    <option value="beruwala" <?= $bookSeller->city === 'beruwala' ? 'selected' : ''; ?>>Beruwala</option>
                                    <option value="pannipitiya" <?= $bookSeller->city === 'pannipitiya' ? 'selected' : ''; ?>>Pannipitiya</option>
                                    <option value="maharagama" <?= $bookSeller->city === 'maharagama' ? 'selected' : ''; ?>>Maharagama</option>

                                    <!-- Central Province -->
                                    <option value="kandy" <?= $bookSeller->city === 'kandy' ? 'selected' : ''; ?>>Kandy</option>
                                    <option value="matale" <?= $bookSeller->city === 'matale' ? 'selected' : ''; ?>>Matale</option>
                                    <option value="nuwara-eliya" <?= $bookSeller->city === 'nuwara-eliya' ? 'selected' : ''; ?>>Nuwara Eliya</option>
                                    <option value="gampola" <?= $bookSeller->city === 'gampola' ? 'selected' : ''; ?>>Gampola</option>
                                    <option value="hatton" <?= $bookSeller->city === 'hatton' ? 'selected' : ''; ?>>Hatton</option>
                                    <option value="nawalapitiya" <?= $bookSeller->city === 'nawalapitiya' ? 'selected' : ''; ?>>Nawalapitiya</option>

                                    <!-- Southern Province -->
                                    <option value="galle" <?= $bookSeller->city === 'galle' ? 'selected' : ''; ?>>Galle</option>
                                    <option value="matara" <?= $bookSeller->city === 'matara' ? 'selected' : ''; ?>>Matara</option>
                                    <option value="hambantota" <?= $bookSeller->city === 'hambantota' ? 'selected' : ''; ?>>Hambantota</option>
                                    <option value="tangalle" <?= $bookSeller->city === 'tangalle' ? 'selected' : ''; ?>>Tangalle</option>
                                    <option value="ambalangoda" <?= $bookSeller->city === 'ambalangoda' ? 'selected' : ''; ?>>Ambalangoda</option>
                                    <option value="weligama" <?= $bookSeller->city === 'weligama' ? 'selected' : ''; ?>>Weligama</option>

                                    <!-- Eastern Province -->
                                    <option value="batticaloa" <?= $bookSeller->city === 'batticaloa' ? 'selected' : ''; ?>>Batticaloa</option>
                                    <option value="trincomalee" <?= $bookSeller->city === 'trincomalee' ? 'selected' : ''; ?>>Trincomalee</option>
                                    <option value="kalmunai" <?= $bookSeller->city === 'kalmunai' ? 'selected' : ''; ?>>Kalmunai</option>
                                    <option value="ampara" <?= $bookSeller->city === 'ampara' ? 'selected' : ''; ?>>Ampara</option>
                                    <option value="eravur" <?= $bookSeller->city === 'eravur' ? 'selected' : ''; ?>>Eravur</option>
                                    <option value="kattankudy" <?= $bookSeller->city === 'kattankudy' ? 'selected' : ''; ?>>Kattankudy</option>

                                    <!-- Northern Province -->
                                    <option value="jaffna" <?= $bookSeller->city === 'jaffna' ? 'selected' : ''; ?>>Jaffna</option>
                                    <option value="vavuniya" <?= $bookSeller->city === 'vavuniya' ? 'selected' : ''; ?>>Vavuniya</option>
                                    <option value="mannar" <?= $bookSeller->city === 'mannar' ? 'selected' : ''; ?>>Mannar</option>
                                    <option value="point-pedro" <?= $bookSeller->city === 'point-pedro' ? 'selected' : ''; ?>>Point Pedro</option>
                                    <option value="chavakachcheri" <?= $bookSeller->city === 'chavakachcheri' ? 'selected' : ''; ?>>Chavakachcheri</option>
                                    <option value="valvettithurai" <?= $bookSeller->city === 'valvettithurai' ? 'selected' : ''; ?>>Valvettithurai</option>

                                    <!-- North Central Province -->
                                    <option value="anuradhapura" <?= $bookSeller->city === 'anuradhapura' ? 'selected' : ''; ?>>Anuradhapura</option>
                                    <option value="polonnaruwa" <?= $bookSeller->city === 'polonnaruwa' ? 'selected' : ''; ?>>Polonnaruwa</option>
                                    <option value="dambulla" <?= $bookSeller->city === 'dambulla' ? 'selected' : ''; ?>>Dambulla</option>

                                    <!-- North Western Province -->
                                    <option value="kurunegala" <?= $bookSeller->city === 'kurunegala' ? 'selected' : ''; ?>>Kurunegala</option>
                                    <option value="puttalam" <?= $bookSeller->city === 'puttalam' ? 'selected' : ''; ?>>Puttalam</option>
                                    <option value="chilaw" <?= $bookSeller->city === 'chilaw' ? 'selected' : ''; ?>>Chilaw</option>
                                    <option value="kuliyapitiya" <?= $bookSeller->city === 'kuliyapitiya' ? 'selected' : ''; ?>>Kuliyapitiya</option>

                                    <!-- Uva Province -->
                                    <option value="badulla" <?= $bookSeller->city === 'badulla' ? 'selected' : ''; ?>>Badulla</option>
                                    <option value="bandarawela" <?= $bookSeller->city === 'bandarawela' ? 'selected' : ''; ?>>Bandarawela</option>
                                    <option value="haputale" <?= $bookSeller->city === 'haputale' ? 'selected' : ''; ?>>Haputale</option>
                                    <option value="monaragala" <?= $bookSeller->city === 'monaragala' ? 'selected' : ''; ?>>Monaragala</option>

                                    <!-- Sabaragamuwa Province -->
                                    <option value="ratnapura" <?= $bookSeller->city === 'ratnapura' ? 'selected' : ''; ?>>Ratnapura</option>
                                    <option value="kegalle" <?= $bookSeller->city === 'kegalle' ? 'selected' : ''; ?>>Kegalle</option>
                                    <option value="balangoda" <?= $bookSeller->city === 'balangoda' ? 'selected' : ''; ?>>Balangoda</option>

                                    <!-- Other Notable Towns -->
                                    <option value="avissawella" <?= $bookSeller->city === 'avissawella' ? 'selected' : ''; ?>>Avissawella</option>
                                    <option value="horana" <?= $bookSeller->city === 'horana' ? 'selected' : ''; ?>>Horana</option>
                                    <option value="minuwangoda" <?= $bookSeller->city === 'minuwangoda' ? 'selected' : ''; ?>>Minuwangoda</option>
                                </select>
                            </div>
                            <div class="form-group-small">
                                <label for="district">District:</label>
                                <select id="district" name="district">
                                    <option value="" disabled <?= !isset($bookSeller->district) ? 'selected' : '' ?>>Please select your district</option>
                                    <option value="ampara" <?= $bookSeller->district === 'ampara' ? 'selected' : ''; ?>>Ampara</option>
                                    <option value="anuradhapura" <?= $bookSeller->district === 'anuradhapura' ? 'selected' : ''; ?>>Anuradhapura</option>
                                    <option value="badulla" <?= $bookSeller->district === 'badulla' ? 'selected' : ''; ?>>Badulla</option>
                                    <option value="batticaloa" <?= $bookSeller->district === 'batticaloa' ? 'selected' : ''; ?>>Batticaloa</option>
                                    <option value="colombo" <?= $bookSeller->district === 'colombo' ? 'selected' : ''; ?>>Colombo</option>
                                    <option value="galle" <?= $bookSeller->district === 'galle' ? 'selected' : ''; ?>>Galle</option>
                                    <option value="gampaha" <?= $bookSeller->district === 'gampaha' ? 'selected' : ''; ?>>Gampaha</option>
                                    <option value="hambantota" <?= $bookSeller->district === 'hambantota' ? 'selected' : ''; ?>>Hambantota</option>
                                    <option value="jaffna" <?= $bookSeller->district === 'jaffna' ? 'selected' : ''; ?>>Jaffna</option>
                                    <option value="kalutara" <?= $bookSeller->district === 'kalutara' ? 'selected' : ''; ?>>Kalutara</option>
                                    <option value="kandy" <?= $bookSeller->district === 'kandy' ? 'selected' : ''; ?>>Kandy</option>
                                    <option value="kegalle" <?= $bookSeller->district === 'kegalle' ? 'selected' : ''; ?>>Kegalle</option>
                                    <option value="kilinochchi" <?= $bookSeller->district === 'kilinochchi' ? 'selected' : ''; ?>>Kilinochchi</option>
                                    <option value="kurunegala" <?= $bookSeller->district === 'kurunegala' ? 'selected' : ''; ?>>Kurunegala</option>
                                    <option value="mannar" <?= $bookSeller->district === 'mannar' ? 'selected' : ''; ?>>Mannar</option>
                                    <option value="matale" <?= $bookSeller->district === 'matale' ? 'selected' : ''; ?>>Matale</option>
                                    <option value="matara" <?= $bookSeller->district === 'matara' ? 'selected' : ''; ?>>Matara</option>
                                    <option value="monaragala" <?= $bookSeller->district === 'monaragala' ? 'selected' : ''; ?>>Monaragala</option>
                                    <option value="mullaitivu" <?= $bookSeller->district === 'mullaitivu' ? 'selected' : ''; ?>>Mullaitivu</option>
                                    <option value="nuwara-eliya" <?= $bookSeller->district === 'nuwara-eliya' ? 'selected' : ''; ?>>Nuwara Eliya</option>
                                    <option value="polonnaruwa" <?= $bookSeller->district === 'polonnaruwa' ? 'selected' : ''; ?>>Polonnaruwa</option>
                                    <option value="puttalam" <?= $bookSeller->district === 'puttalam' ? 'selected' : ''; ?>>Puttalam</option>
                                    <option value="ratnapura" <?= $bookSeller->district === 'ratnapura' ? 'selected' : ''; ?>>Ratnapura</option>
                                    <option value="trincomalee" <?= $bookSeller->district === 'trincomalee' ? 'selected' : ''; ?>>Trincomalee</option>
                                    <option value="vavuniya" <?= $bookSeller->district === 'vavuniya' ? 'selected' : ''; ?>>Vavuniya</option>
                                </select>
                            </div>
                            <div class="form-group-small">
                                <label for="province">Province:</label>
                                <select id="province" name="province">
                                    <option value="" disabled <?= !isset($bookSeller->province) ? 'selected' : '' ?>>Please select your province</option>
                                    <option value="central" <?= $bookSeller->province === 'central' ? 'selected' : ''; ?>>Central</option>
                                    <option value="eastern" <?= $bookSeller->province === 'eastern' ? 'selected' : ''; ?>>Eastern</option>
                                    <option value="north-central" <?= $bookSeller->province === 'north-central' ? 'selected' : ''; ?>>North Central</option>
                                    <option value="northern" <?= $bookSeller->province === 'northern' ? 'selected' : ''; ?>>Northern</option>
                                    <option value="north-western" <?= $bookSeller->province === 'north-western' ? 'selected' : ''; ?>>North Western</option>
                                    <option value="sabaragamuwa" <?= $bookSeller->province === 'sabaragamuwa' ? 'selected' : ''; ?>>Sabaragamuwa</option>
                                    <option value="southern" <?= $bookSeller->province === 'southern' ? 'selected' : ''; ?>>Southern</option>
                                    <option value="uva" <?= $bookSeller->province === 'uva' ? 'selected' : ''; ?>>Uva</option>
                                    <option value="western" <?= $bookSeller->province === 'western' ? 'selected' : ''; ?>>Western</option>
                                </select>
                            </div>
                        </div>
                        
                        <br>
                        <button class="next-button" type="submit">Change & Save</button>
                        <br><br><br><br>
                    </div>
                </form>

                <form id="bankDetailsForm" method="POST" class="registration-form" action="<?= ROOT ?>/bookSellerController/updateBankDetails">
                    <div class="tab-content" id="bank-details" style="display: none;">
                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="bank">Bank:</label>
                                <select id="bank" name="bank" required>
                                    <option value="" disabled <?= empty($bookSeller->bank) ? 'selected' : '' ?>>Choose Bank</option> 
                                    <option value="boc" <?= ($bookSeller->bank ?? '') === 'boc' ? 'selected' : '' ?>>Bank of Ceylon</option>
                                    <option value="sampath" <?= ($bookSeller->bank ?? '') === 'sampath' ? 'selected' : '' ?>>Sampath Bank</option>
                                    <option value="peoples" <?= ($bookSeller->bank ?? '') === 'peoples' ? 'selected' : '' ?>>People's Bank</option>
                                    <option value="hnb" <?= ($bookSeller->bank ?? '') === 'hnb' ? 'selected' : '' ?>>Hatton National Bank</option>
                                    <option value="nsb" <?= ($bookSeller->bank ?? '') === 'nsb' ? 'selected' : '' ?>>National Savings Bank</option>
                                    <option value="seylan" <?= ($bookSeller->bank ?? '') === 'seylan' ? 'selected' : '' ?>>Seylan Bank</option>
                                    <option value="dfcc" <?= ($bookSeller->bank ?? '') === 'dfcc' ? 'selected' : '' ?>>DFCC Bank</option>
                                    <option value="pan-asia" <?= ($bookSeller->bank ?? '') === 'pan-asia' ? 'selected' : '' ?>>Pan Asia Bank</option>
                                    <option value="nation-trust" <?= ($bookSeller->bank ?? '') === 'nation-trust' ? 'selected' : '' ?>>Nations Trust Bank</option>
                                    <option value="commercial-bank" <?= ($bookSeller->bank ?? '') === 'commercial-bank' ? 'selected' : '' ?>>Commercial Bank of Ceylon</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="branch-name">Branch Name:</label>
                                <input type="text" id="branch-name" name="branch-name" placeholder="Enter branch name" value="<?= $bookSeller->branch_name ?? ''; ?>" required>
                            </div>
                        </div>

                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="account-number">Account Number:</label>
                                <input type="text" id="account-number" name="account-number" placeholder="Enter account number" value="<?= $bookSeller->account_number ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="account-name">Account Holder's Name:</label>
                                <input type="text" id="account-name" name="account-name" placeholder="Enter the account holder's name" value="<?= $bookSeller->account_name ?? ''; ?>" required>
                            </div>
                        </div>

                        <button class="next-button" type="submit">Change & Save</button>
                        <br><br>
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

        <!-- Footer division begin -->
        <?php include 'smallFooter.view.php'; ?>
        <!-- Footer division end -->
         
    </div>

    <script src="<?= ROOT ?>/assets/JS/bookSellerProfile.js"></script>
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

        document.getElementById('profile-upload').addEventListener('change', function () {
            const form = document.getElementById('profilePicForm');
            const formData = new FormData(form);

            fetch('<?= ROOT ?>/bookSellerController/uploadProfilePicture', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    console.log(data.imageUrl);
                    document.getElementById('profileImagePreview').src = data.newImagePath;
                    window.location.reload();
                } else {
                    window.location.reload();
                }
            })
            .catch(error => {
                console.error('Upload error:', error);
                window.location.reload();
            });
        });
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
