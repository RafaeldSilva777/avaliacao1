<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}

$usuario = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="desingner.css">
</head>
<body>
    <h1>Olá <?php echo $usuario; ?></h1>
    <a href="logout.php">Deslogar</a>
</body>
</html>