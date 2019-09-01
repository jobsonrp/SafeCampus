<?php
    session_start();
    if(!isset($_SESSION["status"])){
      echo"<script language='javascript' type='text/javascript'>alert('Por favor! Faça o Login.');window.location.href='../index.php#Section-1';</script>";
    }
    else{
        $status = $_SESSION["status"];
        $id = $_SESSION['id'];
        $nome = $_SESSION['nome'];
        $tipoPerfil = $_SESSION['tipoPerfil'];
        if ($_SESSION['tipoPerfil'] == 1){
            $nomePerfil = 'Administrador';
        } else if ($_SESSION['tipoPerfil'] == 2) {
            $nomePerfil = 'Chefe';
        } else if ($_SESSION['tipoPerfil'] == 3) {
            $nomePerfil = 'Segurança';
        } else {
            $nomePerfil = 'Usuário Comum';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>SafeCampus</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- Le styles -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/skin-blue.css" rel="stylesheet">
<!-- Le fav -->
<link rel="shortcut icon" href="assets/ico/logo.png">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/styletable.css" rel="stylesheet" />
</head>
<!-- /head-->
<body data-spy="scroll" data-target=".navbar" onload="escondeInfo();visualRelatorios();getPerfil();mostraInfoPerfil();">
<nav id="topnav" class="navbar navbar-fixed-top navbar-default" role="navigation">
<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#top-section"><img width="20%" height="20%" src="assets/ico/logo.png">SAFECAMPUS</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
                    <li class="active"><a href="#top-section">Home</a></li>
                    <li><a href="#Section-1">Registrar Ocorrência</a></li>
                    <li id="menuRelatorio"><a href="#Section-2">Relatórios</a></li>
                    <li id="menuCadastro"><a href="#Section-3">Cadastro</a></li>
                    <li><a href="#Section-4">Perfil</a></li>
                    <li><a href="#Section-6">Logout</a></li>
		</ul>
	</div>
        <div>
            <b><output id="nameUser" type='text'></b>
        </div>
        <div>
            <output id="tipo_User" type='text'>                    
        </div>  
            
        </div> 
	<!-- /.navbar-collapse -->              
</div>

</nav>

<!-- HOMEPAGE -->
<header id="top-section" class="fullbg">
<div class="jumbotron">
	<div id="carousel_intro" class="carousel slide fadeing">
		<div class="carousel-inner">
			<div class="active item" id="slide_1">
				<div class="carousel-content">
					<div class="animated fadeInDownBig">
						 <h1>Safecampus, a segurança até você.</h1>
					</div>
					<br/>
                                        <a href="#Section-1" class="buttonyellow animated fadeInLeftBig"><b>Registrar Ocorrência</b></a>
				</div>
			</div>
			<div class="item" id="slide_2">
				<div class="carousel-content">
					<div class="animated fadeInDownBig">
						 <h1>Praticidade e agilidade no relato de ocorrências.</h1>
					</div>
					<br/>
					<a href="" class="buttoncolor animated fadeInRightBig"><b>Mapa de Ocorrências</b></a>

				</div>
			</div>
			<div class="item" id="slide_3">
				<div class="carousel-content">
					<div class="animated fadeInDownBig">
						 <h1>Ajuda a tornar a universidade um ambiente mais tranquilo para se estudar, trabalhar ou visitar.</h1>
					</div>
						<br/>
						<a href="http://www.ufrpe.br/br" class="buttonyellow animated fadeInLeftBig"><b>UFRPE</b></a>
				</div>
			</div>
		</div>
	</div>
	<button class="left carousel-control" href="#carousel_intro" data-slide="prev" data-start="opacity: 0.6; left: 0%;" data-250="opacity:0; left: 5%;"><i class="fa fa-chevron-left"></i></button>
	<button class="right carousel-control" href="#carousel_intro" data-slide="next" data-start="opacity: 0.6; right: 0%;" data-250="opacity:0; right: 5%;"><i class="fa fa-chevron-right"></i></button>
</div>
<div class="inner-top-bg">
</div>
</header>
<!-- / HOMEPAGE -->
<!--  SECTION-1 -->
<section id="Section-1" class="fullbg">
<div class="section-divider">
</div>
<div class="container">
<div class="row">
	<div class="page-header text-center col-sm-12 col-lg-12 color-white animated fade">
		<h1>Registro de Ocorrências</h1>
		<p class="lead">
			 Preencha o formulário abaixo:
		</p>
	</div>
</div>
<div class="row color-white">
	<div class="col-md-12 animated fadeInUpNow">	</div>
</div>
<!-- end row -->
<div class="row animated fadeInUpNow background-color">
	<div class="col-lg-8 col-md-offset-2">
		<form action="http://safecampus.sistemasdeti.pe.hu/rest-api/ocorrencias/" method="post">
			<select class="form-control col-lg-6 leftradius" name="tipo_ocorrencia" required >
                                                    <option disabled="disabled" selected="selected" value="">Tipo de ocorrência:</option>
                                                    <option value='Acidente de trânsito'>Acidente de trânsito</option>
                                                    <option value='Agressão'>Agressão</option>
                                                    <option value='Assalto'>Assalto</option>
                                                    <option value='Furto'>Furto</option>
                                        </select>
                                        <select class="form-control col-lg-6 rightradius" id="outro" name="escolher_pessoa" required >
                                                    <option disabled="disabled" selected="selected" value="">Escolha uma opção:</option>
                                                    <option value="para_mim">Para mim</option>
                                                    <option value="para_outro">Para outro</option>
                                        </select>

                                                      <div id="quem">
                                                    		Dados da Vítima
                                                            	<div><input class="form-control col-lg-6 leftradius" id="nome" name="nome" type="text" placeholder="Nome" /></div>
                                                            	<div><input class="form-control col-lg-6 rightradius" id="email" name="email" type="text" placeholder="E-mail" /></div>
                                                    	</div>
				<br/>
			                    <input class="form-control" name="local"  placeholder="Local" type="text" required/>
			                    <p>Data:</p>
                                                           <input class="form-control col-lg-6 leftradius" name="data" placeholder="Data" type="date" required/>
                                                           <p>Hora:</p>
                                                           <input class="form-control col-lg-6 rigthradius" name="hora" placeholder="Hora" type="time" required/>
			<br/>
			<textarea class="col-lg-12 allradius form-control" placeholder="Descrição" rows="7" name="descricao"></textarea>
			<input type="reset" value="Limpar" class="ls-btn btn-lg pull-left"/>
			<input value="Enviar" type="submit" class="btn-success btn-lg pull-right">
		</form>
	</div>
</div>

</div>
</section>
<!-- SECTION-2(relatorio) -->
<section id="Section-2" class="fullbg color-white">
<div class="section-divider">
</div>
<div class="container demo-3">
<div class="row">
	<div class="page-header text-center col-sm-12 col-lg-12 animated fade">
		<h1>Relatórios</h1>
	</div>
</div>
<div class="row animated fadeInUpNow">
		<form action="" >
				<caption>Opções de busca das ocorrências:</caption>
						<select class="form-control" id="tipoBusca" name="tipoBusca" required>
							<option selected="selected" value="">Todas as ocorrências</option>
							<option value="Data" >Por data</option>
							<option value="Nome" >Por nome da vítima</option>
							<option value="TipoOcorrencia" >Por tipo de ocorrência</option>
						</select>

						<div id="busca_data">
							Data Inicial:<input class="form-control" id="data1" name="data1" type="date" />
							Data Final:<input class="form-control" id="data2" name="data2" type="date" />
						</div>
						<div id="busca_nome">
							<input class="form-control" id="nome1" name="nome1" type="text" placeholder="Nome da Vítima" required />
						</div>
						<div id="busca_tipo_ocorrencia">
							<select class="form-control" id = "tipo_ocorrencia1" name="tipo_ocorrencia1" required>
								<option disabled="disabled" selected="selected" value="">Tipo de ocorrência:</option>
								<option value='Acidente de trânsito'>Acidente de trânsito</option>
								<option value='Agressão'>Agressão</option>
								<option value='Assalto'>Assalto</option>
								<option value='Furto'>Furto</option>
							</select>
						</div>

						<button type="button" class="btn-primary btn-lg pull-right" onclick="mostraInfo();carregarItens();">Buscar</button>
		</form>
		<section>
			<!--Área que mostrará carregando-->
				<div id = info name=info class="alert alert-info">
                                    <table>
                                        <tbody class="col-md-12"><b><p3></p3></b></tbody>
                                        <tbody class="col-md-12"><button type="button" class="close" onclick="escondeInfo();" ><p>x</p></button></tbody>
                                    </table>
				</div>
			<!--Tabela-->
			<table id="minhaTabela" class="table table-bordered">
				<thead>
					<th>Tipo de Ocorrência</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Local</th>
					<th>Data</th>
					<th>Descrição</th>
				</thead>
				<!--Área que mostrará a tabela com os dados do banco-->
				<tbody>
				</tbody>
			</table>
		</section>
</div>
</div>
</section>
<!-- SECTION-3(cadastro) -->
<section id="Section-3" class="fullbg color-white">
<div class="section-divider">
</div>
<div class="container demo-3">
<div class="row">
    <div class="page-header text-center col-sm-12 col-lg-12 animated fade">
        <h1>Cadastro de Usuário</h1>
    </div>
</div> 
<div class="row animated fadeInUpNow background-color">
	<div class="col-lg-8 col-md-offset-2">
		<form action="http://safecampus.sistemasdeti.pe.hu/rest-api/usuarios/" method="post">
			<select class="form-control col-lg-6 leftradius" name="tipoPerfil" required >
                            <option disabled="disabled" selected="selected" value="0">Tipo do Perfil:</option>
                            <option value='1'>Administrador</option>
                            <option value='2'>Chefe da Segurança</option>
                            <option value='3'>Funcionário da Segurança</option>
                            <option value='4'>Usuário Comum</option>
                        </select>
                        Dados do novo usuário
                        <div><input class="form-control col-lg-6 leftradius" id="nome" name="nome" type="text" placeholder="Nome" /></div>
                        <div><input class="form-control col-lg-6 rightradius" id="email" name="email" type="text" placeholder="E-mail" /></div>
                        <br/>
                        <div><input class="form-control col-lg-6 leftradius" id="login" name="login" type="text" placeholder="Login" /></div>
                        <div><input class="form-control col-lg-6 rightradius" id="senha" name="senha" type="password" placeholder="Senha" /></div>
                        <br/>
			<input type="reset" value="Limpar" class="ls-btn btn-lg pull-left"/>
			<input value="Enviar" type="submit" class="btn-success btn-lg pull-right">
		</form>
	</div>
</div>  
</div>
</section>
<!-- SECTION-4(perfil) -->
<section id="Section-4" class="fullbg color-white">
<div class="section-divider">
</div>
<div class="container demo-3">
<div class="row">
    <div class="page-header text-center col-sm-12 col-lg-12 animated fade">
        <h1>Perfil - Dados do Usuário</h1>
    </div>
</div>
<!--Área que mostrará carregando-->  
<div class="row animated fadeInUpNow background-color">
	<div class="col-lg-8 col-md-offset-2">
            <div id = infoPerfil name=info class="alert alert-info">
                <table>
                    <tbody class="col-md-12"><b><p4></p4></b></tbody>
                    <tbody class="col-md-12"><button type="button" class="close" onclick="escondeInfoPerfil();" ><p>x</p></button></tbody>
                </table>
            </div>
            <form action="http://safecampus.sistemasdeti.pe.hu/rest-api/usuarios/<?php echo $id; ?>" method="post">
                    <div><input class="form-control col-lg-6 leftradius" id="edid" name="id" type="hidden" value="<?php echo $id; ?>" disabled/></div>
                    Nome:
                    <div><input class="form-control col-lg-6 leftradius" id="ednome" name="nome" type="text"/></div>
                    E-mail:
                    <div><input class="form-control col-lg-6 rightradius" id="edemail" name="email" type="text"/></div>
                    <br/>
                    Login:
                    <div><input class="form-control col-lg-6 leftradius" id="edlogin" name="login" type="text"/></div>
                    Senha:
                    <div><input class="form-control col-lg-6 rightradius" id="edsenha" name="senha" type="password"/></div>
                    <br/>
                    <input type="reset" value="Limpar" class="ls-btn btn-lg pull-left"/>
                    <input type="hidden" name="_METHOD" value="PUT"/>
                    <input value="Atualizar" type="submit" class="btn-success btn-lg pull-right">
            </form>

        </div>
</div>  
</div>
</section>
<!-- SECTION-6(Logout) -->
<section id="Section-6" class="fullbg color-white">
<div class="section-divider">
</div>
<div class="container">
    <div class="row">
	<div class="page-header text-center col-sm-12 col-lg-12 animated fade">
		<h1>Logout</h1>
	</div>
        <div class="container">
            <hr>
                <button type="button" class="btn-primary btn-lg pull-right " onclick="logout();">SAIR</button>
                <h2>Deseja sair do sistema?</h2>
                <samp class="clearfix"></samp>
            <hr>
        </div>
    </div>
</div>
</section>
<!-- FOOTER -->
<footer id="foot-sec">
<div class="footerdivide">
</div>
<div class="container ">
<div class="row">
	<div class="text-center color-white col-sm-12 col-lg-12">
		<ul class="social-icons">
			<li><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
			<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
		</ul>
		<p>
			 © Your Website.com. Template by WowThemes.net
		</p>
		<p>
			<a href="">Official Website</a> | <a href="">Theme Support</a> | <a href="">F.A.Q.</a>
		</p>
	</div>
</div>
</div>
</footer>
<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
<script src="assets/js/jquery.localscroll-1.2.7-min.js" type="text/javascript"></script>
<script src="assets/js/jquery.scrollTo-1.4.6-min.js" type="text/javascript"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.placeholder.js"></script>
<script src="assets/js/modernizr.custom.js"></script>
<script src="assets/js/toucheffects.js"></script>
<script src="assets/js/animations.js"></script>
<script src="assets/js/init.js"></script>

<script>
$(document).ready(function(){
  $("#quem").hide();
    $('#outro').on('change', function() {
      if ( this.value == 'para_outro')
      {
        $("#quem").show();
        document.getElementById("nome").required = true;
        document.getElementById("email").required = true;
      }
      else
      {
        $("#quem").hide();
        document.getElementById("nome").required = false;
        document.getElementById("email").required = false;
      }
    });
});
</script>

<script>
$(document).ready(function(){
  $("#busca_data").hide();
    $('#tipoBusca').on('change', function() {
      if ( this.value == 'Data')
      {
        $("#busca_data").show();
        document.getElementById("data1").required = true;
        document.getElementById("data2").required = true;
      }
      else
      {
        $("#busca_data").hide();
        document.getElementById("data1").required = false;
        document.getElementById("data2").required = false;
      }
    });
});
</script>

<script>
function visualRelatorios() {
    var tipo = "<?php echo $tipoPerfil; ?>";
    var x = document.getElementById('Section-2');
    if (tipo <= 2){
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
    var x2 = document.getElementById('Section-3');
    if (tipo <= 2){
        x2.style.display = 'block';
    } else {
        x2.style.display = 'none';
    } 
    var y = document.getElementById('menuRelatorio');
    if (tipo <= 2){
        y.style.display = 'block';
    } else {
        y.style.display = 'none';
    }
    var z = document.getElementById('menuCadastro');
    if (tipo <= 2){
        z.style.display = 'block';
    } else {
        z.style.display = 'none';
    }
}
</script>

<script>
function mostraInfo() {
    var x = document.getElementById('info');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    }
}
</script>

<script>
function escondeInfo() {
    var x = document.getElementById('info');
        x.style.display = 'none';
}
</script>

<script>
function mostraInfoPerfil() {
    var x = document.getElementById('infoPerfil');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    }
}
</script>

<script>
function escondeInfoPerfil() {
    var x = document.getElementById('infoPerfil');
        x.style.display = 'none';
}
</script>

<script>
$(document).ready(function(){
  $("#busca_nome").hide();
    $('#tipoBusca').on('change', function() {
      if ( this.value == 'Nome')
      {
        $("#busca_nome").show();
        document.getElementById("nome1").required = true;
      }
      else
      {
        $("#busca_nome").hide();
        document.getElementById("nome1").required = false;
      }
    });
});
</script>

<script>
$(document).ready(function(){
  $("#busca_tipo_ocorrencia").hide();
    $('#tipoBusca').on('change', function() {
      if ( this.value == 'TipoOcorrencia')
      {
        $("#busca_tipo_ocorrencia").show();
        document.getElementById("tipo_ocorrencia1").required = true;
      }
      else
      {
        $("#busca_tipo_ocorrencia").hide();
        document.getElementById("tipo_ocorrencia1").required = false;
      }
    });
});
</script>

<script>
    $(document).ready(function() {
        $('#minhaTabela').DataTable();
    } );
</script>

<script>
    function logout(){
        window.location.href='logout.php';
    };
</script>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstraptable.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
    <script src="/rest-api/getRelatorios.js"></script>
    <script src="/rest-api/getEdit.js"></script>

</body>
</html>