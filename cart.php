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
        <section class="shopping_cart">
            <h1 class="heading">My Cart</h1>
            <table>
                <thead>
                    <th>Sl No</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>Laptop</td>
                    <td>
                        <img src="images/images.jpg" alt="">
                    </td>
                    <td>25000/-</td>
                    <td>
                        <div class="quantity_box">
                            <input type="number" min="1">
                            <input type="submit" class="update_quantity">
                        </div>
                    </td>
                    <td>25000/-</td>
                    <td>
                        <a href="">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tbody>
                <!-- bottom area -->
                <div class="table_bottom">
                    <a href="shop_products.php" class="bottom_btn">Continue Shopping</a>
                    <h3 class="bottom_btn">Grand total: <span>25000/-</span></h3>
                    <a href="checkout.php" class="bottom_btn">Proceed to checkout</a>
                </div>
                <a href="" class="delete_all_btn">
                    <i class="fas fa-trash"></i>Delete all
                </a>
            </table>
        </section>
    </div>
</body>
</html>