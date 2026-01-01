<?php
session_start();
require 'config/db.php';

// التأكد أن المستخدم مسجل الدخول
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

// جلب كل المستخدمين من قاعدة البيانات
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>User Management System</h1>
</header>

<nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="register.php">Ajouter Utilisateur</a>
    <a href="users.php">Liste des utilisateurs</a>
    <a href="logout.php">Se déconnecter</a>
</nav>

<div class="container">
    <h2>Liste des utilisateurs</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

</body>
</html>
