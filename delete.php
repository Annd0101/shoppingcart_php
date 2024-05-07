<?php include 'connect.php';
if(isset($_GET['deletee'])){
    $delete_id = $_GET['deletee'];
    $delete_query = mysqli_query($conn, "Delete from `products` where id=$delete_id") or
    die("Query failed");
    if($delete_query){
        header('location:view_products.php');
    } else {
        echo "Product not deleted";
        header('location:view_products.php');
    }
}
?>