<?php
require_once 'php/login e cadastro/db.php';

$stmt = $pdo->query("SELECT * FROM sebo_usuarios");
$sebo_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>usuarios</h2>
    <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>SENHA</th>
                    <th>TELEFONE</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sebo_usuarios as $sebo_usuario): ?>
                    <tr>
                        <td><?= $sebo_usuario['USR_ID'] ?></td>
                        <td><?= $sebo_usuario['USR_NOME'] ?></td>
                        <td><?= $sebo_usuario['USR_EMAIL'] ?></td>
                        <td><?= $sebo_usuario['USR_SENHA'] ?></td>
                        <td><?= $sebo_usuario['USR_TELEFONE'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $sebo_usuario['USR_ID'] ?>">EDITAR</a>
                            <a href="delete.php?id=<?= $sebo_usuario['USR_ID'] ?>">EXCLUIR</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</body>
</html>