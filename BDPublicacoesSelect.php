<?php
include('dbmysql.php');

$sql = "SELECT id, idusuario, idusuarioseguindo FROM twitter.seguidores WHERE idusuario = $id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        
    $Seguindo[$row["idusuarioseguindo"]] = "Sim";
        
  }
} else {
  //echo "0 results";
}

$sql = "SELECT id FROM twitter.tweetcomentarios";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        
    $idMaxTweetComentarios = $row["id"];
        
  }
} else {
  //echo "0 results";
}

$sql = "SELECT id FROM twitter.tweet";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        
    $idMaxTweet = $row["id"];
        
  }
} else {
  //echo "0 results";
}

$sql = "SELECT id FROM twitter.tweetcomentarios";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        
    $idMaxTweetComentarios = $row["id"];
        
  }
} else {
  //echo "0 results";
}

for($i=1;$i<=$idMaxTweet;$i++){
    $sql = "SELECT 

            b.id As idComentario,
            b.texto As textoComentario,
            b.idusuario As idusuarioComentario,
            c.nome

            FROM twitter.tweetcomentarios b

            LEFT JOIN twitter.usuarios c
            ON c.id = b.idusuario

            WHERE b.idtweet = $i

            ORDER BY b.id DESC";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $idComentario = $row["idComentario"];
        $idTweetComentario[$i][$idComentario] = $row["idComentario"];
        $idTweetComentariotextoComentario[$i][$idComentario] = $row["textoComentario"];
        $idTweetComentarioidusuarioComentario[$i][$idComentario] = $row["idusuarioComentario"];
        $idTweetComentarionome[$i][$idComentario] = $row["nome"];
            
    }
    } else {
    //echo "0 results";
    }
}

$sql = "SELECT 

a.id, 
a.texto, 
a.idusuario,
b.nome

FROM twitter.tweet a

INNER JOIN twitter.usuarios b
ON a.idusuario = b.id

ORDER BY a.id DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

        $idTweet = $row["id"];
        $texto = $row["texto"];
        $idusuario = $row["idusuario"];
        $nome = $row["nome"];

        if((!empty($Seguindo[$idusuario]) && $Seguindo[$idusuario] == "Sim") or $idusuario == $id){
            echo '
            <div class="div-publicacao-feed">
            <p style = "font-weight:bolder;font-size:20px;">'.$nome.'</p>
            <p class="texto-publicacao" style = "word-wrap:break-word;width:100%;" >'.$texto.'</p>
            <div class="div-comentario-existente">';

            for($i=1;$i<=$idMaxTweetComentarios;$i++){
                if(!empty($idTweetComentario[$idTweet][$i])){
                    echo '<p class="nome-perfil-comentario">'.$idTweetComentarionome[$idTweet][$i].'</p>
                        <p class="comentario" style = "width:100%;" >'.$idTweetComentariotextoComentario[$idTweet][$i].'</p>';
                }
            }

            echo '<div class="w-form">
                <form id="email-form-2" name="email-form-2" data-name="Email Form 2" class="w-clearfix"><textarea placeholder="..." maxlength="5000" id="field-2-'.$idTweet.'" name="field-2" class="textarea w-input"></textarea><input onclick = "comentar('.$idTweet.',1)" value="Comentar" data-wait="Please wait..." class="submit-button w-button" style = "width:115px;" ></form>
                <div class="w-form-done">
                    <div>Thank you! Your submission has been received!</div>
                </div>
                <div class="w-form-fail">
                    <div>Oops! Something went wrong while submitting the form.</div>
                </div>
                </div>
            </div>
            </div>
            ';
        }

    }
} else {
  //echo "0 results";
}

$conn->close();
?>