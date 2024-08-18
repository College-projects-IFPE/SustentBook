<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $USR_EMAIL = $_POST['USR_EMAIL'];
    $USR_SENHA = $_POST['USR_SENHA'];
    
    $stmt = $pdo->prepare("SELECT * FROM sebo_usuarios WHERE USR_EMAIL = ?");
    $stmt->execute([$USR_EMAIL]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario['USR_SENHA'] === $USR_SENHA) {
        header('Location: ../home/home.php');
        exit;
    } else {
        $erro = 'EMAIL OU SENHA INCORRETOS';
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style-login-e-cadastro.css">
</head>

<body>
    <div class="container">
        <img src="../../img/logo.svg">
        <br><br>
        <form method="POST">
            <label for="USR_EMAIL">Email</label>
            <input type="email" id="USR_EMAIL" name="USR_EMAIL" required>
            <br>
            <label for="USR_SENHA">Senha</label>
            <input type="password" id="USR_SENHA" name="USR_SENHA" required>
            <div id="mensagemErro" style="color: red;"><?php echo htmlspecialchars($erro); ?></div>
            <br>
            <div class="add">
                <button type="submit">Entrar</button>
            </div>
        </form>
        <br>
        <a href="createuser.php">CLIQUE AQUI SE AINDA NÃO POSSUI UMA CONTA</a>
    </div>
</body>
<script>

    document.querySelector('form').addEventListener('submit', function(event) {
        let senha = document.getElementById('USR_SENHA').value;
        let email = document.getElementById('USR_EMAIL').value;
        if (email === '' || senha === '') {
            event.preventDefault();
            document.getElementById('mensagemErro').innerText = 'Por favor, preencha todos os campos.';
        }
    });
</script>
</html>