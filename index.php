<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Usuarios</title>
</head>

<body>
    
    <a href="index.php">Lista</a><br>
    <a href="upload.php">Cadastro</a><br>

    <h2>Usuários</h2>

    <?php

    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $query_usuarios = "SELECT id, nome_usuario, email_usuario, foto_usuario FROM usuarios ORDER BY id 
     DESC";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        //echo "ID: " . $row_usuario['id'] . "<br>";
        echo "ID: $id <br>";
        echo "ID: $nome_usuario <br>";
        echo "E-mail: $email_usuario <br>";
        echo "Foto: $foto_usuario <br>";    
        //echo "<img src='imagens/" . $row_usuario['id'] . "/" . $row_usuario['foto_usuario'] ."' width='150'>";
        

        if((!empty($foto_usuario)) and (file_exists("imagens/$id/$foto_usuario"))){
            echo "<img src='imagens/$id/$foto_usuario' width='150'><br>";
            echo "<a href='imagens/$id/$foto_usuario' download>Download</a><br><br>";
        }else{
            echo "<img src='imagens/icon_user.png' width='150'><br>";
            //echo "<a href='imagens/$id/$foto_usuario'>Download</a>";
        }

        echo "<a href='visualizar.php?id=$id'>Visualizar</a><br>";

        echo "<hr>";
    }
    ?>

</body>

</html>