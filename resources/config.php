<?php 
    ob_start();

    session_start();
    // session_destroy();
    
    defined("ds")? null : define("ds", DIRECTORY_SEPARATOR);

    defined("template_front")? null : define("template_front", __DIR__ . ds . "templates/front");

    defined("template_back")? null : define("template_back", __DIR__ . ds . "templates/back");

    defined("upload_dir")? null : define("upload_dir", __DIR__ . ds . "uploads");

    defined("db_host")? null : define("db_host", "localhost");
    defined("db_user")? null : define("db_user", "root");
    defined("db_pass")? null : define("db_pass", "");
    defined("db_name")? null : define("db_name", "eCommerce");
    $connection = mysqli_connect(db_host, db_user, db_pass, db_name);

    require_once("functions.php");
    require_once("cart.php");

?>