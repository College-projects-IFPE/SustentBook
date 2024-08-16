<?php
require_once 'php/login e cadastro/db.php';

$USR_ID = $_GET['USR_ID'];
$stmt = $pdo->prepare("SELECT * FROM sebo_usuarios WHERE USR_ID = ?");
$stmt->execute([$USR_ID]);
$sebo_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $USR_NOME = $_POST['USR_NOME'];
    $USR_EMAIL = $_POST['USR_EMAIL'];
    $USR_SENHA = $_POST['USR_SENHA'];
    $USR_TELEFONE = $_POST['USR_TELEFONE'];
    
    $stmt = $pdo->prepare("UPDATE sebo_usuarios SET USR_NOME = ?, USR_EMAIL = ?, USR_SENHA = ?, USR_TELEFONE = ? WHERE USR_ID = ?");
    
    $stmt->execute([$USR_NOME, $USR_EMAIL, $USR_SENHA, $USR_TELEFONE, $USR_ID]);
    
    header('Location: verusers.php');
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
            <img src="../../img/logo.svg">
            <br>
            <form method="POST">
                <label for="USR_NOME">DIGITE SEU NOME</label>
                <input type="text" id="USR_NOME" name="USR_NOME" value="<?= $sebo_usuario['USR_NOME'] ?>" required>
                <br>
                <label for="USR_EMAIL"> DIGITE SEU EMAIL</label>
                <input type="text" id="USR_EMAIL" name="USR_EMAIL" value="<?= $sebo_usuario['USR_EMAIL'] ?>" required>
                <br>
                <label for="USR_SENHA">CRIE SUA SENHA</label>
                <input type="text" id="USR_SENHA" name="USR_SENHA" value="<?= $sebo_usuario['USR_SENHA'] ?>" required>
                <br>
                <label for="USR_TELEFONE">DIGITE SEU TELEFONE</label>
                <input type="text" id="USR_TELEFONE" name="USR_TELEFONE" value="<?= $sebo_usuario['USR_TELEFONE'] ?>" required>
                <br>
                <div class="add">
                    <button type="submit">ATUALIZAR</button>
                </div>
            </form>
    </div>
</body>
</html>