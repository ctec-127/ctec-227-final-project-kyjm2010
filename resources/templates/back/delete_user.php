<?php 
require_once("../../config.php");
if(isset($_GET['id'])) {
    $query = query("DELETE FROM user Where user_id = " . escape_string($_GET['id']) . "");
    confirm($query);
    set_message("User Deleted");
    redirect("../../../public/admin/index.php?user");

} else {
    redirect("../../../public/admin/index.php?user");

}


?>