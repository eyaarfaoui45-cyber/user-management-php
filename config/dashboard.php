<?php
session_start();
require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['email'];
        header("Location: dashboard.php");
    } else {
        echo "Login incorrect";
    }
}
?>

<form method="POST">
    <input type="email" name="email" required><br>
    <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>
