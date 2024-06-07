<?php
include_once('config.php');

if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $result = mysqli_query($conn, "SELECT * FROM USUARIOS WHERE email = '$email' AND senha = '$senha'");

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
        $_SESSION['nome_usuario'] = $user['nome'];
        header('Location: sistema.php');
    } else {
        echo "<script>alert('Login inválido!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1493DC;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
        }
        .box {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            box-sizing: border-box;
        }
        input, legend {
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
        <form action="login.php" method="POST">
            <fieldset>
                <legend><b>Login</b></legend>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="senha" placeholder="Senha" required>
                <input type="submit" name="login" value="Login">
            </fieldset>
        </form>
    </div>
</body>
</html>
