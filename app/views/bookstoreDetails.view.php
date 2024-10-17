<!-- details.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/bookstoreDetails.css">
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
