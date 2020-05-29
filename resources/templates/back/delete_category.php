<?php 
require_once("../../config.php");
if(isset($_GET['id'])) {
    $query = query("DELETE FROM categories Where cat_id = " . escape_string($_GET['id']) . "");
    confirm($query);
    set_message("Category Deleted");
    redirect("../../../public/admin/index.php?category");

} else {
    redirect("../../../public/admin/index.php?category");

}


?>