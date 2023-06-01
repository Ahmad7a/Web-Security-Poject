<?php
session_start();
if(!isset($_SESSION['user'])){
    
    header('location:login.php');
    exit();
}
?>
<?php 
include('conn-db.php');

if(isset($_POST['add'])){
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Email = $_SESSION['user']['email'];

    $Insert = "INSERT INTO add_item (product_name, product_price, email) VALUES ('$Name','$Price','$Email') ";
    mysqli_query($con, $Insert);
    header('location: cart.php');
}


?>