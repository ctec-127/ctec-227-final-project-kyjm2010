<?php require_once("../resources/config.php"); 
include(template_front . ds . "header.php");
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <?php include(template_front . ds . "side-nav.php");?>
            <?php display_message(); ?>
            <div class="col-md-9">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                    <?php include(template_front . ds . "slider.php");?>
                    </div>
                </div>
                <div class="row">
                <?php get_products(); ?>
                

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
    <?php include(template_front . ds . "footer.php");?>