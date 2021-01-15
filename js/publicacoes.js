function publicar(pagina){
    var a;
    var erro;
    erro = "Não";
    
    a = document.getElementById('field').value;
    
    if(pagina == "primario"){

    }else{
        pagina = "secundario";
    }

    if(a == ""){
        alert('Não há texto para publicar.');
        erro = 'Sim';
    }

    if(a.length > 1000){
        alert('Publicação não efetuada. Não pode haver mais do que 1000 caracteres.');
        erro = 'Sim';
    }
        
    if(erro == "Não"){
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById('field').value = "";
                var resposta;
                resposta = xhttp.responseText;
                document.getElementById("publicacoes").innerHTML = resposta;

            }
        };

        xhttp.open("POST", "BDPublicar.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send("texto=" + a + "&id=" + id + "&pagina=" + pagina);
    }
}

function comentar(id, pagina){
    var a;
    var erro;
    erro = "Não";

    if(pagina == 1){
        pagina = "primario";
    }else{
        pagina = "secundario";
    }

    a = document.getElementById('field-2-'+id).value;
    
    if(a == ""){
        alert('Não há texto para publicar.');
        erro = 'Sim';
    }

    if(a.length > 1000){
        alert('Publicação não efetuada. Não pode haver mais do que 1000 caracteres.');
        erro = 'Sim';
    }
       
    if(erro == "Não"){
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {

                document.getElementById('field-2-'+id).value = "";
                var resposta;
                resposta = xhttp.responseText;
                document.getElementById("publicacoes").innerHTML = resposta;

            }
        };

        xhttp.open("POST", "BDComentar.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send("texto=" + a + "&id=" + id + "&pagina=" + pagina);
    }
    
}

function seguir(id){
    
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {

            var resposta;
            resposta = xhttp.responseText;
            document.getElementById("publicacoes").innerHTML = resposta;

        }
    };

    xhttp.open("POST", "BDSeguir.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("id=" + id);
    
}

function pararSeguir(id){
    
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {

            var resposta;
            resposta = xhttp.responseText;
            document.getElementById("publicacoes").innerHTML = resposta;

        }
    };

    xhttp.open("POST", "BDPararSeguir.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("id=" + id);
    
}