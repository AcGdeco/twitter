<?php
$texto = $_POST['texto'];
$id = $_POST['id'];
$pagina = $_POST['pagina'];

include('dbmysql.php');

$sql = "INSERT INTO tweet (texto, idusuario)
VALUES ('$texto', $id)";

if ($conn->query($sql) === TRUE) {
    //echo "Publicação feita com sucesso.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

if($pagina == "primario"){
    include("BDPublicacoesSelect.php");
}else{
    include("BDPublicacoesSelectSecundario.php");
}

?>