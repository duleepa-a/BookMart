<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>System Statistics</title>
    <style>

        * {
            margin: 0;
            box-sizing: border-box;
            font-family: 'poppins',Calibri, sans-serif;
        }

        body {
            background-color: #F1F1F1;
        }
        .container {
            width: 90%;
            margin-top: 5%;
            margin-left: 5%;
            text-align: left;
        }

        .container h1{
            margin-top: 10px;
            color: #02224E;
        }

        .box {
            width: 98%;
            background-color: #ffffff;
            padding: 2%;
            border-radius: 10px;
            margin: auto;
            
        }


        .header {
            padding: 15px 0;
        }

        .header-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .title-link {
            text-decoration: none;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color:#02224E;
            letter-spacing: -0.5px;
        }

        .highlight {
            color: #BE5715;
        }

        .page-title h1 {
            font-size: 24px;
            font-weight: 600;
            color: #BE5715;
            position: relative;
        }

        .page-title h1::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, #BE5715, transparent);
            border-radius:3px;
        }

        .container h1{
            margin-top: 10px;
            color: #02224E;
        }
      
        
        /* Success and error messages */
        .success-message {
            background-color: #dff0d8;
            color: #3c763d;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border-left: 5px solid #3c763d;
        }
        
        .error-message {
            background-color: #f2dede;
            color: #a94442;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border-left: 5px solid #a94442;
        }
        
        /* Editable table styles */
        .editable input {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .save-button {
            border:solid 3px #02224E;
            color: #02224E;
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        
        .save-button:hover {
            border:solid 3px #02224E;
            color: #ffffff;
            background-color:  #02224E;
        }

        .table-container {
            width: 100%;
            padding: 20px;
            background-color: #fff;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-family: Arial, sans-serif;
            background: #fff;
            font-size: 14px;
        }
        
        .table thead th {
            background-color: #f4f7fc;
            color: #555;
            padding: 14px;
            font-weight: bold;
        }

        .table th, .table td { 
            padding: 18px;
            text-align: left;
        }
        
        .table td:first-child, .table th:first-child {
            width: 150px;
            text-align: center;
        }
        
        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f9f6f4;
            cursor: pointer;
        }
 
        .button-group {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }
        
        .close-btn {
            border:solid 3px #02224E;
            color: #02224E;
            padding: 2px 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .close-btn:hover {
            background-color: #02224E;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-wrapper">
            <div class="logo-container">
                <a href="<?= ROOT ?>/home" class="title-link">
                    <h2 class="logo">Book<span class="highlight">Mart</span></h2>
                </a>
            </div>
            
        </div>
    </div>
    <div class="container">
        <div class="box">
            <div class="page-title">
                    <h1>System Statistics</h1>
                </div>
                <!-- Success/Error Messages -->
                <?php if(isset($_SESSION['success_message'])): ?>
                    <div class="success-message">
                        <?= $_SESSION['success_message']; ?>
                        <?php unset($_SESSION['success_message']); ?>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($_SESSION['error_message'])): ?>
                    <div class="error-message">
                        <?= $_SESSION['error_message']; ?>
                        <?php unset($_SESSION['error_message']); ?>
                    </div>
                <?php endif; ?>

                <form id="system-stats-form" action="<?= ROOT ?>/adminSystemStat/updateStat" method="POST">
                    <div class="table-container">
                        <?php if (!empty($stats)) : ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>System Fee from Book %</th>
                                        <th>System Fee from Courier %</th>
                                        <th>Delivery Fee (Rs.)</th>
                                        <th>System Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="editable">
                                        <td>
                                            <input type="number" step="0.01" name="systemfee_book" min="0" max="100"
                                                value="<?= htmlspecialchars($stats->systemfee_book ?? '') ?>" required>
                                        </td>
                                        <td>
                                            <input type="number" step="0.01" name="systemfee_add" min="0" max="100"
                                                value="<?= htmlspecialchars($stats->systemfee_add ?? '') ?>" required>
                                        </td>
                                        <td>
                                            <input type="number" step="0.01" name="deliveryfee" 
                                                value="<?= htmlspecialchars($stats->deliveryfee ?? '') ?>" required>
                                        </td>
                                        <td>
                                            <input type="email" name="system_email" 
                                                value="<?= htmlspecialchars($stats->system_email ?? '') ?>" required>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?> 
                        <button type="submit" class="save-button">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="button-group">
            <button onclick="window.location.href='<?= ROOT ?>/AdminPaymentInfo'" class="close-btn"><b>Back to Payment Info</b></button>
        </div>
    </div>
</body>
</html>