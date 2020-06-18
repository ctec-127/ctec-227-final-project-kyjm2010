
<?php  
require_once("../resources/config.php");
function getAverageRating(){
    $query = query("SELECT avg(rating) AS avg FROM reviews WHERE product =" . escape_string($_GET['id']) . " ");
            confirm($query);
            $row = fetch_array($query);
            return $row['avg'];
}
include(template_front . ds . "header.php");
?>
    <!-- Page Content -->
<div class="container">
<?php include(template_front . ds . "side-nav.php");
$query = query("SELECT * FROM products WHERE product_id =" . escape_string($_GET['id']) . " ");
confirm($query);
while($row = fetch_array($query)):
   
?>

<div class="col-md-9">

<!--Row For Image and Short Description-->

<div class="row">

    <div class="col-md-7">
    <div>
       <img class="img-responsive" src="../resources/<?php echo display_image($row['product_image']);?>" alt="">
    </div>
    </div>

    <div class="col-md-5">

        <h4 class="item-title"><?php echo $row['product_title'];?></h4>
        <div class="thumbnail">
         

    <div class="caption-full">
        <div id="avgRating"></div>
        <hr>
        <h4 class=""><?php echo "&#36;" . $row['product_price'];?></h4>    
        <p><?php echo $row['short_desc'];?></p>

   
    <form action="">
        <div class="form-group">
        <a class="btn btn-primary" href="item.php?add=<?php echo $row['product_id']?>&item">Add to Cart</a>
        <a class="btn btn-success" href="checkout.php?add=<?php echo $row['product_id']?>&checkout">Buy Now</a>

    </form>

    </div>
 
</div>

</div>


</div><!--Row For Image and Short Description-->


        <hr>


<!--Row for Tab Panel-->

<div class="row">

<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>

  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

<p></p>
    <p><?php echo $row['product_description'];?></p>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">

  <div class="col-md-6">


        <hr>

        <?php 
            $query = query("SELECT * FROM reviews WHERE product =" . escape_string($_GET['id']) . " ");
            confirm($query);
            while($row = fetch_array($query)) {
                ?>
            <div class="media">
                <div class="media-body">
                    <h4 class="media-heading"><div class="rateYo-<?php echo $row['id'];?>"></div></h4>
                    <script>
                        $(function () {
                            $(".rateYo-<?php echo $row['id'];?>").rateYo({
                            readOnly: true,
                            rating:<?php echo $row['rating'];?>
                        });

                        });
                    </script>
                    <?php echo $row['comment'];?><br>
                    from<?php echo " " . $row['user'];?> 
                </div>
            </div>
        <?php
            }
            ?>


 </div>
    <div class="col-md-6" id="addReview">
        <h3>Add A review</h3>
        <form action="" method="POST">
                <div class="form-group">
                    <label for="">Rating</label>
                    <div id="rateYo"></div>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username']?>">
                </div>
                <div class="form-group">
                    <label for="comment">Feedback</label>
                    <textarea name="comment" id="comment" cols="60" rows="10" class="form-control"></textarea>
                    <input type="hidden" name="rating" id="rating">
                </div>
                <button name="save" class="btn btn-primary">Submit</button>
            </form>
     
        <script src="jquery.rateyo.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script>
        $(function () {
    
            $("#rateYo").rateYo({
            fullStar: true,
            onSet: function (rating, rateYoInstance){
                $("#rating").val(rating);
            }
            });

          
            $("#avgRating").rateYo({
                readOnly: true,
                rating: '<?php echo getAverageRating();?>',
                starWidth: "30px"
            });

        });
        </script>
            <?php 
                if(isset($_POST['rating'])){
                    $product = escape_string($_GET['id']);
                    $user = $_POST['username'];
                    $rating = $_POST['rating'];
                    $comment = $_POST['comment'];
                    $exists = query("SELECT * FROM reviews WHERE user = '$user' AND product = '$product'");
                    if(!$exists->num_rows > 0){
                        $review_query = query("INSERT INTO reviews(product, user, rating, comment) 
                        VALUES('$product','$user','$rating','$comment')");

confirm($review_query);
}
// var_dump($exists);
// echo $exists;
// if(empty(fetch_array($exists))){
    //     // redirect('index.php');
    //     // var_dump($exists);
    
    // } else {
        
        // }
        
    }
    ?> 
    </div>

 </div>

</div>


</div><!--Row for Tab Panel-->




</div>
<?php endwhile; ?>
</div>
</div>
</div>

<?php include(template_front . ds . "footer.php");?>