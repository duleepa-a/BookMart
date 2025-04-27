<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/requestRefund.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- navBar division begin -->
    <?php include 'homeNavBar.view.php'; ?>
    <!-- navBar division end -->
    <div class="container">
    <h1>Return and Refund Request</h1>
        
        <div class="policy-info">
            <p>Our top priority is to make sure you are satisfied with the products and service we offer on our website. We strive to maintain an excellent customer service and satisfaction. We guarantee the products we sell. If you are not satisfied with the purchase you have done at BookMart.com, please contact us by filling the form below.</p>
            
            <p>However, please note that refunds will only be accepted if the return is due to an error or fault on the seller’s side. In all approved refund cases, the buyer will still be responsible for covering the delivery charges. Shipping fees are non-refundable.</p>
            
            <p>If you believe the item you received is incorrect, damaged, or not as described, please fill out the form below within 3 days of your purchase to initiate the refund process.</p>
        </div>
        
        <form id="returnRefundForm" method="POST" enctype="multipart/form-data" action="<?= ROOT ?>/buyer/addRefundRequest">
            <div class="form-row">
                <div class="form-group">
                    <label for="order_number" class="required">Order number</label>
                    <input type="text" id="order_number" name="order_number" placeholder="Order number" required>
                </div>
                
                <div class="form-group">
                    <label for="email" class="required">Email address</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number">
                </div>
                <div class="form-group">
                    <label for="evidence" class="required">Upload Evidence</label>
                    <div class="file-upload">
                        <label for="evidence" class="file-upload-label">Click to upload file (Images, PDF)</label>
                        <input type="file" id="evidence" name="evidence" accept=".jpg,.jpeg,.png,.pdf" required>
                        <div class="file-name" id="file-name">No file selected</div>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="reason" class="required">Reason for return</label>
                <textarea id="reason" name="reason" placeholder="Please provide details about why you are returning the item(s)" required></textarea>
            </div>
  
            
            <div class="bank-details">
                <h3>Bank Details for Refund</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label for="bank_name" class="required">Bank Name</label>
                        <input type="text" id="bank_name" name="bank_name" placeholder="Bank Name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="branch_name" class="required">Branch Name</label>
                        <input type="text" id="branch_name" name="branch_name" placeholder="Branch Name" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="account_number" class="required">Account Number</label>
                        <input type="text" id="account_number" name="account_number" placeholder="Account Number" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="account_holder" class="required">Account Holder's Name</label>
                        <input type="text" id="account_holder" name="account_holder" placeholder="Account Holder's Name" required>
                    </div>
                </div>
            </div>
            <div class="btn-div">
              <button type="submit" class="submit-btn">Submit Request</button>
            </div>
        </form>
    </div>
    <div id="custom-alert" class="error" style="display: none;">
        <div class="error__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none">
                <path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path>
            </svg>
        </div>
        <div class="error__title" id="alert-message">Alert message goes here</div>
        <div class="error__close" onclick="closeAlert()">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20">
                <path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path>
            </svg>
        </div>
    </div>
    <!-- footer begin -->
    <?php include 'footer.view.php'; ?>   
    <!-- footer end -->
    <script src="script.js"></script>
    <script>
      function showAlert(message, type = "error") {
            const alertBox = document.getElementById("custom-alert");
            const alertMsg = document.getElementById("alert-message");
            const alertMsgbox = document.getElementsByClassName("error")[0];

            // Change alert style based on the type
            if (type === "success") {
                alertBox.style.backgroundColor = "#4CAF50";  // green
            }

            alertMsg.textContent = message;
            alertBox.style.display = "flex";

            console.log(alertMsg.textContent);

            setTimeout(() => {
                closeAlert();
            }, 4000);
        }

      function closeAlert() {
          document.getElementById("custom-alert").style.display = "none";
      }

      document.getElementById('evidence').addEventListener('change', function() {
            const fileName = this.files[0] ? this.files[0].name : 'No file selected';
            document.getElementById('file-name').textContent = fileName;
        });
    </script>
     <?php if (!empty($_SESSION['error'])): ?>
        <script>
            showAlert("<?= $_SESSION['error'] ?>", "error");
        </script>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <script>
            showAlert("<?= $_SESSION['success'] ?>", "success");
        </script>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>
</body>
</html>
