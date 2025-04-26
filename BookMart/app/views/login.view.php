<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Book Mart</title>
</head>
<body>
    <div class="container">
        <div class="first-half">
            <div class="navBar-left">
                <nav class="title">
                <a href="<?= ROOT ?>/home" class="title-link"><span class="title-name">Book<span class="highlight">Mart</span></span></a>
                </nav>
            </div>
            <div class="hero-content"> 
                <h1>Welcome to <span class="brand-name">Book<span class="highlight">Mart</span></span></h1><br>
                <i><p>"Where Every Book Finds a New Home"</p></i>
            </div>                
        </div>
        <div class="second-half">
            <div class="navBar-right">
                <a class="transperant-bttn" href="<?= ROOT ?>/register" >Sign In</a>
            </div>
            <div class="right-content">
                <center>
                <div class="login-form-container">
                <h1 class="login-text-heading">LOGIN</h1> <br/>                
                    <form onSubmit={handleSubmit} class="login-form" method="POST" action="<?= ROOT ?>/user/login">
                      <div class="form-group">
                        <label htmlFor="name" class='label'>Email Or Username  
                        <?php if (isset($error) && !empty($error)): ?>
                            <span class="error-line" style="color: red;"><?= htmlspecialchars($error) ?></span>
                        <?php endif; ?>
                        </label><br/>
                        <input
                          type="text"
                          id="name"
                          name="username"
                          placeholder='USERNAME OR EMAIL'
                          value=""
                          onChange={handleChange}
                          class=""
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label htmlFor="email" class='label'>Your Password</label> <br/>
                        <input
                          type="password"
                          id="password"
                          name="password"
                          placeholder=""
                          value=""
                          onChange={handleChange}
                          class=""
                          required
                        />
                      </div>
                      <center>
                      <br/>
                      <button type="submit" class="login-text">Log In</button>
                      </br>
                      </br>
                      <span class="login-text">New to BookMart? <a href="<?= ROOT ?>/Register">Register</a> here
                      </span>
                      </center>
                      </form>
                  </div>
                </center>
            </div>   

        </div>
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