<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminsearch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>View All Users</title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php';?>
    <!-- navBar division end -->
     
    <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->

    <div class="container">
        <div class="box">
            <div class="search-row">
                <h2>Find Users</h2>
                    <input type="text" class="search-input" placeholder="Filter users by User ID or Name" id="searchInput">
                    <select class="sort-by" id="roleFilter" onchange="filterByRole()">
                        <option value="">All Users</option>
                        <option value="buyer" <?= $data['selected_role'] == 'buyer' ? 'selected' : '' ?>>Buyers</option>
                        <option value="bookseller" <?= $data['selected_role'] == 'seller' ? 'selected' : '' ?>>Sellers</option>
                        <option value="bookstore" <?= $data['selected_role'] == 'store' ? 'selected' : '' ?>>Shops</option>
                        <option value="courier" <?= $data['selected_role'] == 'courier' ? 'selected' : '' ?>>Couriers</option>
                    </select>
            </div>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($data['users']) && is_array($data['users'])){
                            foreach ($data['users'] as $user){

                                if ($user->role === "buyer") {
                                    $viewPage = "adminViewbuyer";
                                } elseif ($user->role === "bookSeller") {
                                    $viewPage = "adminViewseller";
                                } elseif ($user->role === "bookStore") {
                                    $viewPage = "adminViewshops";
                                } elseif ($user->role === "courier") {
                                    $viewPage = "adminViewcourier";
                                } else{
                                    continue;
                                }
                                
                                echo "<tr onclick='window.location.href=\"" . ROOT . "/" . $viewPage . "?id=" . $user->ID . "\"'>";
                                echo "<td>" . htmlspecialchars($user->ID) . "</td>";
                                echo "<td>" . htmlspecialchars($user->username) . "</td>";
                                echo "<td>" . htmlspecialchars($user->email) . "</td>";
                                echo "<td>" . htmlspecialchars($user->role) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No users found</td></tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div><br><br><br>

         <!-- Pagination -->
         <?php if(isset($data['totalPages']) && $data['totalPages'] > 1): ?>
            <div class="pagination">
                <?php if($data['currentPage'] > 1): ?>
                    <a href="?page=<?= $data['currentPage'] - 1 ?><?= !empty($data['selected_role']) ? '&role=' . urlencode($data['selected_role']) : '' ?>" class="pagination-btn">&laquo; Previous</a>
                <?php endif; ?>
                
                <?php for($i = 1; $i <= $data['totalPages']; $i++): ?>
                    <a href="?page=<?= $i ?><?= !empty($data['selected_role']) ? '&role=' . urlencode($data['selected_role']) : '' ?>" 
                    class="pagination-btn <?= $i === $data['currentPage'] ? 'active' : '' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>
                
                <?php if($data['currentPage'] < $data['totalPages']): ?>
                    <a href="?page=<?= $data['currentPage'] + 1 ?><?= !empty($data['selected_role']) ? '&role=' . urlencode($data['selected_role']) : '' ?>" class="pagination-btn">Next &raquo;</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        </div>
    </div>
    <br><br>

<script src="<?= ROOT ?>/assets/JS/adminsearch.js"></script>

</body>
</html>
