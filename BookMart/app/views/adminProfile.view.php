<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"><!--bell icon-->
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminProfile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Admin Profile</title>
</head>
<body>

    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php';?>
    <!-- navBar division end -->
     
    <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->
     
    <!-- Popup Messages -->
    <?php if (!empty($_SESSION['success_message'])): ?>
        <div class="popup-message popup-success" id="success-popup">
            <div class="message-content">
                <span class="message-icon"><i class="fas fa-check-circle"></i></span>
                <span class="message-text"><?= $_SESSION['success_message']; unset($_SESSION['success_message']); ?></span>
            </div>
            <button class="close-btn" onclick="closePopup('success-popup')"><i class="fas fa-times"></i></button>
        </div>
    <?php endif; ?>
    
    <?php if (!empty($_SESSION['error_message'])): ?>
        <div class="popup-message popup-error" id="error-popup">
            <div class="message-content">
                <span class="message-icon"><i class="fas fa-exclamation-circle"></i></span>
                <span class="message-text"><?= $_SESSION['error_message']; unset($_SESSION['error_message']); ?></span>
            </div>
            <button class="close-btn" onclick="closePopup('error-popup')"><i class="fas fa-times"></i></button>
        </div>
    <?php endif; ?>

    <div class="container"> 
        <div class="box"> 
            <h1>My Profile</h1><br>
            <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('Admin-details', event)">Personal Details</button>
                <button class="tab-button last-child" onclick="showTab('Password-change', event)">Password Change</button>
            </nav><br>

            <!-- Personal Details Form -->
            <form id="personal-details-form" class="profile" action="<?= ROOT ?>/adminProfile/updateUsername" method="POST">
                <div class="tab-content active" id="Admin-details">
                    <div class="profile-group-row">
                        <div class="profile-group">
                            <label for="user-name">User Name:
                            <span class="error" style="display: none; color: red;">This username is requred.</span>
                            <span class="valid" style="display: none; color: green;">Username is available!</span></label>
                            <input type="text" id="user-name" name="username" placeholder="Choose a username" required
                            value="<?= htmlspecialchars($user->username ?? '') ?>">
                        </div>

                        <div class="profile-group">
                            <label for="email">Email Address:</label>
                            <input type="email" id="email" name="email" placeholder="Please enter your email address" required disabled
                            value="<?= htmlspecialchars($user->email ?? '') ?>">
                        </div>
                    </div>
                    <button type="submit" class="save-button" id="save-personal">Update & Save</button>
                </div>
            </form>
            
            <!-- Password Change Form -->
            <form id="password-change-form" class="profile" action="<?= ROOT ?>/adminProfile/changePassword" method="POST">
                <div class="tab-content" id="Password-change">
                    <div class="profile-group-row">
                        <div class="profile-group">
                            <label for="current-password">Current Password:</label>
                            <input type="password" name="current_password" id="current-password" required>
                        </div>
                    </div>
                    <div class="profile-group-row">
                        <div class="profile-group">
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
                            <input type="password" name="new_password" id="password" required>
                        </div>
                        <div class="profile-group">
                            <label for="confirm-password">Confirm New Password:
                                <span class="confirm-password-error" style="display: none; color: red;"> Not matching with the password</span>
                            </label>
                            <input type="password" name="confirm_password" id="confirm-password" required>
                        </div>
                    </div>
                    <button type="submit" class="save-button" id="save-password">Change & Save</button>
                </div>
            </form>

        </div>
    </div>
    <br><br>
    <script src="<?= ROOT ?>/assets/JS/adminProfile.js"></script>
</body>
</html>