<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact us</title>
    <link rel="stylesheet" type="text/css" href="stylesheets/style2.css">
    <link rel="stylesheet" href="stylesheets/index.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <meta charset="UTF-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">
    
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
    </nav>
    <div class="container">
        <form method="POST" action="configcontact.php" onsubmit="return checking()">

            <div class="contact-box">
                <div class="left"></div>
                <div class="right">
                    <h2>Contact Us</h2>
                    <input type="text" class="field" placeholder="Your Name" id="name" name="name">
                    <input type="text" class="field" placeholder="Your Email" id="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" required>
                    <input type="tel" class="field" placeholder="Phone" id="phone" name="phone" pattern="[0-9]*" inputmode="numeric">
                    <textarea placeholder="Message" class="field" id="message" name="message"></textarea>

                    <button class="btn" onclick="openPopup()">Send</button>

                    <div class="popup" id="popup">
                        <img src="images/tick.png"> 
                        <h2>Thank you</h2>
                        <p>Your message has been sent successfully.</p>
                        <button type="button" onclick="closePopup()">OK</button> 
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        let popup = document.getElementById("popup");

        function openPopup() {
            if (checking()) {
                popup.classList.add("open-popup");
            }
        }

        function closePopup() {
            popup.classList.remove("open-popup");
        }

        function checking() {
            let name = document.getElementById("name").value.trim();
            let email = document.getElementById("email").value.trim();
            let phone = document.getElementById("phone").value.trim();
            let message = document.getElementById("message").value.trim();

            if (name === "") {
                alert('Please enter your name');
                return false;
            }
            if (email === "") {
                alert('Please enter your email');
                return false;
            }
            if (!validateEmail(email)) {
                alert('Please enter a valid email address');
                return false;
            }
            if (phone === "") {
                alert('Please enter your phone number');
                return false;
            }
            if (message === "") {
                alert('Please enter your message');
                return false;
            }
            return true;
        }

        function validateEmail(email) {
            // Regular expression to validate email format
            let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }
    </script>
</body>
<?php
    include("footer.php");
?>
</html>
