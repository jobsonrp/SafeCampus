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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="site/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="site/assets/css/font-awesome.min.css" rel="stylesheet">
<link href="site/assets/css/style.css" rel="stylesheet">
<link href="site/assets/css/animate.css" rel="stylesheet">
<link href="site/assets/css/skin-blue.css" rel="stylesheet">
<!-- Le fav -->
<link rel="shortcut icon" href="site/assets/ico/logo.png">
    <link href="site/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="site/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="site/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="site/assets/css/styletable.css" rel="stylesheet" />

<style>
#Section-4 {
    background-image: black;
    background-color: white;
    background-position: right bottom, left top;
    background-repeat: no-repeat, repeat;
    padding: 15px;
}
</style>

</head>
<!-- /head-->
<body data-spy="scroll" data-target=".navbar" onload="escondeInfo();">
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
        <a class="navbar-brand" href="#top-section"><img width="20%" height="20%" src="site/assets/ico/logo.png">SAFECAMPUS</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="#top-section">Home</a></li>
            <li><a href="#Section-1">Login</a></li>
            <li><a href="#Section-2">Cadastro</a></li>
            <li><a href="#Section-3">Contato</a></li>
        </ul>
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
                    <a href="#Section-1" class="buttonyellow animated fadeInLeftBig"><b>Login</b></a>
                </div>
            </div>
            <div class="item" id="slide_2">
                <div class="carousel-content">
                    <div class="animated fadeInDownBig">
                         <h1>Praticidade e agilidade no relato de ocorrências.</h1>
                    </div>
                    <br/>
                    <a href="#Section-2" class="buttoncolor animated fadeInRightBig"><b>Cadastro</b></a>
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
        <h1>Login</h1>
        <p class="lead">
             Para se cadastrar acesse "Cadastro" no menu superior.
        </p>
    </div>
</div>
<div class="row color-white">
    <div class="col-md-12 animated fadeInUpNow"></div>
</div>
<!-- end row -->

    <div class="col-lg-8 col-md-offset-2 row animated fadeInUpNow">
        <div>
            <form action="" >
                <div id="loginSenha">
                    <input class="form-control" id="login" name="login" type="text" placeholder="Login" required />
                    <input class="form-control" id="senha" name="senha" type="text" placeholder="Senha" required />
                    <button type="button" class="btn-success btn-lg pull-right" onclick="mostraInfo();verificaLogin();">Entrar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-8 col-md-offset-2 row">
        <div id = info name=info class="alert alert-info">
            <table>
                <tbody class="col-md-12"><b><p3></p3></b></tbody>
                <tbody class="col-md-12"><button type="button" class="close" onclick="escondeInfo();"><p>x</p></button></tbody>
            </table>
        </div>
    </div>
</div>
</section>
<!-- SECTION-2(cadastro) -->
<section id="Section-2" class="fullbg color-white">
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
		<form action="http://safecampus.pe.hu/rest-api/usuarios/" method="post">
			<select class="form-control col-lg-6 leftradius" name="tipoPerfil" required >
                            <option disabled="disabled" selected="selected" value="0">Tipo do Perfil:</option>
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
<!-- SECTION-3(reviews) -->
<section id="Section-3" class="fullbg color-white">
<div class="section-divider">
</div>
<div class="container">
<div class="row">
    <div class="page-header text-center col-sm-12 col-lg-12 animated fade">
        <h1>Contatos</h1>
    </div>
</div>
<div class="row testimonials animated fadeInUpNow">
    <div class="col-sm-12 col-lg-12">
        <div class="arrow">
        </div>
        <div class="testimonials-slider">
            <div class="slide">
                <div class="testimonials-carousel-thumbnail">
                    <img width="120" alt="" src="site/assets/img/avatar.jpg">
                </div>
                <div class="testimonials-carousel-context">
                    <div class="testimonials-name">
                         Contato 1 <span>safecammpus.pe.hu</span>
                    </div>
                    <div class="testimonials-carousel-content">
                        <p>
                             Telefone: (81) 91919-9191
                        </p>
                        <p>
                             E-mail: contato1@com
                        </p>
                    </div>
                </div>
            </div>
            <div class="slide">
                <div class="testimonials-carousel-thumbnail">
                    <img width="120" alt="" src="site/assets/img/avatar.jpg">
                </div>
                <div class="testimonials-carousel-context">
                    <div class="testimonials-name">
                         Contato 2 <span>safecammpus.pe.hu</span>
                    </div>
                    <div class="testimonials-carousel-content">
                        <p>
                             Telefone: (81) 92929-9292
                        </p>
                    </div>
                    <p>
                         E-mail: contato2@com
                    </p>
                </div>
            </div>
            <div class="slide">
                <div class="testimonials-carousel-thumbnail">
                    <img width="120" alt="" src="site/assets/img/avatar.jpg">
                </div>
                <div class="testimonials-carousel-context">
                    <div class="testimonials-name">
                         Contato 3 <span>safecammpus.pe.hu</span>
                    </div>
                    <div class="testimonials-carousel-content">
                        <p>
                             Telefone: (81) 93939-9393
                        </p>
                    </div>
                    <p>
                         E-mail: contato3@com
                    </p>
                </div>
            </div>
        </div>
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
<script src="site/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="site/assets/js/bootstrap.js"></script>
<script src="site/assets/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
<script src="site/assets/js/jquery.localscroll-1.2.7-min.js" type="text/javascript"></script>
<script src="site/assets/js/jquery.scrollTo-1.4.6-min.js" type="text/javascript"></script>
<script src="site/assets/js/jquery.bxslider.min.js"></script>
<script src="site/assets/js/jquery.placeholder.js"></script>
<script src="site/assets/js/modernizr.custom.js"></script>
<script src="site/assets/js/toucheffects.js"></script>
<script src="site/assets/js/animations.js"></script>
<script src="site/assets/js/init.js"></script>

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

    <script src="site/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="site/assets/js/bootstraptable.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="site/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="site/assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="site/assets/js/custom.js"></script>
    <script src="rest-api/getLogin.js"></script>

</body>
</html>