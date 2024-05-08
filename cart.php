<?php include 'connect.php';
// update query
if(isset($_POST['update_product_quantity']) ){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query=mysqli_query($conn, "update `cart` set quantity=$update_value where id=$update_id") or die("Update failed");
    if($update_quantity_query){
         header('location:cart.php');
    }

}
if(isset($_GET['remove'])){
    $remove_id=$_GET['remove'];
    mysqli_query($conn, "Delete from `cart` where id=$remove_id");
    header('location:cart.php');
}   

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "Delete from `cart`");
    header('location:cart.php'); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
     <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php include('header.php') ?>
    <div class="container">
        <?php 
        $number = 1000;
        $format = number_format($number);
        ?>
        <section class="shopping_cart">
            <h1 class="heading">My Cart</h1>
            <table>
                <?php
                $select_cart_products=mysqli_query($conn, "Select * from `cart`");
                $grand_total = 0;
                if(mysqli_num_rows($select_cart_products)>0){
                    echo "                <thead>
                    <th>Sl No</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <tbody>";
                $num = 1;
                
                    while($fetch_cart_products=mysqli_fetch_assoc($select_cart_products)){
                        $product_id = $fetch_cart_products['id'];
                        $product_name = $fetch_cart_products['name'];
                        $product_price = $fetch_cart_products['price'];
                        $product_image = $fetch_cart_products['image'];
                        $product_quantity = $fetch_cart_products['quantity'];
                        ?>
                        <tr>
                            <td><?php echo $num ?></td>
                                        <td><?php echo $product_name ?></td>
                                        <td>
                                            <img src="images/<?php echo $product_image ?>" alt="">
                                        </td>
                                        <td>$<?php echo $product_price ?></td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" value="<?php echo $product_id ?>" name ="update_quantity_id">
                                                <div class="quantity_box">
                                                    <input type="number" min="1" value= "<?php echo $product_quantity ?>" name="update_quantity">
                                                    <input type="submit" class="update_quantity" value="Update" name = "update_product_quantity">
                                                </div>
                                            </form>
                                        </td>
                                        <td>$<?php echo $subtotal=number_format($product_price*$product_quantity)  ?></td>
                                        <td>
                                            <a href="cart.php?remove=<?php echo $product_id ?>" onclick="return confirm('Are you sure to delete this item ?')">
                                                <i class="fas fa-trash"></i>Remove
                                            </a>
                                        </td>
                        </tr>
            
                    <?php
                    $num++;
                    $grand_total=$grand_total + $product_price*$product_quantity;
                    }
                } else {
                    echo "<div class='empty_text'> Cart is empty</div>";
                }
                ?> 
       
                </tbody>
            </table>

            <?php
            if($grand_total > 0){
                echo "      <div class='table_bottom'>
                    <a href='shop_products.php' class='bottom_btn'>Continue Shopping</a>
                    <h3 class='bottom_btn'>Grand total: <span> $$grand_total</span></h3>
                    <a href='checkout.php' class='bottom_btn'>Proceed to checkout</a>
                </div>";
            
            ?>

                            <!-- bottom area -->

                <a href="cart.php?delete_all" class="delete_all_btn">
                    <i class="fas fa-trash"></i>Delete all
                </a>
                <?php
            } else {
                echo "";
            }
            ?>
        </section>
    </div>
</body>
</html>