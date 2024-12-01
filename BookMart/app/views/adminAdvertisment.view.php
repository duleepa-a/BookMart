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
    <?php include 'adminNavBar.view.php';?>
    <!-- navBar division end -->
    <div class="sidebar">
        <ul>
            <h1 class="sidebar-heading">Hi Admin!</h1>
            <li><a href="<?= ROOT ?>/"><i class="fa-solid fa-house"></i>Dashboard</a></li>
            <li><a href="<?= ROOT ?>/adminViewallusers"  ><i class="fa-solid fa-users"></i>Users</a></li>
            <li><a href="<?= ROOT ?>/admin/bookstoreView"><i class="fa-solid fa-store"></i>Shops</a></li>
            <li><a href="<?= ROOT ?>/adminSearchorders"><i class="fa-solid fa-cart-plus"></i>Orders</a></li>
            <li><a href="<?= ROOT ?>/adminSearchbooks"><i class="fa-solid fa-book"></i>Books</a></li>
            <li><a href="<?= ROOT ?>/adminViewContactUs"><i class="fa-solid fa-envelope"></i>Complaints</a></li>
            <li><a href="<?= ROOT ?>/adminAdvertisment" class="active"><i class="fa-solid fa-up-right-from-square"></i>Ads</a></li>
            <li><a href="<?= ROOT ?>/adminProfile"><i class="fa-regular fa-user"></i>Profile</a></li>
        </ul>   
    </div>
    
    <div class="container"> 
    <div id="add-modal"class="modal hidden">
        <div class="modal-overlay"></div>
            <div class="modal-content">
                <form class="add-form" method="POST" action="<?= ROOT ?>/AdminAdvertisment/addAdvertisement" enctype="multipart/form-data">
                        <h2 class="full-width">Add Advertisement</h2><br>

                        <!--add advertisement content-->
                        <div class="form-group title-group">
                            <label for="title">Advertisemant Title  :</label>
                            <input type="text" id="title" name="Advertisement_Title" placeholder="Enter Advertisemant Title" required>
                        </div>

                        <div class="form-group desc-group">
                            <label for="description">Description:</label>
                            <input type="text" id="description" name="Advertisement_Description" placeholder="Enter Description" required>
                        </div>
                    
                        <div class="form-group type-group">
                            <label for="type">Advertisement Type:</label>
                            <select id="ad-type-box" onchange="showFields(this.value)" required>
                            <option value="image">Image only</option>
                                <option value="text">Text only</option>
                                <option value="both">Both</option>
                            </select>
                        </div>

                        <div id="media-fields" class="form-group">
                            <label for="Media">Upload Media Section:</label>

                            <!-- Default: Image only -->
                            <div id="image-field">
                                <label for="cover_image">Choose File:</label>
                                <input type="file" id="cover_image" name="cover_image" accept="image/*">
                            </div>
                            <div id="text-field" style="display: none;">
                                <label for="text-content">Type Text Here:</label>
                                <input type="text" id="text-content" name="text_content" placeholder="Type Text Here">
                            </div>
                        </div>

                        <div class="form-group price-group">
                            <label for="title">Price:</label>
                            <input type="number" id="price" name="Price" placeholder="Enter Price" required>
                        </div>
                        
                        <div class="form-group Schedule-group">
                            <label for="Schedule">Schedule Advertisement:</label>
                            Start Date <input type="datetime-local" id="start-date" name="Start_date">
                            End Date <input type="datetime-local" id="end-date" name="End_date" class="end-class">
                        </div><br>

                        <!-- Modal Actions -->
                        <div class="modal-actions">
                            <button type="submit">Add</button>
                            <button type="button" class="close-modal">Cancel</button>
                        </div>
                
                </form>
            </div>
        </div>                  
        
        <div class="box"> 

            <!--tabs button-->
            <h1 class="inventory-title">Advertisement</h1><br>
            <nav class="tabs">
                <button class="tab-button active first-child" onclick="showTab('new-add')">Add New Advertisemants</button>
                <button class="tab-button" onclick="showTab('pending-add')">Pending Advertisemants</button>
                <button class="tab-button last-child" onclick="showTab('approved-add')">Approved Advertisemants</button>
            </nav>

            <div class="tab-content" id="new-add" >
            
                    <div class="add-toolbar">
                        <button class="add-bttn"><span class="compose-icon"><i class="fa-solid fa-plus"></i></span>Add Advertisement</button>
                        <input type="text" placeholder="Search advertisements" class="add-search-bar">
                        <button class="sort-button">Sort by <i class="fa-solid fa-sort-down "></i></button>
                    </div>
                
                    <!-- Retrieve Advertisements -->
                    <?php if (!empty($advertisements)) : ?>
                        <table class="add-table">
                            <thead>
                                <tr>
                                    <th></th>
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
                                        data-advertisementtype="<?= htmlspecialchars($ad->Advertisement_Type) ?>" 
                                        data-price="<?= htmlspecialchars($ad->Price) ?>" 
                                        data-submittedon="<?= htmlspecialchars($ad->Submitted_On) ?>" 
                                        data-startdate="<?= htmlspecialchars($ad-> Start_date) ?>" 
                                        data-enddate="<?= htmlspecialchars($ad->End_date) ?>" 
                                        >
                                        <td><input type="checkbox"></td>

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
                        <div class="form-group title-group">
                            <label for="update-title">Advertisement_Title:</label>
                            <input type="text" id="update-title" name="Advertisement_Title" required>
                        </div>
                        <div class="form-group desc-group">
                            <label for="update-description">Description:</label>
                            <input type="text" id="update-description" name="Advertisement_Description" required>
                        </div>
                        <div class="form-group type-group">
                            <label for="update-type" id="update-type" name="Advertisement_Type" required>Advertisement Type:</label>
                            <select id="book_condition" name="book_condition" required>
                                <option value="image">Image only</option>
                                <option value="text">Text only</option>
                                <option value="both">Both</option>
                            </select>
                        </div>

                        <div class="form-group price-group">
                            <label for="update-price">Price:</label>
                            <input type="number" id="update-price" name="Price" required>
                        </div>
                        <div class="form-group Schedule-group">
                            <label for="Schedule">Schedule Advertisement:</label>
                            Start Date  <input type="datetime-local" id="update-sdate" name="Start_date" required>
                            End Date  <input type="datetime-local" id="update-edate" name="End_date" required>
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
            <div class="tab-content" id="pending-add" >
                <input type="text" class="search" placeholder="Search">
                <br><br>
                <table class="advertisement-table ">
                    <thead>
                        <tr>
                            <th>Advertisement Title</th>
                            <th>Submitted by</th>
                            <th>Submitted on</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr >
                        <a href="<?= ROOT ?>/adminPendingAddView" class="pending-link"> <td>New Arrivals</td></a>
                            <td>Sarasavi Book Shop</td>
                            <td>August 18, 2024, 10.45 AM</td>
                        </tr>
                        <tr> 
                        <a href="<?= ROOT ?>/adminPendingAddView" class="pending-link">
                            <td>Holiday Gift Guide</td>
                        </a>
                            <td>Samudra Book Shop</td>
                            <td>September 12, 2024, 8.40 AM</td>
                            
                        </tr>
                    </tbody>
                </table><br><br><br>

                <div class="pagination">
                    <button class="page-button previous">&lt;</button>
                    <button class="page-button">4</button>
                    <button class="page-button">5</button>
                    <button class="page-button">6</button>
                    <button class="page-button">7</button>
                    <button class="page-button">8</button>
                    <button class="page-button">9</button>
                    <button class="page-button next">&gt;</button>
                </div>
            </div>

            <!--Approved Advertisement-->
            <div class="tab-content" id="approved-add">
                <input type="text" class="search" placeholder="Search">
                <br><br>
                <table class="advertisement-table">
                    <thead>
                        <tr>
                            <th>Advertisement Title</th>
                            <th>Submitted by</th>
                            <th>Advertisement time</th>
                            <th>Price (Rs.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>New Arrivals</td>
                            <td>Sarasavi Book Shop</td>
                            <td>2024/08/26 - 2024/09/09</td>
                            <td>10,000</td>
                        </tr>
                        <tr>
                            <td>Holiday Gift Guide</td>
                            <td>Samudra Book Shop</td>
                            <td>2024/07/10 - 2024/07/24</td>
                            <td>8,000</td>
                        </tr>
                    </tbody>
                </table><br><br><br>

                <div class="pagination">
                    <button class="page-button previous">&lt;</button>
                    <button class="page-button">4</button>
                    <button class="page-button">5</button>
                    <button class="page-button">6</button>
                    <button class="page-button">7</button>
                    <button class="page-button">8</button>
                    <button class="page-button">9</button>
                    <button class="page-button next">&gt</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= ROOT ?>/assets/JS/addAdd.js"></script>

</body>
</html>