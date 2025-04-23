<div class="sidebar">
    <ul>
        <h3 class="sidebar-heading" style="color: #02224E;">
            Hi <?= $_SESSION['username'] ?? 'User' ?>
        </h3><br>

        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'superAdmin'): ?>
            <li>
                <a href="<?= ROOT ?>/SAdminAddAdmin">
                    <i class="fa-solid fa-user"></i>Other Admin
                </a>
            </li>
        <?php endif; ?>


        <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
        <li><a href="<?= ROOT ?>/adminViewallusers"><i class="fa-solid fa-users"></i>Users</a></li>
        <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
        <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
        <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
        <li><a href="<?= ROOT ?>/AdminPaymentInfo"><i class="fa-solid fa-coins"></i>Payment Info</a></li>
        <li><a href="<?= ROOT ?>/adminViewContactUs"><i class="fa-solid fa-envelope"></i>Complaints</a></li>
        <li><a href="<?= ROOT ?>/adminAdvertisment"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
        <li><a href="<?= ROOT ?>/adminProfile"><i class="fa-regular fa-user"></i>Profile</a></li>

    </ul>
</div>


