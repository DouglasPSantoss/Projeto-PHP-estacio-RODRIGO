<?php
include_once('config.php');

// Verificar se o id foi passado como parâmetro na URL
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Verificar se o usuário existe
    $check_user = mysqli_query($conn, "SELECT * FROM USUARIOS WHERE id='$id'");
    if(mysqli_num_rows($check_user) > 0) {
        // Excluir usuário
        $sql = "DELETE FROM USUARIOS WHERE id='$id'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Usuário deletado com sucesso!'); window.location.href = 'sistema.php';</script>";
        } else {
            echo "Erro ao deletar usuário: " . mysqli_error($conn);
        }
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>
