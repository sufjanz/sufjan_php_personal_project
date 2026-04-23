<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "walletbuddy");

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM account WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];

    header("Location: index.php");
} else {
    echo "Login failed";
}
?>