<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminAdvertisement.css">
    <title>Advertisements</title>
</head>
<body>
    <div class="navBar">
        <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
        </span>
    </div>
    <div class="container"> 
        <h1>Advertisements</h1><br><br>
        <nav class="tabs">
            <button class="tab-button active first-child" onclick="showTab('new-add',event)">Add New Advertisemants</button>
            <button class="tab-button" onclick="showTab('pending-add',event)">Pending Advertisemants</button>
            <button class="tab-button last-child" onclick="showTab('approved-add',event)">Approved Advertisemants</button>
        </nav>

        <br><br><br>
        <form id="Advertisements"  class="form">
            <div class="tab-content" id="new-add">
              
                    <div class="form-group title-group">
                        <label for="title">Advertisemant Title  :</label>
                        <input type="text" id="title" placeholder="Enter Advertisemant Title">
                    </div><br>

                    <div class="form-group desc-group">
                        <label for="description">Description:</label>
                        <input type="text" id="description" placeholder="Enter Description">
                    </div><br>
                
                    <div class="form-group type-group">
                        <label for="type" >Advertisemant Type:</label>
                        <input type="radio" id="image-type" value="image">
                        <label for="image">Image only</label>
                        <input type="radio" id="text-type" value="text">
                        <label for="text">Text only</label>
                        <input type="radio" id="both-type" value="text">
                        <label for="text">Both</label>
                    </div><br>

                    <div class="form-group">
                        <label for="Media">Upload Media Section:</label>
                        <label for="upload-image" class="img">Choose File</label>
                        <div class="upload-text">
                            <input type="text" id="texthere" placeholder="Type Text Here">
                        </div>
                    </div><br>

                    <div class="form-group Schedule-group">
                        <label for="Schedule">Schedule Advertisement:</label>
                        Start Date <input type="date" id="start-date">
                        End Date <input type="date" id="end-date" class="end-class">
                    </div><br>

                    <div class="form-group">
                        <label for="Prev">Preview Advertisemant:</label>
                        <div class="Preview">
                            <button class="preview-button" onclick="showTab('new-add')" >Preview Add</button>
                        </div><br>
                    </div>
               
                <button class="submit-button" onclick="showTab('new-add')" >Submit Advertisemant</button>
                <button class="submit-button" onclick="showTab('new-add')" >Cancel</button>
            </div><br>
        
            <!--Pending Advertisement-->
            <div class="tab-content" id="pending-add">
                <input type="text" class="search-bar" placeholder="Search">
                <br><br>
                <table class="advertisement-table">
                    <thead>
                        <tr>
                            <th>Advertisement Title</th>
                            <th>Submitted by</th>
                            <th>Submitted on</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#">New Arrivals</a></td>
                            <td>Sarasavi Book Shop</td>
                            <td>August 18, 2024, 10.45 AM</td>
                        </tr>
                        <tr>
                            <td><a href="#">Holiday Gift Guide</a></td>
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
                <input type="text" class="search-bar" placeholder="Search">
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
                            <td><a href="#">New Arrivals</a></td>
                            <td>Sarasavi Book Shop</td>
                            <td>2024/08/26 - 2024/09/09</td>
                            <td>10,000</td>
                        </tr>
                        <tr>
                            <td><a href="#">Holiday Gift Guide</a></td>
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

    <script src="<?= ROOT ?>/assets/JS/advertisement.js"></script>
    
</body>
</html>

