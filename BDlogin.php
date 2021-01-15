<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];
$erro = 0;

include('dbmysql.php');

$sql = "SELECT id, nome, email, senha FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      if($email == $row["email"] && $senha == $row["senha"]){
        $erro = 1;
        $id = $row["id"];
        $nome = $row["nome"];

        $_SESSION["nome"] = $nome;
        $_SESSION["email"] = $email;
        $_SESSION["id"] = $id;

        echo "Login efetuado";
      }
  }
} else {
  //echo "0 results";
}

if($erro == 0){
    echo "Não foi possível fazer o login.";
}

$conn->close();

?>