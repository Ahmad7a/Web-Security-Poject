<?php
session_start();
?>
<?php
include('conn-db.php');
$ID=$_GET['id'];
mysqli_query($con, "DELETE FROM add_item WHERE id=$ID");
header('location: cart.php')
?>