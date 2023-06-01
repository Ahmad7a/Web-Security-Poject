<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Gamers Store</title> 
        <link rel="stylesheet" href="stylesheets/index.css"> 
    </head> 
    <body> 
    <style>
  a {color: white;}
</style>
        <nav> 
        <img src="images/Black and Purple Gaming Avatar Logo.svg" alt="Website logo" width="200" height="100">
        <?php 
        if(isset($_SESSION['user'])){
            ?>
            
            
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
            <div name=topright style="float: right;"> 
                <form method="GET"> 
                    <!-- <button> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"> 
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5``` M5 10a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/> 
                        </svg> 
                    </button>  -->
                    <input type="search" placeholder="Search..." aria-label = "Search" name="search_data"> 
                    <button class="btn btn-outline-light" type="submit">Submit</button> 
                </form> 
            </div> 
        </nav>
    <div>
        <center>
            <br>
            <h1>Best Sellers</h1>
        </center>
    </div>
    

    <?php
    include('conn-db.php');

    if(isset($_GET['search_data'])){
        $search_data = $_GET['search_data'];
        $sql = "SELECT * FROM product WHERE product_name LIKE ? OR keywords LIKE ?";
        $stmt = mysqli_prepare($con, $sql);
        $search_data = "%$search_data%";
        mysqli_stmt_bind_param($stmt, "ss", $search_data, $search_data);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }   
    else {
        $result = mysqli_query($con,"SELECT * FROM product WHERE product_bestseller='Y'");
    }

    echo"<div>";
    while($row = mysqli_fetch_assoc($result)){
        $id=$row['id'];
        $product_name=$row['product_name'];
        $product_price=$row['product_price'];
        $product_description=$row['product_description'];
        $product_bestseller=$row['product_bestseller'];
        $image=$row['image'];
        echo 
        "<center>
                <main>
                    <div class='card' style='width: 15rem;'>
                        <img src='$row[image]' class='card-img-top'>
                        <div class='card-body'>
                            <h5 class='card-title'>$row[product_name]</h5>
                            <p class='card-text'>$row[product_price]</p>
                            <a href='validate_item.php? id=$row[id]' class='btn btn-success'>Add to cart</a>
                        </div>
                    </div>
                </main>
        </center>";
    }

    echo"</div>";
    mysqli_close($con);
?>
</body> 


</html>