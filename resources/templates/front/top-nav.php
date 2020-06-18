
    <!-- Brand and toggle get grouped for better mobile display -->
    <!-- <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Shop</a>
    </div> -->
    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="branding">
            <img src="../resources/images/logo3.png" alt="business logo">
            <div class="business">
                <span class="business-title"><h4>Immortal Wood Designs</h4></span><br>
                <span class="business-tagline"><p>"Craftsmanship to Stand the Test of Time"</h4></span>
            </div>
        </div>
        <div class="log">
            <a href="index.php">Shop</a>
            <a href="contact.php">Custom Order</a>
            <a href="checkout.php" id="checkout">My Cart</a>
        </div>
            <div class="search">
                <div class="hud">
                <div class="logged-in">
                    <a href="admin?orders" id="admin">Admin</a>
                    <a href="logout.php" id="logout">Logout</a>
                    <a class="nav-link" href="#" id="profile_manager" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['username']?>
                    </a>
                    </div>
                    <div class="login-register">
                    <a href="register.php" id="register">Register</a>
                    <a href="login.php" id="login">Login</a>
                    </div>
                </div>
                <form class="form-inline my-2 my-lg-0" method="POST">
                    <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">Search</button>
                    <input class="form-control mr-sm-2" type="text" placeholder="Search Products" name="search" aria-label="Search">
                </form>
            </div>
        
    <!-- /.navbar-collapse -->


<!-- /.container -->