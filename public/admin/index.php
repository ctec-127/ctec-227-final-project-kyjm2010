<?php require_once("../../resources/config.php");
include(template_back . "/header.php");

if(!isset($_SESSION['username'])) {
    redirect("../../public");
}

display_message();
?>
        <div id="page-wrapper">

            <div class="container-fluid">

              

                <?php
                if($_SERVER['REQUEST_URI'] == "/eCommerce/public/admin/" || $_SERVER['REQUEST_URI']== "/eCommerce/public/admin/index.php"){
                    include(template_back . "/admin_content.php");
                }
                if(isset($_GET['orders'])){
                    include(template_back . "/orders.php");
                }

                if(isset($_GET['add_product'])){
                    include(template_back . "/add_product.php");
                }
                if(isset($_GET['edit'])){
                    include(template_back . "/edit_product.php");
                }
                if(isset($_GET['category'])){
                    include(template_back . "/categories.php");
                }
                if(isset($_GET['products'])){
                    include(template_back . "/products.php");
                }

                if(isset($_GET['reports'])){
                    include(template_back . "/reports.php");
                }

                if(isset($_GET['edit_product'])){
                    include(template_back . "/edit_product.php");
                }
                
                ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include(template_back . "/footer.php");
        
        
        ?>