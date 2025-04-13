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
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <div class="profile-container">
    <h1>My Profile</h1>
        <br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('seller-details')">Seller Details</button>
            <button class="tab-button last-child" onclick="showTab('password-change')">Password change</button>
        </nav>

        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/registerBookSeller">
            <div class="tab-content" id="seller-details">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="seller-name">Seller Name:
                            <span class="error" style="display: none; color: red;">This username is taken.</span>
                            <span class="valid" style="display: none; color: green;">Username is available!</span>
                        </label>
                        <input type="text" id="seller-name" placeholder="The name of the bookSeller" name="seller-name" value="<?= $seller->full_name ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="The Email of the bookSeller" value="<?= $seller->email ?? ''; ?>" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number">Phone Number:</label>
                        <input type="text" name="phone-number" id="phone-number" placeholder="The contact number of the bookSeller" value="<?= $seller->phone_number ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="street-address">Street Address:</label>
                        <input type="text" name="street-address" id="street-address" placeholder="The street address of the bookSeller" value="<?= $seller->street_address ?? ''; ?>" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group-small">
                        <label for="city">City:</label>
                        <select id="city" name="city">
                            <option value="" disabled>Select the city of the bookSeller</option>
                            <option value="pannipitya" <?= $seller->city === 'pannipitya' ? 'selected' : ''; ?>>Pannipitya</option>
                            <option value="maharagama" <?= $seller->city === 'maharagama' ? 'selected' : ''; ?>>Maharagama</option>
                        </select>
                    </div>
                    <div class="form-group-small">
                        <label for="district">District:</label>
                        <select id="district" name="district">
                            <option value="" disabled>Select the district of the bookSeller</option>
                            <option value="colombo" <?= $seller->district === 'colombo' ? 'selected' : ''; ?>>Colombo</option>
                            <option value="gampaha" <?= $seller->district === 'gampaha' ? 'selected' : ''; ?>>Gampaha</option>
                            <option value="kalutara" <?= $seller->district === 'kalutara' ? 'selected' : ''; ?>>Kalutara</option>
                        </select>
                    </div>
                    <div class="form-group-small">
                        <label for="province">Province:</label>
                        <select id="province" name="province">
                            <option value="" disabled>Select the province of the bookSeller</option>
                            <option value="western" <?= $seller->province === 'western' ? 'selected' : ''; ?>>Western</option>
                            <option value="eastern" <?= $seller->province === 'eastern' ? 'selected' : ''; ?>>Eastern</option>
                            <option value="north" <?= $seller->province === 'north' ? 'selected' : ''; ?>>North</option>
                        </select>
                    </div>
                </div>
                <br>
                <button class="next-button" onclick="showTab('owner-details')" type="button">Change & Save</button>
                <br><br><br><br>
            </div>

            <div class="tab-content" id="password-change" style="display: none;">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="password">Current Password:
                        </label>
                        <input type="password" name="password" id="password"  required>
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

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->

    <script src="<?= ROOT ?>/assets/JS/bookSellerProfile.js"></script>

</body>
