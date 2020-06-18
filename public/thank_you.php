<?php require_once("../resources/config.php"); 
include(template_front . ds . "header.php");
?>
<div class="thank_you">
<?php
    process_transaction();

?>
    <!-- Page Content -->
<div class="container">
<div class="thank_you_message">
<h1>THANK YOU!</h1>
<h4>Valued Customer</h4>
</div>
 </div><!--Main Content-->

</div>
 <?php include(template_front . ds . "footer.php");?>