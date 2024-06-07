<?php
session_start();
include_once('config.php');

if(isset($_POST['submit'])) {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $sexo = mysqli_real_escape_string($conn, $_POST['genero']);
    $data_nasc = mysqli_real_escape_string($conn, $_POST['data_nascimento']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $tipo_usuario = isset($_POST['tipo_usuario']) ? mysqli_real_escape_string($conn, $_POST['tipo_usuario']) : '';

    // Verificar se o e-mail já está em uso
    $check_email = mysqli_query($conn, "SELECT email FROM USUARIOS WHERE email='$email'");
    if(mysqli_num_rows($check_email) > 0) {
        echo "<script>alert('Erro: O e-mail já está em uso.'); window.location.href = 'formulario.php';</script>";
        exit();
    }

    // Verificar se o tipo de usuário foi capturado corretamente
    if ($tipo_usuario == '') {
        echo "Erro: Tipo de usuário não selecionado.";
        exit();
    }

    $sql = "INSERT INTO USUARIOS (nome, email, telefone, sexo, data_nascimento, cidade, estado, endereco, senha, tipo_usuario) 
            VALUES ('$nome','$email','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco','$senha','$tipo_usuario')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Dados inseridos com sucesso!'); window.location.href = 'login.php';</script>";
    } else {
        echo "Erro ao inserir dados: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Douglas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1493DC;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .box {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-sizing: border-box;
        }
        input, select, legend {
            margin: 10px 0;
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            border: none;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
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
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Usuários</b></legend>
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="telefone" placeholder="Telefone" required>
                <select name="genero" required>
                    <option value="" disabled selected>Selecione o gênero</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Outro">Outro</option>
                </select>
                <input type="date" name="data_nascimento" required>
                <input type="text" name="cidade" placeholder="Cidade" required>
                <input type="text" name="estado" placeholder="Estado" required>
                <input type="text" name="endereco" placeholder="Endereço" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <select name="tipo_usuario" required>
                    <option value="" disabled selected>Selecione o tipo de usuário</option>
                    <option value="aluno">Aluno</option>
                    <option value="gestor">Gestor</option>
                </select>
                <input type="submit" name="submit" value="Cadastrar">
            </fieldset>
        </form>
        <div class="menu-link">
            <a href="menu.php">Voltar ao Menu</a>
        </div>
    </div>
</body>
</html>
