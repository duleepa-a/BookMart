<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminBookView.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Book Detail</title>
</head>
<body>
    <span class = "title">
        <a href="<?= ROOT ?>/home" class="title-link"><h2>Book<span class="highlight">Mart</span></h2></a>
    </span>
    <div class="container">
        <div class="box">
            <form id="form">
                <div class="image-container">
                    <img src="<?= ROOT ?>/assets/Images/admin images/book1.jpg" alt="">
                </div>
                </info>
                <div class="info-row">
                    <span class="label">Book Title :</span>
                    <span class="value" id="adTitle">Daughter Of Man</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Author :</span>
                    <span class="value" id="adTitle">L.J. Sysko</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Submitted By :</span>
                    <span class="value" id="adTitle">Sarasavi Book Shop</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Date Submitted :</span>
                    <span class="value" id="adTitle">2024 October 12</span>
                </div><br>
                <div class="info-row">
                    <span class="label">ISBN :</span>
                    <span class="value" id="adTitle">ISBN987754329</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Genre :</span>
                    <span class="value" id="adTitle">Novel</span>
                </div><br>
                <div class="info-row">
                    <span class="label">Price :</span>
                    <span class="value" id="adTitle">Rs.750</span>
                </div><br>
            </form>
        </div><br>
        <div class="button-group">
            <button type="button" id="deleteBtn" class="btn">Delete</button>
            <button type="button" class="btn">Close</button>
        </div>

</body>
</html>