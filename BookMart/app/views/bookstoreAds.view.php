<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreInventory.css">
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
     <!-- sideBar division begin -->
     <?php include 'commonSidebar.view.php'; ?>        
    <!-- sideBar division end -->
    <div class="container">
    <div id="add-book-modal"class="modal hidden">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <form class="add-adv-form" method="POST" action="<?= ROOT ?>/BookstoreController/requestAdvertisment" enctype="multipart/form-data">
                <h2 class="full-width">Add Advertisement</h2>

                <!-- Advertisement Title -->
                <div class="form-row">
                    <div class="form-group">
                        <div>
                            <label for="ad_title">Title:</label>
                            <input type="text" id="ad_title" name="title" required>
                        </div>
                    </div>
                        <!-- Ad Image -->
                    <div class="form-group">
                        <div>
                            <label for="ad_image">Advertisement Image:</label>
                            <input type="file" id="ad_image" name="image" accept="image/*" required>
                            <small style="color: #666;">Recommended image size: 1200 × 150 pixels (w × h)</small>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">    
                    <!-- Start Date -->
                        <div>
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date" required>
                        </div>
                    </div>
                    <!-- End Date -->
                    <div class="form-group">
                        <div>
                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date" required>
                        </div>
                    </div>
                </div>
                <!-- Modal Actions -->
                <div class="modal-actions">
                    <button type="submit">Post Ad</button>
                    <button type="button" class="close-modal">Cancel</button>
                </div>
            </form>
        </div>
            
        
    </div>
            <div class="inventory-title ">
                <div class="Heading">
                    <h1>Promotions & Advertisements</h1>
                    <span class="sub-heading">Create and manage ads to attract more book buyers.</span>
                </div>
            </div>
                <div class="inventory-toolbar">
                    <input type="text" placeholder="Search advertisements" class="inventory-search-bar">
                    <div class="filter">
                        <label for="status-filter">SHOW:</label>
                        <select id="status-filter" class="status-filter">
                            <option value="all" <?= $filterStatus === 'all' ? 'selected' : '' ?>>All</option>
                            <option value="pending" <?= $filterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="approved" <?= $filterStatus === 'approved' ? 'selected' : '' ?>>Approved</option>
                            <option value="paid" <?= $filterStatus === 'paid' ? 'selected' : '' ?>>Paid</option>
                            <option value="rejected" <?= $filterStatus === 'rejected' ? 'selected' : '' ?>>Rejected</option>
                        </select>
                    </div>
                    <div class="pagination">
                <!-- Previous Arrow -->
                <div class="pagination-item pagination-arrow <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                    <?php if ($currentPage > 1): ?>
                        <a href="?page=<?= $currentPage - 1 ?>&status=<?= urlencode($filterStatus) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg>
                        </a>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="15 18 9 12 15 6"></polyline>
                        </svg>
                    <?php endif; ?>
                </div>

                <!-- Page Numbers -->
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == 1 || $i == $totalPages || abs($i - $currentPage) <= 1): ?>
                        <div class="pagination-item pagination-number <?= $currentPage == $i ? 'active' : '' ?>">
                            <a href="?page=<?= $i ?>&status=<?= urlencode($filterStatus) ?>" style="color: inherit; text-decoration: none; width: 100%; height: 100%; display: flex; align-items: center; justify-content: center;">
                                <?= $i ?>
                            </a>
                        </div>
                    <?php elseif ($i == 2 && $currentPage > 3 || $i == $totalPages - 1 && $currentPage < $totalPages - 2): ?>
                        <div class="pagination-item pagination-dots">...</div>
                    <?php endif; ?>
                <?php endfor; ?>

                <!-- Next Arrow -->
                <div class="pagination-item pagination-arrow <?= $currentPage >= $totalPages ? 'disabled' : '' ?>">
                    <?php if ($currentPage < $totalPages): ?>
                        <a href="?page=<?= $currentPage + 1 ?>&status=<?= urlencode($filterStatus) ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </a>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    <?php endif; ?>
                </div>
                </div>    
                </div>
                <?php if (!empty($advertisments)): ?>
                <table class="inventory-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Payment</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php foreach ($advertisments as $ad): ?>
                                <tr>

                                    <!-- Image Preview -->
                                    <td class="td-image">
                                        <?php if (!empty($ad->image_path)): ?>
                                            <img src="<?= ROOT ?>\assets\Images\store_advertisments\<?= $ad->image_path ?>" alt="Ad Image" style="width: auto; height: 50px; object-fit: cover;">
                                        <?php else: ?>
                                            No image
                                        <?php endif; ?>
                                    </td>

                                    <td><?= htmlspecialchars($ad->title) ?></td>

                                    <!-- Status with styling -->
                                    <td>
                                        <?php if($ad->status == 'approved'){
                                            $class = 'tag-green';
                                        }else if ($ad->status == 'paid'){
                                            $class = 'tag-blue';
                                        }
                                        else{
                                            $class = 'tag-red';
                                        }
                                        ?>
                                       <span class="tag <?= $class?>"> <?= ucfirst($ad->status) ?> </span>
                                    </td>

                                    <td><?= $ad->start_date ?></td>
                                    <td><?= $ad->end_date ?></td>
                                    <td>Rs. <?= number_format($ad->payment_amount, 2) ?></td>

                                    <!-- Active Status -->
                                    <td>
                                        <?= $ad->active_status == 1 ? '<span class="tag tag-green">Active</span>' : '<span class="tag tag-grey">Inactive</span>' ?>
                                    </td>
                                    <td>
                                    <?php if ($ad->status == 'approved' && $ad->active_status == 0): ?>
                                        <form method="POST" action="<?= ROOT ?>/Payment/payAd">
                                            <input type="hidden" name="ad_id" value="<?= $ad->id ?>">
                                            <input type="hidden" name="amount" value="<?= $ad->payment_amount ?>">
                                            <button type="submit" class="pay-btn">Pay Now</button>
                                        </form>
                                    <?php elseif ($ad->status == 'rejected' || ($ad->status == 'paid' && $ad->active_status == 0)): ?>
                                        <form method="POST" action="<?= ROOT ?>/BookstoreController/deleteAdvertisment">
                                            <input type="hidden" name="ad_id" value="<?= $ad->id ?>">
                                            <button type="submit" class="delete-btn">Delete</button>
                                        </form>
                                    <?php elseif ($ad->status == 'paid'): ?>
                                        <span class="tag tag-green">Paid</span>
                                    <?php else: ?>
                                        <span class="tag tag-grey">-</span>
                                    <?php endif; ?>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
            </table>
            <?php else: ?>
                            <div class="message-div">No advertisements found.</div>
            <?php endif; ?>
    </div>
    <footer class="small-footer">
            <p>&copy; 2024 BookMart, all rights reserved.</p>
    </footer>
    <div id="custom-alert" class="error-alert" style="display: none;">
    <div class="error__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
            </svg>
        </div>
        <div class="error__title" id="alert-message"></div>
        <div class="error__close" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
            </svg>
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/bookstoreAds.js"></script>
    <script src="<?= ROOT ?>/assets/JS/adminBookstore.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const searchBar = document.querySelector(".inventory-search-bar");
            const tableRows = document.querySelectorAll(".inventory-table tbody tr");

            searchBar.addEventListener("input", function () {
                const searchQuery = searchBar.value.toLowerCase();

                tableRows.forEach(row => {
                    const cells = row.querySelectorAll("td");
                    let matchFound = false;
                    const searchableColumns = [2,3,4,5,7];

                    searchableColumns.forEach(index => {
                        const cellText = cells[index]?.textContent.toLowerCase();
                        if (cellText && cellText.includes(searchQuery)) {
                            matchFound = true;
                        }
                    });

                    row.style.display = matchFound ? "" : "none";
                });
            });

            const statusFilter = document.getElementById('status-filter');
            statusFilter.addEventListener('change', () => {
                const selectedStatus = statusFilter.value;
                const urlParams = new URLSearchParams(window.location.search);
                urlParams.set('status', selectedStatus);
                urlParams.set('page', 1); // reset to first page on filter change
                window.location.search = urlParams.toString();
            });
            });
    </script>
    <script>
        function showAlert(message, type = "error") {
            const alertBox = document.getElementById("custom-alert");
            const alertMsg = document.getElementById("alert-message");
            const alertMsgbox = document.getElementsByClassName("error-alert")[0];

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
    <script>
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');

        function setTodayAsMin() {
            const today = new Date();
            const formattedToday = today.toISOString().split('T')[0];
            startDateInput.min = formattedToday;
        }

        function validateDates() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);

            if (!isNaN(startDate)) {
                const minEndDate = new Date(startDate);
                minEndDate.setDate(startDate.getDate() + 1);
                const formattedMinEndDate = minEndDate.toISOString().split('T')[0];
                endDateInput.min = formattedMinEndDate;

                if (endDateInput.value && endDateInput.value < formattedMinEndDate) {
                    endDateInput.value = '';
                }
            } else {
                endDateInput.min = '';
            }
        }

        window.addEventListener('DOMContentLoaded', function () {
            setTodayAsMin();
        });

        startDateInput.addEventListener('change', validateDates);
        endDateInput.addEventListener('change', validateDates);
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