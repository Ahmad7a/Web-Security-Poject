<?php
session_start();
?>
<?php 
 include('conn-db.php');
$ID = $_GET['id'];
$stmt = mysqli_prepare($con, "SELECT * FROM product WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $ID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result);
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="stylesheets/index.css"> 
    <title>Validate item</title> 
    <style>
        input{
             display: none;
        }
        .main{
            width:30%;
            padding: 20px;
            box-shadow: 1px 1px 10px silver;
            margin-top: 50px;
        }
    </style>
</head>
 <body>
    <center>
        <div class='main'>
        <form action="add_item.php"method='post'>
            <h2>Are you sure you want to add the item ?</h2>
            <input type="text"name='id' value='<?php echo $data['id']?> '>
            <input type="text"name='name' value='<?php echo $data['product_name']?>  '>
            <input type="text"name='price' value='<?php echo $data['product_price']?> ' >
            <button name='add' type='submit' class='btn btn-warning'>Confirm adding item</button>
            <br>
            <a href="index.php">Back to home page</a>
        </form>

        </div>

    </center>



</body>
</html>