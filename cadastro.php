<?php
$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $checkQuery = "SELECT * FROM usuarios WHERE nome = '$nome' OR email = '$email'";
    $result = $mysqli->query($checkQuery);
    if ($result->num_rows > 0) {
        echo "Usuário com mesmo nome ou e-mail já existe.";
    } else {
        if (strlen($senha) < 8) {
            echo "A senha deve ter no mínimo 8 caracteres.";
        } else {
            $insertQuery = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            if ($mysqli->query($insertQuery) === TRUE) {
                echo "Cadastro efetuado com sucesso!";
            } else {
                echo "Erro no cadastro: " . $mysqli->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" type="text/css" href="desingner.css">
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form method="post" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Senha:</label>
        <input type="password" name="senha" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>