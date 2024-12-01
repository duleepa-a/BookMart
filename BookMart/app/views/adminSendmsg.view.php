<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/adminSendmsg.css">
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
            <form id="messageForm">
                <div class="form-group">
                    <label for="email">To:</label>
                    <div class="input-wrapper">
                        <input type="email" id="email" name="email" placeholder="Enter Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <div class="input-wrapper">
                        <input type="text" id="subject" name="subject" placeholder="Text input for subject" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <div class="input-wrapper">
                        <textarea id="message" name="message" placeholder="Message" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fileInput">Attachment(optional):</label>
                    <button id="attachButton" class="attach-file">Attach file</button>        
                </div>
                <div class="button-group">
                    <button type="button" id="cancelBtn" class="btn">Cancel</button>
                    <button type="submit" class="btn">Send message</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>