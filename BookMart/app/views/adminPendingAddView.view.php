<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pending advertisement view</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminPendingAddView.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
    </span>
    <div class="container">
        <div class="box">
            <form id="form">
                <div class="info-row">
                    <span class="label">Title :</span>
                    <span class="value" id="adTitle">New Arrivals</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Description : </span>
                    <span class="value" id="adDescription">
                            Discover the latest and greatest in literature with our newly arrived bestselling novels! 
                            Our exclusive collection features top titles from renowned authors, available at special 
                            prices for a limited time only. Visit our store or browse online to find your next 
                            favorite read today.
                    </span>
                </div><br>
                <div class="info-row">
                    <span class="label">Type : </span>
                    <span class="value">
                            Image 
                            <button class="preview-btn">Preview</button>
                    </span>
                </div><br>
                <div class="info-row">
                    <span class="label">Scheduling Information : </span>
                    <span class="value">
                        Start Date : <span id="startDate">2024/08/26</span>
                        End Date : <span id="endDate">2024/09/09</span>
                    </span>
                </div><br>

                <div class="button-group">
                    <button class="approve-btn">Approve</button>
                    <button class="reject-btn">Reject</button>
                </div>
                
            </form>
        </div>
    </div>
    <script src="<?= ROOT ?>/assets/JS/adminPendingAddView.js"></script>
</body>
</html>





