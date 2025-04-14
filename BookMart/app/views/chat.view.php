<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart Chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/chat.css">
</head>
<body>

    <!-- navBar division begin -->
    <?php include 'homeNavBar.view.php'; ?>
    <!-- navBar division end -->

    <div class="chats-container">
        <div class="chat-list">
            <?php if (!empty($chatList)): ?>
                <?php foreach ($chatList as $chat): ?>
                    <a href="<?= ROOT ?>/chat/chatbox/<?= $chat->user_id ?>" class="chat-link">
                    <div class="chat-item">
                        <div class="chat-avatar">
                            <?= strtoupper(substr($chat->username, 0, 2)); ?>
                        </div>
                        <div class="chat-content">
                            <div class="chats-header">
                                <span class="chat-name"><?= htmlspecialchars($chat->username); ?></span>
                                <span class="chat-time">
                                    <?= date('h:i A', strtotime($chat->last_message_time)); ?>
                                    <?php if ($chat->unread_count > 0): ?>
                                        <span class="unread-badge"><?= $chat->unread_count; ?></span>
                                    <?php endif; ?>
                                </span>
                            </div>
                            <div class="chat-preview"><?= htmlspecialchars($chat->last_message); ?></div>
                        </div>
                    </div>
                    </a>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="no-messages">
                    <p>No messages available. Start a conversation to see messages here!</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer division begin -->
    <?php include 'smallFooter.view.php'; ?>
    <!-- Footer division end -->
    <script>
        window.addEventListener("pageshow", function (event) {
            if (event.persisted || (window.performance && performance.getEntriesByType("navigation")[0].type === "back_forward")) {
                window.location.reload();
            }
        });

        setInterval(function () {
            window.location.reload();
        }, 10000);
        
    </script>
</body>
</html>
