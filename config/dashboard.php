<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>User Management System</h1>
</header>

<nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="register.php">Ajouter Utilisateur</a>
    <a href="logout.php">Se déconnecter</a>
</nav>

<div class="container">
    <h2>Bienvenue <?php echo $_SESSION['user']; ?> !</h2>
    <p>Vous êtes connecté avec succès.</p>
</div>

</body>
</html>
