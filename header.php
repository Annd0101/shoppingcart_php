<header class="header">
    <div class="header_body">
    <a href="index.php" class="logo">TestPHP</a>
    <nav class="navbar">
        <a href="index.php"> Add Products</a>
        <a href="view_products.php">View Products</a>
        <a href="shop_products.php">Shopit</a>
    </nav>
     <!-- get nums product in carts -->
     <?php
     $select_product = mysqli_query($conn, "Select * from `cart`") or die("Query failed");
     $nums_products = mysqli_num_rows($select_product);
     ?>
    <a href="" class="cart"><i class="fa-solid fa-cart-shopping"></i><span><sup><?php echo $nums_products ?></sup></span></a>
    </div>
</header>