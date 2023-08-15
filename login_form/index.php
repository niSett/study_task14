<?php 
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>LogForm</title>

        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <header>
                <nav>
                    <div class="wrap_menu">
                        <ul class="menu-member">
                            <?php
                                if(isset($_SESSION['user_id'])) {
                            ?>
                                <li><a href="#"><?php echo $_SESSION['user_uid']; ?></a></li>
                                <li><a href="../logout.php" class="header-login-a">LOGOUT</a></li>
                            <?php
                                } else {
                            ?>
                                <li><a href="#">SIGN UP</a></li>
                                <li><a href="#" class="header-login-a">LOG IN</a></li>
                            <?php 
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </header>
            <section class="index-login">
                <div class="wrapper">
                    <div class="index-login-signup">
                        <h4>SIGN UP</h4>
                        <p>Don't have an account yet ? Sign up here !</p>
                        <form class="forms" action="includes/signup.php" method="post">
                            <input type="text" name="uid" placeholder="Username"><br>
                            <input type="password" name="pwd" placeholder="Password"><br>
                            <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
                            <input type="text" name="email" placeholder="E-mail"><br><br>
                            <button type="submit" name="submit">SIGN UP</button>
                        </form>
                    </div>
                    <div class="index-login-login">
                        <h4>LOGIN</h4>
                        <p>Don't have an account yet ? Sign up here !</p>
                        <form class="forms" action="includes/login.php" method="post">
                            <input type="text" name="uid" placeholder="Username"><br>
                            <input type="password" name="pwd" placeholder="Password"><br>
                            <br>
                            <button class="hochu_tak" type="submit" name="submit">SIGN UP</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>