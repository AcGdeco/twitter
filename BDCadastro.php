<?php
session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$erro = 0;

include('dbmysql.php');

$sql = "SELECT email FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
      if($email == $row["email"]){
        $erro = 1;
        echo "Email já existe cadastrado em nosso banco de dados.";
      }
  }
} else {
  //echo "0 results";
}

if($erro == 0){
    $sql = "INSERT INTO usuarios (nome, email, senha)
    VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro feito com sucesso.";
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $id = mysqli_insert_id($conn);
    $_SESSION["nome"] = $nome;
    $_SESSION["email"] = $email;
    $_SESSION["id"] = $id;

}

$conn->close();

?>