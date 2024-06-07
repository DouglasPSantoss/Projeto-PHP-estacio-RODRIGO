<?php
session_start();
include_once('config.php');

if (!isset($_SESSION['tipo_usuario'])) {
    header("Location: login.php");
    exit();
}

$tipo_usuario = $_SESSION['tipo_usuario'];

$result = mysqli_query($conn, "SELECT * FROM USUARIOS");

echo "<!DOCTYPE html>
<html lang='pt-BR'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sistema de Gestão</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1493DC;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1000px;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
        }
        tr:nth-child(even) {
            background-color: rgba(0, 0, 0, 0.1);
        }
        tr:hover {
            background-color: rgba(0, 0, 0, 0.2);
        }
        .actions a {
            color: white;
            text-decoration: none;
            background-color: #28a745;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 10px;
            display: inline-block;
        }
        .actions a:last-child {
            margin-right: 0;
        }
        .actions a:hover {
            background-color: #218838;
        }
        .menu-link {
            text-align: center;
            margin-top: 20px;
        }
        .menu-link a {
            color: white;
            text-decoration: none;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .menu-link a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Sistema de Gestão</h1>
    <table>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Gênero</th>
            <th>Data de Nascimento</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>Endereço</th>
            <th>Ações</th>
        </tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['telefone'] . "</td>";
    echo "<td>" . $row['sexo'] . "</td>";
    echo "<td>" . $row['data_nascimento'] . "</td>";
    echo "<td>" . $row['cidade'] . "</td>";
    echo "<td>" . $row['estado'] . "</td>";
    echo "<td>" . $row['endereco'] . "</td>";

    echo "<td class='actions'>";
    if ($tipo_usuario == 'gestor') {
        echo "<a href='edit.php?id=" . $row['id'] . "'>Editar</a>";
        echo "<a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Tem certeza que deseja excluir este usuário?');\">Excluir</a>";
    }
    echo "</td>";

    echo "</tr>";
}

echo "</table>";

echo "<div class='menu-link'>
        <a href='menu.php'>Voltar ao Menu</a>
      </div>
</body>
</html>";
?>
