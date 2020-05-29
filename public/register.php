<?php require_once("../resources/config.php"); 
include(template_front . ds . "header.php");
?>

<h1 class="text-center">Register</h1>
            <h2 class="text-center bg-warning"><?php display_message();?></h2>
<form class="form-register" action="register.php" method="POST">
<?php register_user(); ?>
    <h2><img src="images/art.png" alt=""></h2>
    <label for="first_name">First Name</label>
    <br><br>
    <input type="text" id="first_name" name="first_name">
    <br><br>
    <label for="last_name">Last Name</label>
    <br><br>
    <input type="text" id="last_name" name="last_name">
    <br><br>
    <label for="email">Email</label>
    <br><br>
    <input type="email" id="email" name="email">
    <br><br>
    <label for="username">User Name</label>
    <br><br>
    <input type="text" id="username" name="username">
    <br><br>
    <label for="password">Password</label>
    <span id="showPassword" onclick="showPassword();">Show Password</span>
    <br><br>
    <input type="password" id="password" name="password">
    <br><br>
    <label for="confirm">Confirm Password</label>
    <br><br>
    <input type="confirm" id="confirm" name="confirm">
    <br><br>
    <input class="button register" type="submit" value="Register">
</form>
<script src="js/script.js"></script>

    <?php include(template_front . ds . "footer.php");?>
