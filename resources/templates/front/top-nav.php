<div class="nav">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Shop</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li id="login">
                <a href="login.php">Login</a>
            </li>
            <li id="logout">
                <a href="logout.php">Logout</a>
            </li>
            <li id="register">
                <a href="register.php">Register</a>
            </li>
            <li id="admin">
                <a href="admin">Admin</a>
            </li>
            <li id="checkout">
                <a href="checkout.php">My Cart</a>
            </li>
            <li>
                <a href="contact.php">Custom Order</a>
            </li>
            <li id="profile_manager" class="nav navbar-right top-nav">
                <a href="#" class="dropdown-toggle"><i class="fa fa-user"></i>&nbsp;<?php echo $_SESSION['username']?><b class="caret"></b></a>
            </li>

        </ul>
        
    </div>
    <!-- /.navbar-collapse -->
</div>

<!-- /.container -->