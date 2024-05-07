<?php include 'connect.php' ?>
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
        <section class="display_product">
            <table>

                <tbody>
                    <?php $display_product = mysqli_query($conn, 'Select * from `products`');
                    if(mysqli_num_rows($display_product) > 0) {
                        // fetch data
                        echo "                <thead>
                    <th>SL No</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Action</th>
                </thead>";
                        $num = 1;
                        while($row = mysqli_fetch_assoc($display_product)) {
                            $product_id = $row['id'];
                            $product_name = $row['name'];
                            $product_price = $row['price'];
                            $product_image = $row['image'];
                            
                        ?>
                        
                    <tr>
                        <td><?php echo $num ?></td>
                        <td><img src="images/<?php echo $product_image ?>" alt="<?php echo $product_name ?>"></td>
                        <td> <?php echo $product_name ?></td>
                        <td> <?php echo $product_price ?></td>
                        <td>
                            <a href="delete.php?deletee=<?php echo $product_id ?>" onclick=" return confirm('Are you sure to delete this product');" class="delete_product_btn"><i class="fas fa-trash"></i></a>
                            <a href="update.php?edit=<?php echo $product_id ?>" class="update_product_btn"><i class="fas fa-edit"></i></a>
                        </td>

                     </tr>
                        <?php
                        $num++;
                            };
                        
                    } else {
                        echo "<div class='empty_text'>No Products Available</div>";
                    }
                    ?>

                </tbody>
            </table>
        </section>
    </div>
</body>
</html>