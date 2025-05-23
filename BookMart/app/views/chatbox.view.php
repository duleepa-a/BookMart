<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMart Chat</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/chat.css">
</head>
<body>

    <!-- navBar division begin -->
    <?php include 'homeNavBar.view.php'; ?>
    <!-- navBar division end -->

    <div class="background-box">
        <div class="chat-container">
            <div class="chat-header">
                <h2><?= $reciverUsername?></h2>
                <i class="fas fa-ellipsis-v"></i>
            </div>
            
            <div class="chat-messages" id="chatMessages" data-receiver-id="<?= $receiverId ?>">
                <?php if(!empty($messages)):?>
                    <?php foreach ($messages as $msg): ?>
                        <div class="message <?= $msg->sender_id == $_SESSION['user_id'] ? 'message-sent' : 'message-received' ?>">
                            <p class="message-text"><?= htmlspecialchars($msg->message) ?></p>
                            <span class="message-time"><?= date("d M Y, h:i A", strtotime($msg->created_at)) ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else :?>
                <?php endif;?>
            </div>

            <div class="chat-input-container">
                <input type="text" class="chat-input" id="chatInput" placeholder="Type your message...">
                <button class="chat-send-button" id="chatSendButton">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- inner background box end -->

    <!-- Footer division begin -->
    <?php include 'smallFooter.view.php'; ?>
    <!-- Footer division end -->

    <script src="<?= ROOT ?>/assets/JS/chat.js"></script>
</body>
</html>