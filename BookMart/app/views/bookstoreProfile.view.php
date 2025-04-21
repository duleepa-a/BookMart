<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreProfile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>BookMart</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>        
    <!-- navBar division end -->
    <div class="sidebar">
        <ul>
            <li><button class="add-book-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add book</button></li>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/inventory"  ><i class="fa-solid fa-book"></i>My Inventory</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/Analytics"><i class="fa-solid fa-chart-column"></i>Analytics</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/orders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/getReviews"><i class="fa-solid fa-comment-dots"></i>Reviews</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/advertisments"><i class="fa-solid fa-up-right-from-square"></i>Ads & Offers</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/coupons"><i class="fa-solid fa-ticket"></i>Coupons</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/payRolls" ><i class="fa-solid fa-money-bill"></i>Payrolls</a></li>
            <li><a href="<?= ROOT ?>/BookstoreController/myProfile" class="active"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    <div class="container"> 
    <div id="add-book-modal"class="modal hidden">
            <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="add-book-form" method="POST" action="<?= ROOT ?>/book/addBook" enctype="multipart/form-data">
                    <h2 class="full-width">Add Book</h2>

                    <!-- Title -->
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title" required>
                    </div>

                    <!-- ISBN -->
                    <div>
                        <label for="ISBN">ISBN:</label>
                        <input type="text" id="ISBN" name="ISBN" required>
                    </div>

                    <!-- Author -->
                    <div>
                        <label for="author">Author:</label>
                        <input type="text" id="author" name="author" required>
                    </div>

                    <!-- Genre -->
                    <div>
                        <label for="genre">Genre:</label>
                        <select id="genre" name="genre" required>
                        <option value="">-- Select Genre --</option>
                        <option value="fiction">Fiction</option>
                        <option value="non-fiction">Non-Fiction</option>
                        <option value="mystery">Mystery</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="science-fiction">Science Fiction</option>
                        <option value="biography">Biography</option>
                        <option value="history">History</option>
                        <option value="children">Children</option>
                        <option value="romance">Romance</option>
                        </select>
                    </div>

                    <!-- Publisher -->
                    <div>
                        <label for="publisher">Publisher:</label>
                        <input type="text" id="publisher" name="publisher" required>
                    </div>

                    <!-- Cover Image -->
                    <div>
                        <label for="cover_image">Cover Image:</label>
                        <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" step="0.01" min="0.01" required>
                    </div>

                    <!-- Discount -->
                    <div>
                        <label for="discount">Discount (%):</label>
                        <input type="number" id="discount" name="discount" step="0.01" min="0" max="100">
                    </div>

                    <!-- Quantity -->
                    <div>
                        <label for="quantity">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" min="1" required>
                    </div>

                    <!-- Condition -->
                    <div>
                        <label for="book_condition">Condition:</label>
                        <select id="book_condition" name="book_condition" required>
                        <option value="new">New</option>
                        <option value="like-new">Like New</option>
                        <option value="good">Good</option>
                        <option value="acceptable">Acceptable</option>
                        <option value="poor">Poor</option>
                        </select>
                    </div>

                    <!-- Language -->
                    <div>
                        <label for="language">Language:</label>
                        <select id="language" name="language" required>
                        <option value="english">English</option>
                        <option value="sinhala">Sinhala</option>
                        <option value="tamil">Tamil</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="full-width">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>

                    <!-- Modal Actions -->
                    <div class="modal-actions">
                        <button type="submit">Add</button>
                        <button type="button" class="close-modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
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

                <?php if (!empty($store->profile_picture)): ?>
                    <img id="profileImagePreview" 
                        src="<?= ROOT ?>/assets/Images/bookstore-profile-pics/<?= htmlspecialchars($store->profile_picture) ?>" 
                        alt="Profile Picture" 
                        class="profile-image">
                <?php else: ?>
                    <div class="profile-placeholder">
                        <?= strtoupper(substr($store->store_name, 0, 2)) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('store-details')">Store Details</button>
            <button class="tab-button" onclick="showTab('owner-details')">Owner Details</button>
            <button class="tab-button" onclick="showTab('bank-details')">Bank Details</button>
            <button class="tab-button last-child" onclick="showTab('password-change')">Password change</button>
        </nav>

        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/BookstoreController/updateStoreDetails">
            <div class="tab-content" id="store-details">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="store-name">Store Name:
                            <span class="error" style="display: none; color: red;">This username is taken.</span>
                            <span class="valid" style="display: none; color: green;">Username is available!</span>
                        </label>
                        <input type="text" id="store-name" placeholder="The name of the bookstore" name="store-name" value="<?= $store->store_name ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="The Email of the bookstore" value="<?= $store->email ?? ''; ?>" disabled>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number">Phone Number:</label>
                        <span class="error-phone" style="display: none; color: red;">Please enter a valid phone number</span>
                        <input type="text" name="phone-number" id="phone-number" placeholder="The contact number of the bookstore" value="<?= $store->phone_number ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="street-address">Street Address:</label>
                        <input type="text" name="street-address" id="street-address" placeholder="The street address of the bookstore" value="<?= $store->street_address ?? ''; ?>" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group-small">
                        <label for="city">City:</label>
                        <select id="city" name="city">
                            <option value="" disabled>Select the city of the bookstore</option>
                            <option value="pannipitya" <?= $store->city === 'pannipitya' ? 'selected' : ''; ?>>Pannipitya</option>
                            <option value="maharagama" <?= $store->city === 'maharagama' ? 'selected' : ''; ?>>Maharagama</option>
                        </select>
                    </div>
                    <div class="form-group-small">
                        <label for="district">District:</label>
                        <select id="district" name="district">
                            <option value="" disabled>Select the district of the bookstore</option>
                            <option value="colombo" <?= $store->district === 'colombo' ? 'selected' : ''; ?>>Colombo</option>
                            <option value="gampaha" <?= $store->district === 'gampaha' ? 'selected' : ''; ?>>Gampaha</option>
                            <option value="kalutara" <?= $store->district === 'kalutara' ? 'selected' : ''; ?>>Kalutara</option>
                        </select>
                    </div>
                    <div class="form-group-small">
                        <label for="province">Province:</label>
                        <select id="province" name="province">
                            <option value="" disabled>Select the province of the bookstore</option>
                            <option value="western" <?= $store->province === 'western' ? 'selected' : ''; ?>>Western</option>
                            <option value="eastern" <?= $store->province === 'eastern' ? 'selected' : ''; ?>>Eastern</option>
                            <option value="north" <?= $store->province === 'north' ? 'selected' : ''; ?>>North</option>
                        </select>
                    </div>
                </div>
                <br>
                <button class="next-button" type="submit">Change & Save</button>
                <br><br><br><br>
            </div>
        </form>
        
        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/BookstoreController/updateOwnerDetails">
            <div class="tab-content" id="owner-details" style="display: none;">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="owner-name">Owner Name:</label>
                        <input type="text" name="owner-name" id="owner-name" placeholder="The name of the owner" value="<?= $store->owner_name ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email-owner">Email Address:</label>
                        <input type="email" name="email-owner" id="email-owner" placeholder="The Email address of the owner" value="<?= $store->owner_email ?? ''; ?>" required>
                    </div>
                </div>
                
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="phone-number-owner">Phone Number:
                        <span class="error-phone-owner" style="display: none; color: red;">Please enter a valid phone number</span>
                        </label>
                        <input type="text" name="phone-number-owner" id="phone-number-owner" placeholder="The contact number of the owner" value="<?= $store->owner_phone_number ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="NIC-owner">Owner's NIC:
                            <span class="error-nic-owner" style="display: none; color: red;">Please enter a valid NIC number</span>
                        </label>
                        <input type="text" name="NIC-owner" id="NIC-owner" placeholder="The NIC number of the owner" value="<?= $store->owner_nic ?? ''; ?>" required>
                    </div>
                </div>

                <div class="form-group-row">
                        <div class="form-group">
                            <label for="manager-name">Manager Name:</label>
                            <input 
                                type="text" 
                                name="manager-name" 
                                id="manager-name" 
                                placeholder="The name of the manager" 
                                value="<?= isset($store->manager_name) ? $store->manager_name : ''; ?>" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="email-manager">Email Address:</label>
                            <input 
                                type="email" 
                                name="email-manager" 
                                id="email-manager" 
                                placeholder="The Email address of the manager" 
                                value="<?= isset($store->manager_email) ? $store->manager_email : ''; ?>" 
                                required>
                        </div>
                    </div>

                    <div class="form-group-row">
                        <div class="form-group">
                            <label for="phone-number-manager">Phone Number:
                                <span class="error-phone-manager" style="display: none; color: red;">Please enter a valid phone number</span>
                            </label>
                            <input 
                                type="text" 
                                name="phone-number-manager"  
                                id="phone-number-manager" 
                                placeholder="The contact number of the manager" 
                                value="<?= isset($store->manager_phone_number) ? $store->manager_phone_number : ''; ?>" 
                                required>
                        </div>
                        <div class="form-group">
                            <label for="NIC-manager">Manager's NIC:
                                <span class="error-nic-manager" style="display: none; color: red;">Please enter a valid NIC number</span>
                            </label>
                            <input 
                                type="text" 
                                name="NIC-manager" 
                                id="NIC-manager" 
                                placeholder="The NIC of the manager" 
                                value="<?= isset($store->manager_nic) ? $store->manager_nic : ''; ?>" 
                                required>
                        </div>
                    </div>
                <button class="next-button" type="submit" >Change & Save</button>
                <br>
                <br>    
            </div>
        </form>
        <form id="bankDetailsForm" method="POST" class="registration-form" action="<?= ROOT ?>/BookstoreController/updateBankDetails">
            <div class="tab-content" id="bank-details" style="display: none;">
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="bank">Bank:</label>
                        <select id="bank" name="bank" required>
                            <option value="" disabled <?= empty($store->bank) ? 'selected' : '' ?>>Choose Bank</option> 
                            <option value="boc" <?= ($store->bank ?? '') === 'boc' ? 'selected' : '' ?>>Bank of Ceylon</option>
                            <option value="sampath" <?= ($store->bank ?? '') === 'sampath' ? 'selected' : '' ?>>Sampath Bank</option>
                            <option value="peoples" <?= ($store->bank ?? '') === 'peoples' ? 'selected' : '' ?>>People's Bank</option>
                            <option value="hnb" <?= ($store->bank ?? '') === 'hnb' ? 'selected' : '' ?>>Hatton National Bank</option>
                            <option value="nsb" <?= ($store->bank ?? '') === 'nsb' ? 'selected' : '' ?>>National Savings Bank</option>
                            <option value="seylan" <?= ($store->bank ?? '') === 'seylan' ? 'selected' : '' ?>>Seylan Bank</option>
                            <option value="dfcc" <?= ($store->bank ?? '') === 'dfcc' ? 'selected' : '' ?>>DFCC Bank</option>
                            <option value="pan-asia" <?= ($store->bank ?? '') === 'pan-asia' ? 'selected' : '' ?>>Pan Asia Bank</option>
                            <option value="nation-trust" <?= ($store->bank ?? '') === 'nation-trust' ? 'selected' : '' ?>>Nations Trust Bank</option>
                            <option value="commercial-bank" <?= ($store->bank ?? '') === 'commercial-bank' ? 'selected' : '' ?>>Commercial Bank of Ceylon</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="branch-name">Branch Name:</label>
                        <input type="text" id="branch-name" name="branch-name" placeholder="Enter branch name" value="<?= $store->branch_name ?? ''; ?>" required>
                    </div>
                </div>

                <div class="form-group-row">
                    <div class="form-group">
                        <label for="account-number">Account Number:</label>
                        <input type="text" id="account-number" name="account-number" placeholder="Enter account number" value="<?= $store->account_number ?? ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="account-name">Account Holder's Name:</label>
                        <input type="text" id="account-name" name="account-name" placeholder="Enter the account holder's name" value="<?= $store->account_name ?? ''; ?>" required>
                    </div>
                </div>

                <button class="next-button" type="submit">Change & Save</button>
                <br><br>
            </div>
        </form>

        <form id="registerForm" method="POST" class="registration-form" action="<?= ROOT ?>/user/changePassword">
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
    <script src="<?= ROOT ?>/assets/JS/bookstoreProfile.js"></script>
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
        document.getElementById('profile-upload').addEventListener('change', function () {
            const form = document.getElementById('profilePicForm');
            const formData = new FormData(form);

            fetch('<?= ROOT ?>/BookstoreController/uploadProfilePicture', {
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
    <?php endif; ?>
</body>
</html>