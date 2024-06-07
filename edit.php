<?php
include_once('config.php');

if(isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $sexo = mysqli_real_escape_string($conn, $_POST['genero']);
    $data_nasc = mysqli_real_escape_string($conn, $_POST['data_nascimento']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $estado = mysqli_real_escape_string($conn, $_POST['estado']);
    $endereco = mysqli_real_escape_string($conn, $_POST['endereco']);

    $sql = "UPDATE USUARIOS SET nome='$nome', email='$email', telefone='$telefone', sexo='$sexo', data_nascimento='$data_nasc', cidade='$cidade', estado='$estado', endereco='$endereco' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Dados atualizados com sucesso!'); window.location.href = 'sistema.php';</script>";
    } else {
        echo "Erro ao atualizar dados: " . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM USUARIOS WHERE id=$id");

if ($result) {
    $user_data = mysqli_fetch_assoc($result);
} else {
    echo "Erro ao buscar dados: " . mysqli_error($conn);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
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
    </style>
</head>
<body>
    <div class="box">
        <form action="edit.php" method="POST">
            <fieldset>
                <legend><b>Editar Usuário</b></legend>
                <input type="hidden" name="id" value="<?php echo $user_data['id']; ?>" required>
                <input type="text" name="nome" placeholder="Nome" value="<?php echo $user_data['nome']; ?>" required>
                <input type="email" name="email" placeholder="Email" value="<?php echo $user_data['email']; ?>" required>
                <input type="text" name="telefone" placeholder="Telefone" value="<?php echo $user_data['telefone']; ?>" required>
                <select name="genero" required>
                    <option value="" disabled selected>Selecione o gênero</option>
                    <option value="Masculino" <?php if ($user_data['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
                    <option value="Feminino" <?php if ($user_data['sexo'] == 'Feminino') echo 'selected'; ?>>Feminino</option>
                    <option value="Outro" <?php if ($user_data['sexo'] == 'Outro') echo 'selected'; ?>>Outro</option>
                </select>
                <input type="date" name="data_nascimento" value="<?php echo $user_data['data_nascimento']; ?>" required>
                <input type="text" name="cidade" placeholder="Cidade" value="<?php echo $user_data['cidade']; ?>" required>
                <input type="text" name="estado" placeholder="Estado" value="<?php echo $user_data['estado']; ?>" required>
                <input type="text" name="endereco" placeholder="Endereço" value="<?php echo $user_data['endereco']; ?>" required>
                <input type="submit" name="update" value="Atualizar">
            </fieldset>
        </form>
    </div>
</body>
</html>
