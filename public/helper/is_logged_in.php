<?php
// is_logged_in.php
session_start();
if (isset($_SESSION['user_type'])) {
    // echo json_encode(["status" => 'yes']);
    if($_SESSION['user_type'] == 'admin'){
        echo json_encode(["role" => 'admin', "status" => 'yes']);
    } else {
        echo json_encode(["role" => 'user',"status" => 'yes']);
    }
} else {
    echo json_encode(["status" => 'no']);
}
