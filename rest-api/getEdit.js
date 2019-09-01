function getPerfil(){
    //variáveis
       var ed_id = document.getElementById('edid').value;
       var url1 = "http://safecampus.pe.hu/rest-api/usuarioSite/"+ed_id;

    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
        url: url1,
        cache: false,
        dataType: "json",
        beforeSend: function() {
            $("p4").html("Verificando..."); //Carregando
        },
        error: function() {
            $("p4").html("Há algum problema com a fonte de dados.");
        },
        success: function(retorno) {
            if(retorno == false){
                $("p4").html("Login e/ou senha incorretos.");
            }
            else if(retorno[0].erro) {
                $("p4").html(retorno[0].erro);
            }
            else{
                //Limpar Status de Carregando
                var result = "";
                var nomeUsuario = retorno[0].nome;
                var tipoUsuario = retorno[0].tipoPerfil;
                document.getElementById("ednome").value = nomeUsuario;
                document.getElementById("edemail").value = retorno[0].email;
                document.getElementById("edlogin").value = retorno[0].login;
                document.getElementById("edsenha").value = retorno[0].senha;
                //Informações do menu superior
                document.getElementById("nameUser").value = "Olá " + nomeUsuario;
                if (tipoUsuario == 1){
                    result = "Administrador";
                } else if (tipoUsuario == 2){
                    result = "Chefe";
                } else if (tipoUsuario == 3){
                    result = "Segurança";
                } else {
                    result = "Usuário Comum";
                }
                document.getElementById("tipo_User").value = result;
                $("p4").html("Dados carregados!");
            }
        }
    });
}