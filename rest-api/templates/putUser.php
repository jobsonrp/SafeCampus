<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
    <script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.32/angular.min.js'></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style type="text/css">
.navbar-default {
    background-color: #3276b1;;
    border-color: #3276b1;;
    border-radius: 0;
}

.navbar-default .navbar-brand,
.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
    color: #FFF;
}

.navbar-default .navbar-nav > li > a {
    color: #FFF;
}

.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
    background-color: #3276b1;
}

.navbar-default .navbar-nav > .active > a,
.navbar-default .navbar-nav > .active > a:hover,
.navbar-default .navbar-nav > .active > a:focus {
    color: #FFF;
    background-color: #3276b1;
}

.navbar-default .navbar-text {
    color: #FFF;
}

.navbar-default .navbar-toggle {
    border-color: #3276b1;
}

.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
    background-color: #3276b1;
}

.navbar-default .navbar-toggle .icon-bar {
    background-color: #FFF;
}

    </style>

</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" >Confirmação de Atualização dos dados do Usuário</a>
        </div>
    </div>
</nav>

<div class="container">

            <hr>
                <button type="button" class="btn-primary btn-lg pull-right "  onclick="voltar();">VOLTAR</button>
                <h2>Dados atualizados com sucesso!</h2>
                <samp class="clearfix"></samp>
            <hr>
        </div>
</body>
        <script>
            function voltar(){
                window.location.href='http://safecampus.pe.hu/site/sistema.php';
            };
        </script>
</html>