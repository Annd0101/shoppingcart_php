<?php include 'connect.php';
if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
// check condition
    $select_cart=mysqli_query($conn, "Select * from `cart` where name='$product_name'");
    if(mysqli_num_rows($select_cart)>0){
        $display_message[] = "Product already added to cart!";
    } else {
          $insert_products=mysqli_query($conn, "insert into `cart` (name,price,image, quantity) values
    ('$product_name','$product_price', '$product_image', '$product_quantity' )") or die("Insert query failed");
$display_message[] = "Product added to cart!";    
}

  

}   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Products</title>
     <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include 'header.php' ?>


    <div class="container">
    <?php 
    if(isset($display_message)){
        foreach($display_message as $display_message){
        echo "    <div class='display_message'>
        <span>$display_message</span>
        <i class='fas fa-times' onClick='this.parentElement.style.display=`none`;'></i>
    </div>";
        }
    }
    
    ?>
        <section class="products">
            <h1 class="heading">Lets Shop</h1>
            <div class="product_container">
                        <?php include 'connect.php';
         $display_product = mysqli_query($conn, 'Select * from `products`');
         if(mysqli_num_rows($display_product) > 0) {
            while($row = mysqli_fetch_assoc($display_product)) {
                            $product_id = $row['id'];
                            $product_name = $row['name'];
                            $product_price = $row['price'];
                            $product_image = $row['image'];
            ?>
            <form action="" method="post">
                <div class="edit_form">
                    <img src="images/<?php echo $product_image?>" alt="">
                    <h3><?php echo $product_name?></h3>
                    <div class="price">Price: $<?php echo $product_price?></div>
                    <input type="hidden" name="product_name"  value="<?php echo $product_name?>">
                    <input type="hidden" name="product_price" value="<?php echo $product_price?>">
                    <input type="hidden" name="product_image" value="<?php echo $product_image?>">

                    <input type="submit" class="submit_btn cart_btn" value ="Add to Cart" name = "add_to_cart">
                </div>
            </form>
                    
            <?php
                        }

         }
         ?>
            </div>
        </section>
    </div>
</body>
</html>