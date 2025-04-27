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
    <title>BookMart</title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php';?>
    <!-- navBar division end -->
     
    <!-- navBar division begin -->
    <?php include 'commonSidebar.view.php'; ?>
    <!-- navBar division end -->
    
    <div class="container"> 
        <div id="add-modal"class="modal hidden">
            <div class="modal-overlay"></div>
                <div class="modal-content">
                <form class="add-form" method="POST" action="<?= ROOT ?>/AdminAdvertisment/addAdvertisement" enctype="multipart/form-data">
                    <h2>Add Advertisement</h2>

                    <div class="form-row">
                        <div class="form-item">
                            <label for="title">Advertisement Title:</label>
                            <input type="text" class="input-advertisments" id="title" name="Advertisement_Title" placeholder="Enter Advertisement Title" required>
                        </div>
                        <div class="form-item">
                            <label for="price">Price:</label>
                            <input type="number" class="input-advertisments" id="price" name="Price" placeholder="Enter Price" required>
                        </div>
                    </div>
                          
                    <div class="form-row">
                        <div class="form-item full-width">
                            <label for="description">Description:</label>
                            <input type="text" class="input-advertisments" id="description" name="Advertisement_Description" placeholder="Enter Description" required>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-item">
                            <label for="cover_image">Upload Media Section:</label>
                            <input type="file" class="input-advertisments" id="cover_image" name="cover_image" accept="image/*">
                        </div>
                        <div class="form-item">
                            <label>Recommended image sizes:</label>
                            <small style="color: #666; width:100%"> 1200 × 350 / 1600 × 350 / 1920 × 350 pixels (w × h)</small>
                        </div>
                    </div>
                    
                    <div class="form-row ">
                            <div class="form-item">
                                <label class="date-label">Start Date</label>
                                <input type="datetime-local" id="start-date" name="Start_date" class="input-advertisments">
                            </div>
                            <div class="form-item">
                                <label class="date-label">End Date</label>
                                <input type="datetime-local" id="end-date" name="End_date" class="input-advertisments">
                            </div>
                    </div>
                    
                    <div class="modal-actions">
                        <button type="submit">Add</button>
                        <button type="button" class="cancel close-modal">Cancel</button>
                    </div>
                </form>

                </div>
        </div>                  
        
        <div class="box"> 

            <!--tabs button-->
            <h1 class="inventory-title">Advertisement</h1><br>
            <nav class="tabs">
                <button class="tab-button active first-child" id='new-add-button' onclick="showTab('new-add')">Add New Advertisemants</button>
                <button class="tab-button" id='pending-add-button' onclick="showTab('pending-add')">Pending Advertisemants</button>
                <button class="tab-button last-child" id="approved-add-button" onclick="showTab('approved-add')">Approved Advertisemants</button>
            </nav>

            <div class="tab-content" id="new-add" >
                <div class="add-toolbar">
                    <button class="add-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add Advertisement</button>
                    <input type="text" placeholder="Search Admin Advertisements.." class="add-search-bar" id="searchInput" onkeyup="searchStores()">
                </div>
                
                
                    <!-- Retrieve Advertisements -->
                    <?php if (!empty($advertisements)) : ?>
                        <table class="add-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Image</th>
                                    <th>Advertisement Title</th>
                                    <th>Advertisement Description</th>
                                    <th>Price</th>
                                    <th>Submitted On</th>
                                    <th>Start Date & Time</th>
                                    <th>End Date  & Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($advertisements as $ad) : ?>
                                    <tr class="add-row" 
                                        data-addid="<?= $ad->id ?>" 
                                        data-advertisementtitle="<?= htmlspecialchars($ad->Advertisement_Title) ?>"
                                        data-advertisementdescription="<?= htmlspecialchars($ad->Advertisement_Description) ?>" 
                                        data-advertisementimage="<?= htmlspecialchars($ad->cover_image) ?>" 
                                        data-price="<?= htmlspecialchars($ad->Price) ?>" 
                                        data-submittedon="<?= htmlspecialchars($ad->Submitted_On) ?>" 
                                        data-startdate="<?= htmlspecialchars($ad-> Start_date) ?>" 
                                        data-enddate="<?= htmlspecialchars($ad->End_date) ?>" 
                                        >
                                        <td><input type="checkbox"></td>
                                        <td >
                                            <?php if (!empty($ad->cover_image)): ?>
                                                <img src="<?= ROOT ?>\assets\Images\ads\<?= $ad->cover_image ?>" alt="Ad Image" style="width: 100px; height: auto; object-fit: cover;">
                                            <?php else: ?>
                                                No image
                                            <?php endif; ?>
                                        </td>
                                        <td><?= htmlspecialchars($ad->Advertisement_Title) ?></td>
                                        <td><?= htmlspecialchars($ad-> Advertisement_Description) ?></td>
                                    
                                        <td><?= htmlspecialchars($ad->Price) ?></td>
                                        <td><?= htmlspecialchars($ad->Submitted_On) ?></td>
                                        <td><?= htmlspecialchars($ad->Start_date) ?></td>
                                        <td><?= htmlspecialchars($ad->End_date) ?></td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="pagination-container">
                            <div class="pagination">
                                <button class="page-button previous" 
                                        onclick="window.location.href='?page=<?= max(1, $currentPage - 1) ?>&pending_page=<?= $pendingPage ?>&approved_page=<?= $approvedPage ?>'"
                                        <?= $currentPage <= 1 ? 'disabled' : '' ?>>&lt;</button>
                                
                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                    <button class="page-button <?= $currentPage == $i ? 'active' : '' ?>" 
                                            onclick="window.location.href='?page=<?= $i ?>&pending_page=<?= $pendingPage ?>&approved_page=<?= $approvedPage ?>'">
                                        <?= $i ?>
                                    </button>
                                <?php endfor; ?>
                                
                                <button class="page-button next" 
                                        onclick="window.location.href='?page=<?= min($totalPages, $currentPage + 1) ?>&pending_page=<?= $pendingPage ?>&approved_page=<?= $approvedPage ?>'"
                                        <?= $currentPage >= $totalPages ? 'disabled' : '' ?>>&gt;</button>
                            </div>
                        </div>
                    <!--no add msg-->
                    <?php else : ?>
                        <div class="no-add-message">
                            <p>No Advertisements found. Start adding Advertisements!</p>
                        </div>
                    <?php endif; ?>
            </div>

            <!--update-->
            <div class="modal" id="update-add-modal">
                <div class="modal-overlay"></div>
                <div class="modal-content">
                    <form class="add-form" method="POST" action="<?= ROOT ?>/AdminAdvertisment/updateAdvertisement" enctype="multipart/form-data">
                        <h2 class="full-width">Update Addvertisement</h2>
                        <!-- Fields for the update form -->
                        <input type="hidden" id="update-add-id" name="add_id">
                        <div class="form-row">
                            <div class="form-item ">
                                <label for="update-title">Advertisement_Title:</label>
                                <input type="text" id="update-title" name="Advertisement_Title" required>
                            </div>
                            <div class="form-item ">
                                    <label for="update-price">Price:</label>
                                    <input type="number" id="update-price" name="Price" required>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-item full-width">
                                <label for="update-description">Description:</label>
                                <input type="text" id="update-description" name="Advertisement_Description" required>
                            </div>
                        </div>
                        <div class="form-row ">
                                <div class="form-item">
                                    <label for="Start_date">Start Date:</label>  <input type="datetime-local" id="update-sdate" name="Start_date" required>
                                </div>
                                <div class="form-item">
                                    <label for="End_date">End Date:</label>  <input type="datetime-local" id="update-edate" name="End_date" required>
                                </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item full-width">
                                <div id="update-preview-wrapper">
                                    <label><strong>Current Image Preview:</strong></label>
                                    <img id="update-preview-image" src="" alt="Advertisement Image">
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-actions">
                            <button type="submit">Update</button>
                            <button type="button" class="delete-modal">Delete</button>
                            <button type="button" class="close-modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        
            <!--Delete-->
            <div class="modal" id="delete-add-modal">
                <div class="modal-overlay"></div>
                <div class="modal-content">
                    <form class="delete-add-form" method="POST" action="<?= ROOT ?>/adminAdvertisment/deleteAdvertisement">
                        <h2 class="full-width">Delete Advertisement</h2>
                        <p>Are you sure you want to delete this Advertisement?</p>
                        <p id="delete-add-details"></p> <!-- For displaying book details -->
                        <input type="hidden" id="delete-add-id" name="add_id">
                        <div class="modal-actions">
                            <button type="submit" class="confirm-delete">Delete</button>
                            <button type="button" class="close-modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
  
            

            <!--Pending Advertisement-->
            <div class="tab-content" id="pending-add">
                    <div class="add-toolbar"> 
                        <input type="text" placeholder="Search Pending advertisments" class="add-search-bar" id="searchInput" onkeyup="searchStores()"/>
                    </div>
                    <?php if (!empty($pendingStoreAds)): ?>
                        <table class="advertisement-table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Advertisement Title</th>
                                    <th>Submitted by</th>
                                    <th>Submitted on</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Payment Amount (Rs.)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pendingStoreAds as $ad): ?>
                                    <tr>
                                        <form method="POST" action="<?= ROOT ?>/adminAdvertisment/handleAdDecision">
                                            <input type="hidden" name="ad_id" value="<?= $ad->id ?>">
                                            <td>
                                                <img src="<?= ROOT ?>/assets/Images/store_advertisments/<?= htmlspecialchars($ad->image_path) ?>" alt="Ad Image" style="height: 80px; width: auto;">
                                            </td>
                                            <td><?= htmlspecialchars($ad->title) ?></td>
                                            <td><?= htmlspecialchars($ad->store_name ?? 'N/A') ?></td> <!-- store_name should be joined when fetching -->
                                            <td><?= date('F j, Y, g:i A', strtotime($ad->posted_date)) ?></td>
                                            <td><?= date('F j, Y', strtotime($ad->start_date)) ?></td>
                                            <td><?= date('F j, Y', strtotime($ad->end_date)) ?></td>
                                            <td>
                                                <input type="number" name="payment_amount" min="100" step="0.01" required style="width: 100px;">
                                            </td>
                                            <td>
                                                <button type="submit" name="action" value="accept" class="resolve-btn">Accept</button>
                                                <button type="submit" name="action" value="reject" class="reject-btn">Reject</button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="pagination-container">
                            <div class="pagination">
                                <button class="page-button previous" 
                                        onclick="window.location.href='?pending_page=<?= max(1, $pendingPage - 1) ?>&page=<?= $currentPage ?>&approved_page=<?= $approvedPage ?>'"
                                        <?= $pendingPage <= 1 ? 'disabled' : '' ?>>&lt;</button>
                                
                                <?php for ($i = 1; $i <= $totalPendingPages; $i++): ?>
                                    <button class="page-button <?= $pendingPage == $i ? 'active' : '' ?>" 
                                            onclick="window.location.href='?pending_page=<?= $i ?>&page=<?= $currentPage ?>&approved_page=<?= $approvedPage ?>'">
                                        <?= $i ?>
                                    </button>
                                <?php endfor; ?>
                                
                                <button class="page-button next" 
                                        onclick="window.location.href='?pending_page=<?= min($totalPendingPages, $pendingPage + 1) ?>&page=<?= $currentPage ?>&approved_page=<?= $approvedPage ?>'"
                                        <?= $pendingPage >= $totalPendingPages ? 'disabled' : '' ?>>&gt;
                                </button>
                            </div>
                        </div>
                    <?php else: ?>
                    <div class="no-add-message">
                        <p>No pending advertisements available at the moment.</p>
                    </div>
                    <?php endif; ?>
            </div>


            <!--Approved Advertisement-->
            <div class="tab-content" id="approved-add">
                <div class="add-toolbar"> 
                    <input type="text" placeholder="Search Approved Advertisments.." id="searchInput" onkeyup="searchStores()" class="add-search-bar"/>
                </div>
                <?php if (!empty($approvedAds)): ?>
                    <table class="advertisement-table">
                        <thead>
                            <tr>
                                <th>Advertisement Title</th>
                                <th>Submitted by</th>
                                <th>Advertisement Time</th>
                                <th>Price (Rs.)</th>
                                <th>Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($approvedAds as $ad): ?>
                                <tr>
                                    <td><?= htmlspecialchars($ad->title) ?></td>
                                    <td><?= htmlspecialchars($ad->store_name ?? 'N/A') ?></td>
                                    <td><?= date('Y/m/d', strtotime($ad->start_date)) ?> - <?= date('Y/m/d', strtotime($ad->end_date)) ?></td>
                                    <td><?= number_format($ad->payment_amount, 2) ?></td>
                                    <td>
                                        <span class="tag <?= $ad->active_status? 'tag-green' : 'tag-red' ?>"> <?= $ad->active_status? 'Paid' : 'Unpaid' ?> </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination-container">
                        <div class="pagination">
                            <button class="page-button previous" 
                                    onclick="window.location.href='?approved_page=<?= max(1, $approvedPage - 1) ?>&page=<?= $currentPage ?>&pending_page=<?= $pendingPage ?>'"
                                    <?= $approvedPage <= 1 ? 'disabled' : '' ?>>&lt;</button>
                            
                            <?php for ($i = 1; $i <= $totalApprovedPages; $i++): ?>
                                <button class="page-button <?= $approvedPage == $i ? 'active' : '' ?>" 
                                        onclick="window.location.href='?approved_page=<?= $i ?>&page=<?= $currentPage ?>&pending_page=<?= $pendingPage ?>'">
                                    <?= $i ?>
                                </button>
                            <?php endfor; ?>
                            
                            <button class="page-button next" 
                                    onclick="window.location.href='?approved_page=<?= min($totalApprovedPages, $approvedPage + 1) ?>&page=<?= $currentPage ?>&pending_page=<?= $pendingPage ?>'"
                                    <?= $approvedPage >= $totalApprovedPages ? 'disabled' : '' ?>>&gt;</button>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="no-add-message">
                        <p>No pending advertisements available at the moment.</p>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <script>
        const ROOT = "<?= ROOT ?>";
          // Tab switching - preserve pagination and filter state
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
            
            // Update URL to reflect current tab without reloading
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('tab', tabId);
            history.replaceState(null, null, '?' + urlParams.toString());
        }

        // On page load, check if a specific tab was requested
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const requestedTab = urlParams.get('tab');

            console.log(requestedTab);
            
            if (requestedTab && (requestedTab === 'new-add' || requestedTab === 'pending-add' || requestedTab === 'approved-add')) {
                showTab(requestedTab);
            } else {
                showTab('new-add'); // Default to first tab
            }
        });

    </script>
    <script src="<?= ROOT ?>/assets/JS/adminBookstore.js"></script>
    <script src="<?= ROOT ?>/assets/JS/addAdd.js"></script>

</body>
</html>