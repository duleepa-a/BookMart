<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Notifications - BookMart</title>
</head>
<body>
    
    <!-- navBar division begin -->
    <?php include 'secondaryNavBar.view.php'; ?>
    <!-- navBar division end -->

    <!-- Sidebar division begin -->
    <?php include 'bookSellerSidebar.view.php'; ?>
    <!-- Sidebar division end -->
    
    <center>
    <div class="background-box">
        <h1 class="title-text">Notifications</h1>
        <br>

        <div class="notifications-container">
            <?php if (!empty($data['notifications'])): ?>
                <?php foreach ($data['notifications'] as $notification): ?>
                    <div class="notification-card" data-id="<?= htmlspecialchars($notification->id) ?>">
                        <div class="notification-header">
                            <h2><?= htmlspecialchars($notification->title) ?></h2>
                            <span class="notification-meta"> | 
                                <?= date('F d, Y', strtotime($notification->created_at)) ?>
                            </span>
                        </div>
                        <div class="notification-content">
                            <p><?= htmlspecialchars($notification->content) ?></p>
                            <?php if(!empty($notification->link)): ?>
                                <a href="<?= ROOT ?><?= htmlspecialchars($notification->link) ?>">View in page</a>
                            <?php endif; ?>
                        </div>
                        <div class="notification-footer">
                            <div class="notification-actions">

                                <button class="delete-notification-btn" data-id="<?= htmlspecialchars($notification->id) ?>">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>

                                
                                <button class="mark-read-btn" data-id="<?= htmlspecialchars($notification->id) ?>">
                                    <i class="fa-solid fa-check"></i> Mark as Read
                                </button>
                                
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <?php if ($data['showPageControl']): ?>
                    <div class="controls">
                        <?php if ($data['hasPrevious']): ?>
                            <form method="get" style="display:inline;">
                                <input type="hidden" name="page" value="<?= $data['page'] - 1 ?>">
                                <button type="submit" class="view-more-button">Previous</button>
                            </form>
                        <?php endif; ?>

                        <span class="page-number">Page <?= $data['page'] ?></span>

                        <?php if ($data['hasNext']): ?>
                            <form method="get" style="display:inline;">
                                <input type="hidden" name="page" value="<?= $data['page'] + 1 ?>">
                                <button type="submit" class="view-more-button">Next</button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            <?php else: ?>
                <p>No notifications found.</p>
            <?php endif; ?>
        </div>
        
    </div>
    </center>

    <br><br>

    <!-- Footer division begin -->
    <?php include 'bookSellerFooter.view.php'; ?>
    <!-- Footer division end -->

    <script>
    document.querySelectorAll('.delete-notification-btn').forEach(button => {
        button.addEventListener('click', () => {
          const id = button.dataset.id;
          const currentPage = <?= json_encode($data['page']) ?>;
      
            if (id) {
                const form = document.createElement('form');
                form.method = 'post';
                form.action = `<?= ROOT ?>/notifications/deleteNotification?page=${currentPage}`;
            
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'notification_id';
                input.value = id;
            
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            }
        });
    });

    document.querySelectorAll('.mark-read-btn').forEach(button => {
        const BASE_URL = "<?= ROOT ?>";
        button.addEventListener('click', function () {
            console.log("Mark as read button clicked");
            const notificationId = this.dataset.id;

            fetch(`${BASE_URL}/notifications/markAsRead`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id: notificationId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.closest('.notification-card').classList.add('read');
                    this.remove();
                }
            });
        });
    });

    </script>
</body>
</html>