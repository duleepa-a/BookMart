<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminShopdetail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Shop Details</title>
</head>
<body>
    <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
    </span>
    <div class="container">
        <div class="box">
            <form id="form">
                <div class="info-row">
                    <span class="label">Shop Name :</span>
                    <span class="value" id="adTitle">VijithaYapa Book Shop</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Owner :</span>
                    <span class="value" id="adTitle">Mr. E.K. Lakshan</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Address :</span>
                    <span class="value" id="adTitle">123 Main St, Asiri Rd, Matara</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Contact :</span>
                    <span class="value" id="adTitle">041-7853202</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Date Applied :</span>
                    <span class="value" id="adTitle">2024/08/24</span>
                </div><br>
            </form>
        </div><br>
        <div class="button-group">
            <button type="button" id="deleteBtn" class="btn">Approve</button>
            <button type="button" class="btn">Reject</button>
        </div>

</body>
</html>