<?php
session_start();
?>

<?php
include('conn-db.php');

function sanitize($data) {
    $data = trim($data); // Remove leading/trailing whitespace
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data); // Convert special characters to HTML entities
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = sanitize($_POST["name"]);
    $phone = sanitize($_POST["phone"]);
    $email = sanitize($_POST["email"]);
    $message = sanitize($_POST["message"]);

    if (empty($name)) {
        die("Please enter your name");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Please enter a valid email address");
    }

    $sql = "INSERT INTO contact2(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    $result = mysqli_query($conn, $sql) or die("FAILED");

    header("Location: index.php");
    exit();
}
?>
