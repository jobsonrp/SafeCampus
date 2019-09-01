function verificaLogin(){
    //variáveis
       //var pathUrl = "http://safecampus.sistemasdeti.pe.hu/";
       var login1 = document.getElementById('login2').value;
       var senha1 = document.getElementById('senha2').value;
       var url = "http://safecampus.sistemasdeti.pe.hu/rest-api/usuarios/LoginSite/"+login1+"/"+senha1;
       //window.location.href = "http://safecampus.sistemasdeti.pe.hu/rest-api/usuarios/LoginSite/"+login1+"/"+senha1;
       // window.location.href= "http://safecampus.sistemasdeti.pe.hu/site/login.php?nome="+nomeUser+"&&tipoPerfil="+nPerfil+"&&id="+idUser;
       /* var url = pathUrl + "rest-api/usuarios/LoginSite/"+login1+"/"+senha1;
       window.location.href= pathUrl + "site/login.php?nome="+nomeUser+"&&tipoPerfil="+nPerfil+"&&id="+idUser; */

    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
        url: url,
        cache: false,
        dataType: "json",
        beforeSend: function() {
            $("p3").html("Verificando..."); //Carregando
        },
        error: function() {
            $("p3").html("Há algum problema com a fonte de dados.");
        },
        success: function(retorno) {
            if(retorno == false){
                $("p3").html("Login e/ou senha incorretos.");
            }
            else if(retorno[0].erro) {
                $("p3").html(retorno[0].erro);
            }
            else{
                //Limpar Status de Carregando
                var idUser = retorno[0].id;
                var nomeUser = retorno[0].nome;
                var nPerfil = retorno[0].tipoPerfil;
                /*window.location.href= pathUrl + "site/login.php?nome="+nomeUser+"&&tipoPerfil="+nPerfil+"&&id="+idUser;*/
                window.location.href= "http://safecampus.sistemasdeti.pe.hu/site/login.php?nome="+nomeUser+"&&tipoPerfil="+nPerfil+"&&id="+idUser;
                $("p3").html("Logado!");
            }
        }
    });
}