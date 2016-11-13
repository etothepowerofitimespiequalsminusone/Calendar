<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magebit</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="static/css/style_upgraded.css"/>
</head>
<body>
<div id="container">
    <div class="wrapper">
        <div class="have">
            <div class="text">
                <h2>Don't have an account?</h2>
                <hr>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <a href="#signup" id="btn-signup">sign up</a>
            </div>
        </div>
        <div class="nohave">
            <div class="text">
                    <h2>Have an account?</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                    <a href="#login" id="btn-login">login</a>
            </div>
        </div>
    </div>
    <div id="form-container">
        <div id="signup-form">
            <div class="form-text">
                <h2>Sign up<img src="static/img/logo.png"/></h2>
                <hr>
                <form method="GET">
                    <label for="fullname" >Name</label>
                    <img class="fullname" src="static/img/inactive/user.png" alt='user'>
                    <img class="activefullname" src="static/img/active/user.png" alt='user'>
                    <input type="text" name="fullname" id="fullname" value="<?php if(isset($fullname)) echo $fullname ?>" required>

                    <label for="email">Email</label>
                    <img class="email" src="static/img/inactive/mail.png" alt="mail">
                    <img class="activeemail" src="static/img/active/mail.png" alt="mail">
                    <input type="email" name="email" id="email" value="<?php if(isset($email)) echo $email ?>" required>

                    <label for="password">Password</label>
                    <img class="password" src="static/img/inactive/lock.png" alt="lock"/>
                    <img class="activepassword" src="static/img/active/lock.png" alt="lock"/>
                    <input type="password" name="password" id="password" required>

                    <input type="submit" value="Sign up" class="form-btn" name="register">
                </form>
                <?php
                if(isset($message))
                {
                    ?>
                    <h3><?php echo $message ?></h3>
                    <?php
                }
                ?>
            </div>

        </div>
        <div id="login-form">
            <div class="form-text">
                <h2>Login<img src="static/img/logo.png"/></h2>
                <hr>
                <form method="GET">
                    <label for="email">Email</label>
                    <img class="email" src="static/img/inactive/mail.png" alt='mail'>
                    <img class="activeemail" src="static/img/active/mail.png" alt='mail'>
                    <input type="email" name="email" id="email" required>
                    <label for="password">Password </label>
                    <img class="password" src="static/img/inactive/lock.png" alt="lock"/>
                    <img class="activepassword" src="static/img/active/lock.png" alt="lock"/>
                    <input type="password" name="password" id="password" class="input"  required>
                    <input type="submit" value="Login" class="form-btn" name="login"><a href="#">Forgot?</a>
                </form>
                <?php
                if(isset($error))
                {
                    ?>
                    <h3><?php echo $error ?></h3>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
    <div class="push"></div>
    <footer>
    <p>all rights reserved <q>magebit</q> 2016.</p>
    </footer>


</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="static/js/script.js"></script>
</body>
</html>
