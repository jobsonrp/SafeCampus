function carregarItens(){
    //variáveis
       var tipoBusca = document.getElementById('tipoBusca').value;
       var data1 = document.getElementById('data1').value;
       var data2 = document.getElementById('data2').value;
       var nome1 = document.getElementById('nome1').value;
       var tipo_ocorrencia1 = document.getElementById('tipo_ocorrencia1').value;

    if (tipoBusca == "Data") {
        var itens = "", url = "http://safecampus.sistemasdeti.pe.hu/rest-api/ocorrencias/Data/"+data1+"/"+data2;
    }
    else if (tipoBusca == "Nome"){
        var itens = "", url = "http://safecampus.sistemasdeti.pe.hu/rest-api/ocorrencias/Nome/"+nome1;
    }
    else if (tipoBusca == "TipoOcorrencia"){
        var itens = "", url = "http://safecampus.sistemasdeti.pe.hu/rest-api/ocorrencias/TipoOcorrencia/"+tipo_ocorrencia1;
    }
    else {
        var itens = "", url = "http://safecampus.sistemasdeti.pe.hu/rest-api/ocorrencias";
    }

    //Capturar Dados Usando Método AJAX do jQuery
    $.ajax({
        url: url,
        cache: false,
        dataType: "json",
        beforeSend: function() {
            $("p3").html("Carregando..."); //Carregando
        },
        error: function() {
            $("p3").html("Há algum problema com a fonte de dados");
        },
        success: function(retorno) {
            if(retorno == false){
                $("p3").html("Nenhum resultado encontrado.");
            }
            else if(retorno[0].erro) {
                $("p3").html(retorno[0].erro);
            }
            else{
                //Laço para criar linhas da tabela
                for(var i = 0; i<retorno.length; i++){
                    if (retorno[i].descricao != "") {
                        itens += "<tr>";
                        itens += "<td>" + retorno[i].tipo_ocorrencia + "</td>";
                        itens += "<td>" + retorno[i].nome + "</td>";
                        itens += "<td>" + retorno[i].email + "</td>";
                        itens += "<td>" + retorno[i].local + "</td>";
                        itens += "<td>" + retorno[i].data + "</td>";
                        itens += "<td>" + retorno[i].descricao + "</td>";
                        itens += "</tr>";
                    }
                }
                //Preencher a Tabela
                $("#minhaTabela tbody").html(itens);

                //Limpar Status de Carregando
                $("p3").html("Dados carregados!");
            }
        }
    });
}

function verificaLogin(){
    //variáveis
       var login1= document.getElementById('login').value;
       var senha1 = document.getElementById('senha').value;

       var url = "http://safecampus.sistemasdeti.pe.hu/rest-api/usuarios/Login/"+login1+"/"+senha1;

       window.location.href=url;

    //Capturar Dados Usando Método AJAX do jQuery
    /**
    $.ajax({
        url: url,
        cache: false,
        dataType: "json",
        beforeSend: function() {
            $("p3").html("Verificando..."); //Carregando
        },
        error: function() {
            $("p3").html("Há algum problema com a fonte de dados");
            window.location.href='http://safecampus.pe.hu/rest-api/usuarios/1';
        },
        success: function(retorno) {
            if(retorno == false){
                $("p3").html("Nenhum resultado encontrado.");
                window.location.href='http://safecampus.pe.hu/rest-api/usuarios/2';
            }
            else if(retorno[0].erro) {
                $("p3").html(retorno[0].erro);
            }
            else{
                //Limpar Status de Carregando
                window.location.href='http://safecampus.pe.hu/site/sistema.php';
                $("p3").html("Logado!");
            }
        }
    }); */
}