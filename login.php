<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:index.php');
    exit();
}
if(isset($_POST['submit'])){
    include 'conn-dbb.php';
    $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
    $errors=[];
    
    // validate email
    if(empty($email)){
        $errors[]="Must Write Email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[]="Invalid Email Format";
    }

    // validate password
    if(empty($password)){
        $errors[]="Must Write Password";
    }
    
    // check for errors
    if(empty($errors)){
        // prepare and execute query
        $stm="SELECT * FROM users WHERE email = ?";
        $q=$conn->prepare($stm);
        $q->execute([$email]);
        $data=$q->fetch();
        
        if(!$data){
            $errors[] = "Login Error";
        } else {
            $password_hash=$data['password']; 
            if(!password_verify($password,$password_hash)){
                $errors[] = "Login Error";
            } else {
$_SESSION['user']=[
                    "name"=>$data['name'],
                    "email"=>$email,
                ];
                header('location:index.php');
            }
        }
    }

}
?>

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="stylesheets/login.css">
        <link rel="stylesheet" href="stylesheets/index.css"> 
    </head>
    <body>
        <nav>
            <a href="index.php">Main</a> | 
            <a href="login.php">Login</a> | 
            <a href="register.php">Register</a> | 
            <a href="products.php">Products</a> |
            <a href="newcontactus.php">Contact Us</a> |
            <a href="aboutus.php">About Us</a> 
        </nav>
        <center>
            <div class="d1">
                <form action="login.php" method="POST">
                    <h1> Login </h1>
                    <?php 
                    if(isset($errors) && is_array($errors)){
                        if(!empty($errors)){
                            echo "<ul>";
                            foreach($errors as $msg){
                                echo "<li>" . $msg . "</li>";
                            }
                            echo "</ul>";
                        }
                    }
                    ?>
                    <input type="text" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" name="email" placeholder="email"><br><br>
                    <input type="password" name="password" placeholder="password"><br><br>
                    <input type="submit" name="submit" value="Login">
                    <br><br>
                    <a href="register.php">register</a><br><br><br>
                </form>
            </div>
        </center>
        <?php
        include('footer.php');
        ?>
    </body>
</html>