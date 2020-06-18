<?php require_once("../resources/config.php"); 
include(template_front . ds . "header.php");
?>

    <!-- Page Content -->
    <div class="container">
    <h1 class="text-center">Login</h1>
    <h2 class="text-center bg-warning"><?php display_message();?></h2>
<form class="form" id="login-form" action="login.php" method="POST">
    <label for="username">Username</label>
    <br><br>
    <input type="username" name="username" id="username">
    <br><br>
    <label for="password">Password</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <br><br>
    <input type="password" name="password" id="password">
    <br><br>
    <input class="button" type="submit" name="submit" id="login-submit" value="Login"><span class="register-now"><p>or register <a href="register.php">here</a></p></span> 
</form>

<?php login_user(); ?>

        </div>

    </div>
    <!-- /.container -->
    <script src="js/script.js"></script>
    <?php include(template_front . ds . "footer.php");?>
