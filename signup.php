<?php
include 'db.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$checkUser = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = $conn->query($checkUser);

if ($result->num_rows > 0) {
    echo "User already exists!";
} else {
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "Signup successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
