<?php
include("sessionVariaveis.php");

$idseguir = $_POST['id'];

include('dbmysql.php');

$sql = "INSERT INTO seguidores (idusuario, idusuarioseguindo)
VALUES ($id, $idseguir)";

if ($conn->query($sql) === TRUE) {
    //echo "Publicação feita com sucesso.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

include("BDPublicacoesSelectSecundario.php");

?>