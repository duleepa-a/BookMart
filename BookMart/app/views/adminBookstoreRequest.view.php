<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminAdd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Advertisements</title>
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>
    <!-- navBar division end -->
    <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->
    <div class="container">
        <div class="box">
            <div class="page-title">
                <h1 class="inventory-title">Bookstores</h1><br>
             </div>
            <nav class="tabs">
                <button class="tab-button active first-child" id="pending-stores-button" onclick="showTab('pending-stores')">Pending Requests</button>
                <button class="tab-button last-child" id="accept-stores-button" onclick="showTab('accept-stores')">Accepted Stores</button>
            </nav>
            <div class="tab-content" id="pending-stores">
                <div class="add-toolbar">
                    <input type="text" id="searchInput" onkeyup="searchStores()" placeholder="Search..." class="search">
                </div>
                <?php if (isset($pendingStores) && !empty($pendingStores)): ?>
                <table id="storesTable" class="add-table">
                    <thead>
                        <tr>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Street Address</th>
                            <th>Owner Name</th>
                            <th>Owner Email</th>
                            <th>Date Requested</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pendingStores as $store): ?>
                        <tr>
                            <td><?= htmlspecialchars($store->store_name) ?></td>
                            <td><?= htmlspecialchars($store->manager_email) ?></td>
                            <td><?= htmlspecialchars($store->manager_phone_number) ?></td>
                            <td><?= htmlspecialchars($store->street_address) ?></td>
                            <td><?= htmlspecialchars($store->owner_name) ?></td>
                            <td><?= htmlspecialchars($store->owner_email) ?></td>
                            <td><?= htmlspecialchars($store->createdAt) ?></td>
                            <td><a href="<?= ROOT ?>/admin/viewBookStore/<?= $store->id ?>" class="resolve-btn" style="text-decoration: none;">View</a></td>
                        </tr>
                        <?php endforeach; ?>
                            </div>
                        </div>
                    </tbody>
                </table>
                <div class="pagination-container">
                    <div class="pagination">
                                    <button class="page-button previous" 
                                            onclick="window.location.href='?pending_page=<?= max(1, $pendingPage - 1) ?>&accepted_page=<?= $acceptedPage ?>&tab=<?= $tab ?>'"
                                            <?= $pendingPage <= 1 ? 'disabled' : '' ?>>&lt;</button>
                                    
                                    <?php for ($i = 1; $i <= $totalPendingPages; $i++): ?>
                                        <button class="page-button <?= $pendingPage == $i ? 'active' : '' ?>" 
                                                onclick="window.location.href='?pending_page=<?= $i ?>&accepted_page=<?= $acceptedPage ?>&tab=<?= $tab ?>'">
                                            <?= $i ?>
                                        </button>
                                    <?php endfor; ?>
                                    
                                    <button class="page-button next" 
                                            onclick="window.location.href='?pending_page=<?= min($totalPendingPages, $pendingPage + 1) ?>&accepted_page=<?= $acceptedPage ?>&tab=<?= $tab ?>'"
                                            <?= $pendingPage >= $totalPendingPages ? 'disabled' : '' ?>>&gt;</button>
                    </div>
                </div>
                <?php else: ?>
                        <div class="message-container">
                            <p class="empty-message">No pending bookstores at the moment.</p>
                        </div>
                <?php endif; ?>
            </div>

            

            <div class="tab-content" id="accept-stores" style="display: none;">
                <div class="add-toolbar">
                    <input type="text" id="searchInput" onkeyup="searchStores()" placeholder="Search..." class="search">
                </div>
                <?php if (isset($acceptedStores) && !empty($acceptedStores)): ?>
                <table id="storesTable" class="add-table">
                    <thead>
                        <tr>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Street Address</th>
                            <th>Owner Name</th>
                            <th>Owner Email</th>
                            <th>Date Requested</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($acceptedStores as $store): ?>
                        <tr>
                            <td><?= htmlspecialchars($store->store_name) ?></td>
                            <td><?= htmlspecialchars($store->manager_email) ?></td>
                            <td><?= htmlspecialchars($store->manager_phone_number) ?></td>
                            <td><?= htmlspecialchars($store->street_address) ?></td>
                            <td><?= htmlspecialchars($store->owner_name) ?></td>
                            <td><?= htmlspecialchars($store->owner_email) ?></td>
                            <td><?= htmlspecialchars($store->createdAt) ?></td>
                            <td><a href="<?= ROOT ?>/admin/viewBookStore/<?= $store->id ?>" class="resolve-btn" style="text-decoration: none;">View</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="pagination-container">
                    <div class="pagination">
                                <button class="page-button previous" 
                                        onclick="window.location.href='?accepted_page=<?= max(1, $acceptedPage - 1) ?>&pending_page=<?= $pendingPage ?>&tab=<?= $tab ?>'"
                                        <?= $acceptedPage <= 1 ? 'disabled' : '' ?>>&lt;</button>
                                
                                <?php for ($i = 1; $i <= $totalAcceptedPages; $i++): ?>
                                    <button class="page-button <?= $acceptedPage == $i ? 'active' : '' ?>" 
                                            onclick="window.location.href='?accepted_page=<?= $i ?>&pending_page=<?= $pendingPage ?>&tab=<?= $tab ?>'">
                                        <?= $i ?>
                                    </button>
                                <?php endfor; ?>
                                
                                <button class="page-button next" 
                                        onclick="window.location.href='?accepted_page=<?= min($totalAcceptedPages, $acceptedPage + 1) ?>&pending_page=<?= $pendingPage ?>&tab=<?= $tab ?>'"
                                        <?= $acceptedPage >= $totalAcceptedPages ? 'disabled' : '' ?>>&gt;</button>
                    </div>
                </div>
                <?php else: ?>
                        <div class="message-container">
                            <p class="empty-message">No accepted bookstores at the moment.</p>
                        </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/adminBookstore.js"></script>
    <script>
          function showTab(tabId) {
            // Hide all tab contents
            var tabContents = document.getElementsByClassName('tab-content');
            for (var i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = 'none';
            }

            // Remove 'active' class from all tab buttons
            var tabButtons = document.getElementsByClassName('tab-button');
            for (var i = 0; i < tabButtons.length; i++) {
                tabButtons[i].classList.remove('active');
            }

            const buttonId = tabId + "-button";
            const tabbutton = document.getElementById(buttonId);

            // Show the selected tab content
            document.getElementById(tabId).style.display = 'block';

            // Add 'active' class to the clicked tab button
            tabbutton.classList.add('active');
            
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('tab', tabId);
            history.replaceState(null, null, '?' + urlParams.toString());
        }


        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const requestedTab = urlParams.get('tab');

            console.log(requestedTab);
            
            if (requestedTab && (requestedTab === 'pending-stores' || requestedTab === 'accept-stores')) {
                showTab(requestedTab);
            } else {
                showTab('pending-stores'); 
            }
        });
    </script>
    </body>
    </html>