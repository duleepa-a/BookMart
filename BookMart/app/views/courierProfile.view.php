<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart - Courier Profile</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/courierProfile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'homeNavBar.view.php'; ?>
    
    <?php include 'commonSidebar.view.php'; ?>

    <div class="container">
        <div class="profile-container">
            <h1>My Profile</h1> <br><br>
                <br>
                <nav class="tabs">
                    <button class="tab-button active first-child" onclick="showTab('personal-details')">Personal Details</button>
                    <button class="tab-button" onclick="showTab('bank-details')">Bank Details</button>
                    <button class="tab-button" onclick="showTab('vehical-details')">Vehical Details</button>
                    <button class="tab-button last-child" onclick="showTab('change-password')">Change Password</button>
                </nav>
                <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/courierProfile/updatePersonalDetails"  >
                        <div class="tab-content" id="personal-details">
                            
                        <?php if(!empty($courierD)): ?>
                            <?php foreach ($courierD as $courierDetail): ?>
                                <?php if(!empty($courier)): ?>
                                    <?php foreach ($courier as $courierD): ?>

                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="first-name">First Name:</label>
                                    <input type="text" id="first-name" value="<?= $courierDetail->first_name ?>" name="firstname" required>
                                </div>
                                <div class="form-group">
                                    <label for="last-name">Last Name:</label>
                                    <input type="text" id="last-name" value="<?= $courierDetail->last_name ?>" name="lastname" required>
                                </div>
                            </div>
                            
                            <!-- <div class="form-group-row">
                                <div class="form-group">
                                    <label for="user-name">Name with initials:</label>
                                    <input type="text" id="user-name" name="username" placeholder=" " required>
                                </div>
                                
                            </div> -->
            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" id="dob" value="<?= $courierDetail->dob ?>" name="dob" required>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender:</label>
                                    <select id="gender" name="gender" required>
                                        <option value="" disabled selected><?= $courierDetail->gender ?></option> 
                                        <option value="male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="nic">NIC Number:</label>
                                    <input type="text" id="nic" value="<?= $courierDetail->nic_number ?>" name="nic" required>
                                </div>
                                <div class="form-group">
                                    <label for="license">License Number:</label>
                                    <input type="text" id="license" name="license" value="<?= $courierDetail->license_number ?>" required>
                                </div>
                            </div>
                            
                            <div class="form-group-row">
                                <div class="form-group-small">
                                    <label class="Address" for="address">Address line 1:</label>
                                    <input type="text" id="address" name="address" value="<?= $courierDetail->address_line_1 ?>" required>
                                </div>
                                <div class="form-group-small">
                                    <label for="address-line-2">Address line 2:</label>
                                    <input type="text" id="address-line-2" name="address-line-2" value="<?= $courierDetail->address_line_2 ?>" required>
                                </div>
                                <div class="form-group-small">
                                    <label for="city">City:</label>
                                    <input type="text" id="city" value="<?= $courierDetail->city ?>" name="city" required>
                                </div>
                            </div>
            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="phone-number">Phone Number:</label>
                                    <input type="text" id="phone-number" name="phone-number" value="<?= $courierDetail->phone_number ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="secondary-number">Secondary Phone number (optional):</label>
                                    <input type="text" id="secondary-number" name="secondary-number" value="<?= $courierDetail->secondary_phone_number ?>">
                                </div>
                            </div>
                            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="email-address">Email Address:</label>
                                    <input type="text" id="email-address"  name="email" value="<?= $courierD->email ?> " required>
                                </div>
                                
                            </div>
                            
                            <br>
                            <button class="next-button"  type="submit">Change & Save</button>
                            <br><br><br><br>
                        
                        </div>
                    </form>

                    <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/courierProfile/updateBankDetails"  >
                        <div class="tab-content" id="bank-details" style="display: none;">
                            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="bank">Bank:</label>
                                    <select id="bank" name="bank" required>
                                        <option value="" disabled selected><?= $courierDetail->bank ?></option> 
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
                                    <input type="text" id="branch-name" name="branch-name" value="<?= $courierDetail->branch_name ?>" required>
                                </div>
                            </div>
            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="account-number">Account Number:</label>
                                    <input type="text" id="account-number" name="account-number" value="<?= $courierDetail->account_number ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="account-name">Account Name:</label>
                                    <input type="text" id="account-name" name="account-name" value="<?= $courierDetail->account_name ?>" required>
                                </div>
                            </div>
            
                            <br>
                            <button class="next-button"  type="submit">Change & Save</button>
                            <br><br><br><br>
            
                        </div>
                        </form>

                        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/courierProfile/updateVehicalDetails"  >
                        <div class="tab-content" id="vehical-details" style="display: none;">
                            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="vehical-type">Vehicle Type:</label>
                                    <select id="vehical-type" name="vehical-type" required>
                                        <option value="" disabled selected><?= $courierDetail->vehicle_type ?></option> 
                                        <option value="bike">Bike</option>
                                        <option value="three-wheeler">Three-Wheeler</option>
                                        <option value="car">Car</option>
                                        <option value="van">Van</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="vehical-model">Vehicle Model:</label>
                                    <input type="text" id="vehical-model" 
                                    name="vehical-model"  value="<?= $courierDetail->vehicle_model ?>" required>
                                </div>
                            </div>
                
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="vehical-registration-number">Vehicle Registration Number:</label>
                                    <input type="text" id="vehical-registration-number" value="<?= $courierDetail->vehicle_registration_number ?>" name="vehical-registration-number" required>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="vehical-registration-document">Upload Vehical Registration Documents:</label>
                                    <input type="file" id="vehical-registration-document" name="vehical-registration-document" placeholder=" ">
                                </div> -->
                            </div>
            
                            <br>
                            <button class="next-button"  type="submit">Change & Save</button>
                            <br><br><br><br>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <?php endforeach; ?>
                                <?php else: ?>
                                    <!-- <p>No</p> -->
                                <?php endif; ?>
                        </div>
                        </form>
                        
            
                        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/changePassword">
                        <div class="tab-content" id="change-password" style="display: none;">
                            
                            <div class="form-group-row">
                                <div class="form-group">
                                    <label for="current-password">Current Password:</label>
                                    <input type="text" id="current-password"  name="current-password" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="vehical-registration-document"><a href="#">Forgot Password ?</a></label> -->
                                    
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
    <script src="<?= ROOT ?>/assets/JS/courierProfile.js"></script>
</body>
</html>