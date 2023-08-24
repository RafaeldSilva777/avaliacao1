<?php
session_start();

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_login = $_POST["usuario"];
    $senha_login = $_POST["senha"];

    $query = "SELECT * FROM usuarios WHERE nome = '$usuario_login' AND senha = '$senha_login'";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        $_SESSION["usuario"] = $usuario_login; // Iniciar sessão
        header("Location: dashboard.php"); // Redirecionar para a página de dashboard
        exit();
    } else {
        echo "Credenciais inválidas.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="desingner.css">
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="">
        <label>Usuário:</label>
        <input type="text" name="usuario" required><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>