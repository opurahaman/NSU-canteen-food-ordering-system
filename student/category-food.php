<?php include('part/menu.php')?>
<?php
if (isset($_GET['category_id'])) {
    # code...
    $category_id = $_GET['category_id'];
$sql="SELECT title FROM tbl_category WHERE id=$category_id";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$category_title = $row['title'];

}
else {
    header('location:'.SITEURL);
}
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>student/food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
$sql2="SELECT * FROM tbl_food WHERE category_id=$category_id";
 $res2=mysqli_query($conn ,$sql2);

 $count2=mysqli_num_rows($res2);

 if ($count2>0) {
     # code...
     while($row2=mysqli_fetch_assoc($res2))
     {
         $id=$row2['id'];
         $title=$row2['title'];
         $price=$row2['price'];
         $description=$row2['description'];
         $image_name2=$row2['image_name'];
         ?>


            <div class="food-menu-box">
                            <div class="food-menu-img">
                                <?php
                                if($image_name2=="")
                                {
                                    echo "<div class='fail'>Image Not added</div>";


                                }
                                else
                                {
                                   ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name2; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                   <?php
                                }
                                ?>
                               
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title;?></h4>
                                <p class="food-price"><?php echo $price; ?>Tk</p>
                                <p class="food-detail">
                                   <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>student/order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>
         <?php
     }
 }
 else {
     # code...
     echo "<div class='fail'> Food Is not availbe.</div>";
 }

?>

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('part/footer.php')?>