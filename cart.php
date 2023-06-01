<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>My Items</title>
    <link rel="stylesheet" href="stylesheets/index.css"> 
        
        <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: grey;
        }

        h3{
            font-family:'cairo', sans-serif;
            font-weight: bold;  
        }
        main{
            width: 50%;
            margin-top: 30px;
        }
        table{
            box-shadow: 1px 1px 10px silver;
        }
        thead{
            background-color: blue;
            color:white ;
            text-align: center;
        }
        TBody{
            text-align: center;
        }
    </style>
</head>
<body>
<style>
  a {color: white;}
</style>
    <nav> 
    <?php 
        if(isset($_SESSION['user'])){
            ?>
            
            
            <img src="images/Black and Purple Gaming Avatar Logo.svg" alt="Website logo" width="200" height="100">
            <a class="color"> <?php echo "Welcome, ". $_SESSION['user']['name'];  ?></a>
            <a href="index.php">Main</a> | 
            <a href="logout.php">logout</a> | 
            <a href="products.php">Products</a> |
            <a href="newcontactus.php">Contact Us</a> |
            <a href="aboutus.php">About Us</a> 
            <a href='cart.php'>My Cart</a>
            
            <?php
        }else{
            ?>
            <a href="index.php">Main</a> | 
            <a href="login.php">Login</a> | 
            <a href="register.php">Register</a> | 
            <a href="products.php">Products</a> |
            <a href="newcontactus.php">Contact Us</a> |
            <a href="aboutus.php">About Us</a> 
            <a href='cart.php'>My Cart</a>
            
            <?php
        }
    ?>
           
        </nav>
        <br>
    <center>
        <h3>Chosen Items </h3>
    </center>
    <?php
    $Email=$_SESSION['user']['email'];
    include('conn-db.php');
    $result= mysqli_query($con, "SELECT * FROM add_item WHERE email='$Email'");
    while($row=mysqli_fetch_array($result)){
        echo "
        <center>
        <main>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Product Name</th>
                        <th scope='col'>Product Price</th>
                        <th scope='col'>Delete Product</th>
                    </tr>
                </thead>
                <TBody>
                    <tr>
                        <td>$row[product_name]</td>
                        <td>$row[product_price]</td>
                        <td><a href='remove_item.php? id=$row[id]' class='btn btn-danger'>Remove Item</a></td>
                    </tr>
                </TBody>
            </table>
        </main>
        </center>
        "
    ;}
    ?>
    <center>
            <a href="index.php" >Return To Home Page</a>
            <br><br>
    </center>
</body>
<?php
        include('footer.php');
?>

</html>