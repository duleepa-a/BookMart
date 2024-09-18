<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/CSS/login.css">
    <title>Book Mart</title>
</head>
<body>
    <!-- <div class="navBar">
        <span class = "title">
            <h2>BookMart</h2>
        </span>
        <span class = "SignIn">
            <p>Sign in</p>
        </span>
    </div> -->
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
                        <label htmlFor="name" class='label'>Email Or Username</label><br/>
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
</body>
</html>