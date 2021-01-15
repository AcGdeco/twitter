<?php
session_start();
$id = $_SESSION["id"];
$nome = $_SESSION["nome"];
$email = $_SESSION["email"];

echo "
<script>

var id;
var nome;
var email;

id = $id;
nome = '$nome';
email = '$email';

</script>
";

?>
