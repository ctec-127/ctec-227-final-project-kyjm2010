<?php require_once("../resources/config.php"); 
include(template_front . ds . "header.php");
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <?php include(template_front . ds . "side-nav.php");?>
            <div class="col-md-9">
        <h3 class="section-subheading">
                    <?php display_message();?>
        </h3>
                <?php if($_SERVER['REQUEST_METHOD'] == "POST"){
                    if(!empty($_POST['search']))
                    search_products($_POST['search']);
                } else {
                    get_products();
                }
                
                ?>
               

            </div>

        </div>

    </div>
    <!-- /.container -->
    <?php include(template_front . ds . "footer.php");?>