<?php
session_start();
if(isset($_SESSION['user'])){
    header('location:index.php');
    exit();
}
if(isset($_POST['submit'])){
    include 'conn-db.php';
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phonenumber = filter_input(INPUT_POST, 'phonenumber', FILTER_SANITIZE_STRING);

    $errors = [];

    // validate name
    if(empty($name)){
        $errors[] = "Must write username";
    } elseif(strlen($name) > 100) {
        $errors[] = "Username must be less than 100 characters";
    } elseif(!ctype_alpha($name)) {
        $errors[] = "Username must contain only alphabetic characters";
    }
    $name = preg_replace("/[']/", "", $name);
    // validate phone number
    if(empty($phonenumber)){
        $errors[] = "Must write phone number";
    } elseif(!preg_match('/^[0-9]{10}$/', $phonenumber)) {
        $errors[] = "Phone number must be 10 digits";
    }

    // validate email
    if(empty($email)){
        $errors[] = "Must write email";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is not valid";
    }

    $stmt = $con->prepare("SELECT email FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $data = $stmt->fetch();

    if($data){
        $errors[] = "Email is already exist";
    }

    // validate password
    if(empty($password)){
        $errors[] = "Must write password";
    } elseif(strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    } elseif(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$&*])[A-Za-z\d!@#$&*]{8,}$/', $password)) {
        $errors[] = "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character (!@#$&*)";
    }

    // insert or errors 
    if(empty($errors)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("INSERT INTO users (name, email, password, phonenumber) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $password, $phonenumber]);
        $_POST['name'] = '';
        $_POST['email'] = '';

        header('location:register.php');
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
            <h1>Register Form</h1>
            <input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" name="name" placeholder="Name"><br><br>
            <input type="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" name="email" placeholder="Email"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
            <input type="tel" name="phonenumber" placeholder="Phone number"><br><br>
            <input type="submit" name="submit" value="Register">
        </form>
    </div>
</center>
<?php
include('footer.php');
?>
</body>
</html>
