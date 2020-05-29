<?php 
$upload_directory = "uploads";
function  last_id(){
    global $connection;
    return mysqli_insert_id($connection);
}
function set_message($msg){
    if(!empty($msg)) {
        $_SESSION['message'] = $msg;
    } else {
        $msg = '';
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}
function redirect($location){
    header("Location: $location");
}

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    if(!$result) {
        die("Query Failed" . mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

// get products
function get_products() {
    $query = query("SELECT * FROM products");
    confirm($query);

    while($row = fetch_array($query)){

        $product_image = display_image($row['product_image']);

        $product =<<<DELIMETER
            <div class="col-sm-4 col-lg-4 col-md-4">
            
            <h4 class="text-center"><a href="item.php?id={$row['product_id']}">{$row['product_title']}</h4></a>
                    <a href="item.php?id={$row['product_id']}"><img class="rounded-top" width="100%" src="../resources/{$product_image}" alt=""></a>
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>&#36;{$row['product_price']}</h4>
                            <p>{$row['short_desc']}</p>
                        </div>
                        <hr>
                        <div class="text-center mb-4"><a class="btn btn-primary" href="index.php?add={$row['product_id']}">Add to Cart</a>
                        <a class="btn btn-success" href="../resources/cart.php?add={$row['product_id']}&checkout">Buy Now</a>
                        </div>
                        <div class="ratings">
                        <p class="pull-right">18 reviews</p>
                        <p>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star"></span>
                        <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                        </div>
                        </div>
                    </div>
            
        DELIMETER;
        echo $product;
    }

}

function get_categories(){
    $query = query("SELECT * FROM categories");
        confirm($query);
        while($row = fetch_array($query)) {
            $id = $row['cat_title'];
            $category_links =<<<DELIMETER
            <input type="checkbox" name="$id" id="$id">
            <label for="$id">{$row['cat_title']}</label>
            <br>
        DELIMETER;
        echo $category_links;
        }
}

    
    function get_products_of_category() {
        if(isset($_POST['Micro-Inlay'])){
            $query = query("SELECT * FROM products WHERE product_category_id =" . escape_string($_GET['id']) ."");
            confirm($query);
            
            // <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
            while($row = fetch_array($query)){
    
            $product_image = display_image($row['product_image']);
            $product =<<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="../resources/{$product_image}" alt="">
                <div class="caption">
                    <h3>{$row['product_title']}</h3>
                    <p>{$row['short_desc']}</p>
                    <p>
                        <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> 
                        <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                    </p>
                </div>
            </div>
            </div>  
            DELIMETER;
            echo $product;
        }
    }

}

function get_products_in_shop() {
    $query = query("SELECT * FROM products");
    confirm($query);

    while($row = fetch_array($query)){
        $product =<<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
        <div class="thumbnail">
            <img src="{$row['product_image']}" alt="">
            <div class="caption">
                <h3>{$row['product_title']}</h3>
                <p>{$row['short_desc']}</p>
                <p>
                    <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> 
                    <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
        </div>  
        DELIMETER;
        echo $product;
    }

}

function login_user(){
    $errorBucket = [];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if(empty($_POST['username'])){
            array_push($errorBucket,"<p>Please enter your user name</p>");
        } else{
            $username = escape_string($_POST['username']);
        }
        if(empty($_POST['password'])){
            array_push($errorBucket,"<p>Please enter your password</p>");
        } else{
            $password = hash('sha512', escape_string($_POST['password']));
        }
        if(count($errorBucket) == 0){

            $query = query("SELECT * FROM user WHERE user_name = '{$username}' AND password = '{$password}'");
            confirm($query);

            if(mysqli_num_rows($query) == 0) {
                set_message("Invalid username/password");
                redirect("login.php");
            } elseif (mysqli_num_rows($query) == 1){
                $row = fetch_array($query);
                $_SESSION['user_type'] = $row['user_type'];
                if($_SESSION['user_type'] == "admin"){
                    $_SESSION['username'] = $username;
                    // set_message("Welcome {$username}");
                    redirect("admin");
                } else {
                    $_SESSION['username'] = $username;
                    // set_message("Welcome {$username}");
                    redirect("index.php");
                }
            }
        } else {
            display_error_bucket($errorBucket);
        }
    }
}

function register_user() {

    $errorBucket = [];
        
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(empty($_POST['first_name'])){
            array_push($errorBucket,"<p>A first name is required.</p>");
        } else{
            $first_name = escape_string($_POST['first_name']);
        }
        if(empty($_POST['last_name'])){
            array_push($errorBucket,"<p>A last name is required.</p>");
        } else{
            $last_name = escape_string($_POST['last_name']);  
        }
        if(empty($_POST['email'])){
            array_push($errorBucket,"<p>A valid email address is required.</p>");
        } else{
            $email = escape_string($_POST['email']);
        }
        if(empty($_POST['username'])){
            array_push($errorBucket,"<p>A username is required.</p>");
        } else{
            $user_name = escape_string($_POST['username']);
        }
        if(empty($_POST['password'])){
            array_push($errorBucket,"<p>A password is required.</p>");
        } else if(empty($_POST['confirm'])){
            array_push($errorBucket,"<p>Password confirmation is required.</p>");
        } else if($_POST['password'] != $_POST['confirm']) {
            array_push($errorBucket,"<p>Passwords do not match</p>");
        } else {
            $password = hash('sha512', escape_string($_POST['password']));
        }
        
        if (count($errorBucket) == 0) {
            $reg_query = query("INSERT INTO user(first_name, last_name, user_name, email, password) 
                        VALUES('$first_name','$last_name','$user_name','$email','$password')");
            confirm($reg_query);
    
            // if(!$result) {
            //     echo "<div>There was a problem registering your account</div>";
            // } else {
            //     set_message("You are ready to log in!");
            //     redirectr('login.php');
            // }
        } else {
            display_error_bucket($errorBucket);
        }
    }
}

function display_error_bucket($errorBucket){
    echo '<div class="errorBucket pt-4" role="alert">';
    echo '<p>The following errors were deteced:</p>';
        echo '<ul>';
        foreach ($errorBucket as $text){
            echo '<li>' . $text . '</li>';
        }
        echo '</ul>';
    echo '</div>';
}

function send_message(){
    if(isset($_POST['submit'])){
        $to = "kyjm2010@gmail.com";
       $name = $_POST['name'];
       $email = $_POST['email'];
       $subject = $_POST['subject'];
       $message = $_POST['message'];
       
       $headers = "From: {$name} {$email}";
       $result = mail($to, $subject, $message, $headers);
       if(!$result){
           set_message("Sorry we could not send your message");
           redirect("contact.php");
       } else {
           set_message("Your message has been sent!");
           redirect("contact.php"); 
       }
    }
}
/********************** Back End Functions ****************/
function display_orders() {
    $query = query("SELECT * FROM orders");
    confirm($query);

    while($row = fetch_array($query)) {
        $orders =<<<DELIMETER
        <tr>
            <td>{$row['order_id']}</td>
            <td>&#36;{$row['order_amount']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_currency']}</td>
            <td>{$row['order_status']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        DELIMETER;

        echo $orders;
    }
}

/********************** Admin Products ****************/
function display_image($picture) {
    global $upload_directory;
    return $upload_directory . ds . $picture;
}

function get_products_in_admin() {
    $query = query("SELECT * FROM products");
    confirm($query);
    
    while($row = fetch_array($query)){
        $category = show_product_category($row['product_category_id']);
        $product_image = display_image($row['product_image']);
        $product =<<<DELIMETER
        <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']}<br>
            <img width="100" src="../../resources/{$product_image}" alt="">
            </td>
            <td>{$category}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_qty']}</td>
            <td><a class="btn btn-primary" href="index.php?edit_product&id={$row['product_id']}"><span class="glyphicon glyphicon-edit"></span></a></td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        DELIMETER;
        echo $product;
    }
}

function show_product_category($product_category_id) {
$category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");
confirm($category_query);

while($category_row = fetch_array($category_query)) {
    return $category_row['cat_title'];
}
}


function add_product(){
    if(isset($_POST['publish'])) {
        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = ($_POST['product_qty']);
        $product_image = ($_FILES['file']['name']);
        $image_temp_location = ($_FILES['file']['tmp_name']);

        move_uploaded_file($image_temp_location , upload_dir . ds . $product_image);

        $query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_qty, product_image) 
        Values('{$product_title}', '{$product_category_id}', '{$product_price}', '{$product_description}', '{$short_desc}', '{$product_quantity}','{$product_image}')");
        confirm($query);
        set_message($product_title . " added to shop");
        redirect("index.php?products");
    }
}

function show_categories(){
    $query = query("SELECT * FROM categories");
        confirm($query);
        while($row = fetch_array($query)) {
            $category_options =<<<DELIMETER
            <option value="{$row['cat_id']}">{$row['cat_title']}</option>
        DELIMETER;
        echo $category_options;
        }
}

function update_product(){
    if(isset($_POST['update'])) {
        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_price = escape_string($_POST['product_price']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_quantity = ($_POST['product_qty']);
        $product_image = ($_FILES['file']['name']);
        $image_temp_location = ($_FILES['file']['tmp_name']);


        if(empty($product_image)) {
            $get_pic = query("SELECT product_image FROM products WHERE product_id =" . escape_string($_GET['id']). " ");
            confirm($get_pic);

            while($pic = fetch_array($get_pic)) {
                $product_image = $pic['product_image'];
            }
        }

        move_uploaded_file($image_temp_location , upload_dir . ds . $product_image);

        $query = "UPDATE products SET ";
        $query .= "product_title               = '{$product_title }', ";
        $query .= "product_category_id         = '{$product_category_id }', ";
        $query .= "product_price                = '{$product_price }', ";
        $query .= "product_description          = '{$product_description }', ";
        $query .= "short_desc                   = '{$short_desc }', ";
        $query .= "product_qty                  = '{$product_quantity }', ";
        $query .= "product_image                = '{$product_image }'";
        $query .= "WHERE product_id=" .escape_string($_GET['id']);
        
        $send_update_query = query($query);
        confirm($send_update_query);
        set_message($product_title . " has been updated");
        redirect("index.php?products");
    }
}

function show_categories_in_admin() {
    $category_query = query("SELECT * FROM categories");
    confirm($category_query);

    while($row = fetch_array($category_query)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        $category = <<<DELIMETER
            <tr>
                <td>{$cat_id}</td>
                <td>{$cat_title}</td>
                <td><a class="btn btn-danger" href="../../resources/templates/back/delete_category.php?id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        DELIMETER;

        echo $category;
    }
}

function add_category() {
    if(isset($_POST['add_category'])) {
        $cat_title = escape_string($_POST['cat_title']);
        if(empty($cat_title) || $cat_title == ' ') {
            echo "<p class='bg-danger p-2'>Please enter a title</p>";
        } else{

            $query = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
            confirm($query);
            set_message($cat_title ." Category Created");
        }
    }
}

function display_users() {
    $user_query = query("SELECT * FROM user");
    confirm($user_query);

    while($row = fetch_array($user_query)){
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $email = $row['email'];

        $user = <<<DELIMETER
            <tr>
                <td>{$user_id}</td>
                <td>{$user_name}</td>
                <td>{$email}</td>
                <td><a class="btn btn-danger" href="../../resources/templates/back/delete_user.php?id={$row['user_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        DELIMETER;

        echo $user;
    }
}

function get_reports() {
    $query = query("SELECT * FROM reports");
    confirm($query);
    
    while($row = fetch_array($query)){
        $reports =<<<DELIMETER
        <tr>
            <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_title']}</td>
            <td>{$row['product_quantity']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_report.php?id={$row['report_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>
        DELIMETER;
        echo $reports;
    }
}



?>