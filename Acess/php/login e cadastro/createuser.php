<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $USR_NOME = $_POST['USR_NOME'];
    $USR_EMAIL = $_POST['USR_EMAIL'];
    $USR_SENHA = $_POST['USR_SENHA'];
    $USR_TELEFONE = $_POST['USR_TELEFONE'];
    
    $stmt = $pdo->prepare("INSERT INTO sebo_usuarios (USR_NOME, USR_EMAIL, USR_SENHA, USR_TELEFONE) VALUES (?, ?, ?, ?)");
    
    $stmt->execute([$USR_NOME, $USR_EMAIL, $USR_SENHA, $USR_TELEFONE]);
    
    header('Location: login.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../../css/style-login-e-cadastro.css">
</head>
<body>
    <div class="container">
            <img src="../../img/logo.svg">
            <br>
            <form method="POST">
                <label for="USR_NOME">DIGITE SEU NOME</label>
                <input type="text" id="USR_NOME" name="USR_NOME" required>
                <br>
                <label for="USR_EMAIL"> DIGITE SEU EMAIL</label>
                <input type="text" id="USR_EMAIL" name="USR_EMAIL" required>
                <br>
                <label for="USR_SENHA">CRIE SUA SENHA</label>
                <input type="text" id="USR_SENHA" name="USR_SENHA" required>
                <br>
                <label for="USR_TELEFONE">DIGITE SEU TELEFONE</label>
                <input type="text" id="USR_TELEFONE" name="USR_TELEFONE" required>
                <br>
                <div class="add">
                    <button type="submit">CADASTRAR</button>
                </div>
            </form>
    </div>
</body>
<script>
     document.querySelector('form').addEventListener('submit', function(event) {
        let nome = document.getElementById('USR_NOME').value;
        if (nome.trim() === '') {
            event.preventDefault(); 
        }
    });
</script>
</html>