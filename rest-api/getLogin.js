function verificaLogin(){
    //variáveis
       var login1 = document.getElementById('login').value;
       var senha1 = document.getElementById('senha').value;
       var url = "http://safecampus.pe.hu/rest-api/usuarios/LoginSite/"+login1+"/"+senha1;

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
                window.location.href="http://safecampus.pe.hu/site/login.php?nome="+nomeUser+"&&tipoPerfil="+nPerfil+"&&id="+idUser;
                $("p3").html("Logado!");
            }
        }
    });
}