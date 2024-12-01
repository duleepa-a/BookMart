<!-- details.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreDetails.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Bookstore Details</title>
</head>
<body>

<div class="container">
    <h1>Bookstore Details</h1>

    <div class="details">
        <p><strong>Store Name:</strong> <?= htmlspecialchars($bookstore->store_name) ?></p>
        <p><strong>Manager Email:</strong> <?= htmlspecialchars($bookstore->manager_email) ?></p>
        <p><strong>Phone Number:</strong> <?= htmlspecialchars($bookstore->manager_phone_number) ?></p>
        <p><strong>Street Address:</strong> <?= htmlspecialchars($bookstore->street_address) ?></p>
        <p><strong>Owner Name:</strong> <?= htmlspecialchars($bookstore->owner_name) ?></p>
        <p><strong>Owner Email:</strong> <?= htmlspecialchars($bookstore->owner_email) ?></p>
        <p><strong>Date Requested:</strong> <?= htmlspecialchars($bookstore->createdAt) ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($bookstore->status) ?></p>
    </div>

    <div class="actions">
        <form action="<?= ROOT ?>/admin/approve" method="POST">
            <input type="hidden" name="id" value="<?= $bookstore->id ?>">
            <button type="submit" class="approve-btn">Approve</button>
        </form>

        <form action="<?= ROOT ?>/admin/reject" method="POST">
            <input type="hidden" name="id" value="<?= $bookstore->id ?>">
            <button type="submit" class="reject-btn">Reject</button>
        </form>
    </div>
</div>

</body>
</html>
