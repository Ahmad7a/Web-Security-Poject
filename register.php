<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:index.php');
    exit();
}
if(isset($_POST['submit'])){
include 'conn-db.php';
   $name=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
   $password=filter_var($_POST['password'],FILTER_SANITIZE_STRING);
   $email=filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
   $phonenumber=filter_var($_POST['phonenumber'],FILTER_SANITIZE_STRING);

   $errors=[];
   // validate name
   if(empty($name)){
       $errors[]="Must Write username";
   }elseif(strlen($name)>100){
       $errors[]="Must user name less than 100";
   }
   // validate name
   if(empty($phonenumber)){
    $errors[]="Must Write phonenumber";
}elseif(strlen($name)==10){
    $errors[]="Must phonenumber equal 100";
}

   // validate email
   if(empty($email)){
    $errors[]="Must Write email";
   }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $errors[]="Email is not valid";
   }

   $stm="SELECT email FROM users WHERE email ='$email'";
   $q=$con->prepare($stm);
   $q->execute();
   $data=$q->fetch();

   if($data){
     $errors[]="Email is already exist";
   }


   // validate password
   if(empty($password)){
        $errors[]="Must write password";
   }elseif(strlen($password)<8){
    $errors[]="Password must not be less than 6 characters";
}
if(empty($password)){
    $errors[]="Must write password";
}elseif(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$&*])[A-Za-z\d!@#$&*]{8,}$/', $password)){
    $errors[]="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character (!@#$&*)";
}



   // insert or errros 
   if(empty($errors)){
      // echo "insert db";
      $password=password_hash($password,PASSWORD_DEFAULT);
      $stm="INSERT INTO users (name,email,password,phonenumber) VALUES ('$name','$email','$password','$phonenumber')";
      $con->prepare($stm)->execute();
      $_POST['name']='';
      $_POST['email']='';

      /*$_SESSION['user']=[
        "name"=>$name,
        "email"=>$email,
      ];*/
      header('location:register.php');
   }
}

?>


<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="stylesheets/login.css">
    <link rel="stylesheet" href="stylesheets/index.css"> 
    
    <script href="javascripts/register.js"></script>
</head>
<body>
<nav>
        <img src="images/Black and Purple Gaming Avatar Logo.svg" alt="Website logo" width="200" height="100">
        <a href="index.php">Main</a> | 
        <a href="login.php">Login</a> | 
        <a href="register.php">Register</a> | 
        <a href="products.php">Products</a> |
        <a href="newcontactus.php">Contact Us</a> |
        <a href="aboutus.php">About Us</a> 
        

    </nav>
    <center>
    <div class="d1">
<form action="register.php" method="POST">
    <?php 
        if(isset($errors)){
            if(!empty($errors)){
                foreach($errors as $msg){
                    echo $msg . "<br>";
                }
            }
        }
    ?>
    
        <h1> Register Form </h1>
    <input type="text"  value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" name="name" placeholder="Name"><br><br>
    <input type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <input type="tel" name="phonenumber" placeholder="Phonenumber"><br><br>
    
    
    <input type="submit" name="submit" value="Register">
    <br><br>
    
    </div>
</form>
    </center>
    
    </body>
<?php
    include('footer.php');
?>
    </html>