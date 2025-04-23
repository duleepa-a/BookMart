<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/addadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>BookMart</title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'adminNavBar.view.php';?>
    <!-- navBar division end -->

    <!-- sideBar division begin -->
    <?php include 'adminSideBar.view.php';?>
    <!-- sideBar division end -->
        
        <!-- Display success and error messages -->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="alert success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        
        <div class= "box">
        <!-- Admin List Table -->
            <div class="admin-list">

                <div class="add-toolbar">
                    <button class="add-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add Admin</button>
                </div>
                
                <h2>Current Administrators</h2>
                <table class="add-table">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($data['user']) && is_array($data['user'])): ?>
                            <?php 
                                $hasAdmin = false;
                                foreach ($data['user'] as $admin): 
                                    if ($admin->role === 'admin'): 
                                        $hasAdmin = true;
                                        $statusClass = isset($admin->active_status) && $admin->active_status == 1 ? 'active' : 'inactive';
                            ?>
                                <tr class="add-row">
                                    <td><?= $admin->username ?></td>
                                    <td><?= $admin->email ?></td>
                                    
                                    <td>
                                        <span class="status-label px-2 py-1 rounded-full text-sm <?= $admin->active_status ? 'bg-green-200 text-green-600' : 'bg-red-200 text-red-600' ?>">
                                        <?= $admin->active_status ? 'active' : 'inactive' ?>
                                        </span>

                                        <label class="switch ml-2">
                                        <input type="checkbox"
                                                class="status-toggle"
                                                data-userid="<?= $admin->ID ?>"
                                                <?= $admin->active_status ? 'checked' : '' ?>>
                                        <span class="slider round"></span>
                                        </label>
                                    </td>
                                    </td>
                                </tr>
                            <?php 
                                    endif; 
                                endforeach; 
                            ?>
                            <?php if (!$hasAdmin): ?>
                                <tr class="add-row">
                                    <td colspan="3">No administrators found</td>
                                </tr>
                            <?php endif; ?>
                        <?php else: ?>
                            <tr class="add-row">
                                <td colspan="3">No administrators found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
    </div>

    <!-- Add Admin Modal -->
    <div class="modal hidden" id="add-modal">
        <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="add-form" method="POST" action="<?= ROOT ?>/SAdminAddAdmin/addAdmin" >
                    <h2 class="full-width">Add New Administrator</h2>

                <div class="form-group">
                    <label for="user-name">User Name:</label>
                    <span class="error" style="display: none; color: red;">This username is taken.</span>
                    <span class="valid" style="display: none; color: green;">Username is available!</span></label>
                    <input type="text" id="username" name="user_name" placeholder="Choose a username" required
                    value="<?= htmlspecialchars($user->username ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter email address" required
                    value="<?= htmlspecialchars($user->email ?? '') ?>">
                    <span class="error-email" style="display: none; color: red;">This email is already registered.</span>
                    <span class="valid-email" style="display: none; color: green;">Email is available!</span>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter password" required
                    value="<?= htmlspecialchars($user->password ?? '') ?>">
                    <span class="password-strength" style="display: none; color: green;">Strong password</span>
                    <span class="password-strength-weak" style="display: none; color: red;">Weak password</span>
                </div>

                <div class="form-group">
                    <label for="confirmpassword">Confirm Password:</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Re-enter password" required
                    value="<?= htmlspecialchars($user->password ?? '') ?>">
                    <span class="confirm-password-error" style="display: none; color: red;">Not matching with the password</span>
                </div>

                <div class="modal-actions">
                    <button type="submit">Add Administrator</button>
                    <button type="button" class="close-modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script src="<?= ROOT ?>/assets/js/addAdmin.js"></script>
</body>
</html>