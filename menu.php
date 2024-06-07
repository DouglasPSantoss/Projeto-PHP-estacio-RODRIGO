<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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
            text-align: center;
        }
        a {
            display: block;
            margin: 10px 0;
            padding: 10px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Bem-vindo</h1>
        <a href="formulario.php">Cadastro</a>
        <a href="login.php">Login</a>
    </div>
</body>
</html>
