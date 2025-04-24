<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Message | BookMart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #02224E;
            --primary-hover: #033875;
            --accent-color: #BE5715;
            --accent-hover: #D26A2C;
            --light-bg: #F1F1F1;
            --white: #FFFFFF;
            --gray-100: #F8F9FA;
            --gray-200: #E9ECEF;
            --gray-300: #DEE2E6;
            --gray-400: #CED4DA;
            --gray-500: #ADB5BD;
            --text-dark: #333333;
            --shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-dark);
            line-height: 1.6;
            background-image: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            min-height: 100vh;
        }

        .header {
            padding: 20px 0;
        }

        .header-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            padding: 0 20px;
            margin: 0 auto;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary-color);
            margin: 0;
        }

        .title-link {
            text-decoration: none;
        }

        .highlight {
            color: var(--accent-color);
        }

        .page-title {
            flex-grow: 1;
            text-align: center;
        }

        .page-title h1 {
            font-size: 24px;
            color: var(--accent-color);
            font-weight: 600;
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        #alertContainer {
            max-width: 800px;
            margin: 0 auto 20px;
        }

        .alert {
            padding: 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            opacity: 1;
            transition: opacity 0.3s ease;
        }

        .alert-success {
            background-color: #d1e7dd;
            color: #0f5132;
            border-left: 5px solid #198754;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #842029;
            border-left: 5px solid #dc3545;
        }

        .message-form {
            background-color: var(--white);
            border-radius: 16px;
            box-shadow: var(--shadow);
            padding: 40px;
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .message-form::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--primary-color);
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid var(--gray-300);
            border-radius: 10px;
            background-color: var(--gray-100);
            transition: var(--transition);
            font-size: 15px;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 3px rgba(190, 87, 21, 0.15);
        }

        textarea.form-control {
            min-height: 180px;
            resize: vertical;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .file-input-label {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            background-color: var(--gray-200);
            color: var(--text-dark);
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .file-input-label i {
            margin-right: 8px;
        }

        .file-input-label:hover {
            background-color: var(--gray-300);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .file-input {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
            width: 100%;
            height: 100%;
        }

        .file-name {
            margin-left: 10px;
            font-size: 14px;
            color: var(--gray-500);
            vertical-align: middle;
        }

        .btn-group {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn i {
            margin-right: 8px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-danger {
            background-color: #dc3545;
            color: var(--white);
        }

        .btn-danger:hover {
            background-color: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .header-wrapper {
                flex-direction: column;
                gap: 10px;
            }
            
            .message-form {
                padding: 30px 20px;
                border-radius: 12px;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
            
            .btn-group {
                flex-direction: column-reverse;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-wrapper">
            <div class="logo-container">
                <a href="#" class="title-link">
                    <h2 class="logo">Book<span class="highlight">Mart</span></h2>
                </a>
            </div>
            <div class="page-title">
                <h1>Send Message</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="alertContainer"></div>
        
        <div class="message-form">
            <form id="messageForm" action="<?= ROOT?>/AdminSendmsg/send" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-user"></i> Recipient
                    </label>
                    <input type="email" id="email" name="email" class="form-control" value="<?= $email ?>" placeholder="Enter recipient's email" required>
                </div>
                
                <div class="form-group">
                    <label for="subject" class="form-label">
                        <i class="fas fa-heading"></i> Subject
                    </label>
                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Enter message subject" required>
                </div>
                
                <div class="form-group">
                    <label for="message" class="form-label">
                        <i class="fas fa-comment-alt"></i> Message
                    </label>
                    <textarea id="message" name="message" class="form-control" placeholder="Type your message here..." required></textarea>
                </div>
                
                <div class="btn-group">
                    <button type="button" id="cancelBtn" class="btn btn-danger">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Display file name when selected
        document.getElementById('fileInput').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'No file chosen';
            document.getElementById('fileName').textContent = fileName;
        });
        
        // Cancel button functionality
        document.getElementById('cancelBtn').addEventListener('click', function() {
            window.history.back();
        });
        
        // Form submission with validation
        document.getElementById('messageForm').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            if (!email || !subject || !message) {
                e.preventDefault();
                showAlert('Please fill in all required fields', 'error');
                return false;
            }
            
            if (!validateEmail(email)) {
                e.preventDefault();
                showAlert('Please enter a valid email address', 'error');
                return false;
            }
            
            return true;
        });
        
        // Email validation function
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        // Show alert message
        function showAlert(message, type) {
            const alertContainer = document.getElementById('alertContainer');
            const alertElement = document.createElement('div');
            alertElement.className = `alert alert-${type}`;
            
            // Add icon based on type
            const icon = type === 'success' ? 
                '<i class="fas fa-check-circle" style="margin-right: 8px;"></i>' : 
                '<i class="fas fa-exclamation-circle" style="margin-right: 8px;"></i>';
            
            alertElement.innerHTML = icon + message;
            
            alertContainer.innerHTML = '';
            alertContainer.appendChild(alertElement);
            
            setTimeout(() => {
                alertElement.style.opacity = '0';
                setTimeout(() => {
                    alertContainer.innerHTML = '';
                }, 300);
            }, 3000);
        }
    </script>
</body>
</html>