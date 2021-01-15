<?php
include("sessionVariaveis.php");

$idseguir = $_POST['id'];

include('dbmysql.php');

$sql = "DELETE FROM seguidores WHERE idusuario = $id AND idusuarioseguindo = $idseguir";

if ($conn->query($sql) === TRUE) {
    //echo "Publicação feita com sucesso.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

include("BDPublicacoesSelectSecundario.php");

?>