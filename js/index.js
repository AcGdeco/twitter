function cadastrar(){
    var a;
    var b;
    var c;
    var d;
    var erro;
    erro = "Não";

    a = document.getElementById('name').value;
    b = document.getElementById('name-2').value;
    c = document.getElementById('name-3').value;
    d = document.getElementById('name-4').value;

    if(a == "" || b == "" || c == "" || d == ""){
        alert('Algum(ns) dos campos não se encontra(m) preenchido(s).');
        erro = 'Sim';
    }

    if(c != d){
        alert('As senhas não correspondem.');
        erro = 'Sim';
    }

    if(erro == "Não"){
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {

                var resposta;
                resposta = xhttp.responseText;
                alert(xhttp.responseText);

                if(resposta == "Cadastro feito com sucesso."){
                    window.location.replace("publicacoes.php");
                }
            }
        };

        xhttp.open("POST", "BDCadastro.php", true);

        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhttp.send("nome=" + a + "&email=" + b + "&senha=" + c);
    }

}

function logar(){
    var a;
    var b;

    a = document.getElementById('email').value;
    b = document.getElementById('senha').value;
   
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {

            var resposta;
            resposta = xhttp.responseText;
            
            if(resposta == "Login efetuado"){
                window.location.replace("publicacoes.php");
            }else{
                alert(resposta);
            }

        }
    };

    xhttp.open("POST", "BDLogin.php", true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send("email=" + a + "&senha=" + b);

}

