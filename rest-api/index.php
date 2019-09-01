<?php
//Autoload
$loader = require 'vendor/autoload.php';

//Instanciando objeto
$app = new \Slim\Slim(array(
    'templates.path' => 'templates'
));

/*
*Rota ṕara a home
*implementar depois
*/
$app->get('/', function(){
	echo "Safe Campus WebSite";
});

/*
*Rotas de Usuario
*/
//Listando todos os usuarios
$app->get('/usuarios/', function() use ($app){
	(new \controllers\Usuario($app))->listaUsuarios();
});

//get usuario
$app->get('/usuarios/:id', function($id) use ($app){
	(new \controllers\Usuario($app))->getUsuario($id);
});

//get usuario site
$app->get('/usuarioSite/:id', function($id) use ($app){
	(new \controllers\Usuario($app))->getUsuarioSite($id);
});

//get usuario
$app->get('/usuarios/:id(/:nome)', function($id,$nome) use ($app){
	(new \controllers\Usuario($app))->getUsuarioNome($id,$nome);
});
//loginAndroid
$app->get('/usuarios/Login/:login/:senha', function($login,$senha) use ($app){
    (new \controllers\Usuario($app))->getLoginSenha($login,$senha);
});
//loginSite
$app->get('/usuarios/LoginSite/:login/:senha', function($login,$senha) use ($app){
    (new \controllers\Usuario($app))->getLoginSite($login,$senha);
});

//novo usuario getLoginSenha
$app->post('/usuarios/', function() use ($app){
	(new \controllers\Usuario($app))->novoUsuario();
});

//edita usuario
$app->put('/usuarios/:id', function($id) use ($app){
	(new \controllers\Usuario($app))->editarUsuario($id);
});

//apaga usuario
$app->delete('/usuarios/:id', function($id) use ($app){
	(new \controllers\Usuario($app))->excluirUsuario($id);
});

/*
*Rotas de Ocorrencias
*/
//Listando todas as ocorrencias
$app->get('/ocorrencias/', function() use ($app){
	(new \controllers\Ocorrencia($app))->listaOcorrencias();
});
$app->get('/ocorrencias2/', function() use ($app){
        (new \controllers\Ocorrencia($app))->listaOcorrencias();
});

//get ocorrencia
$app->get('/ocorrencias/:id', function($id) use ($app){
	(new \controllers\Ocorrencia($app))->getOcorrencia($id);
});

$app->get('/ocorrencias/Data/:data', function($data) use ($app){
	(new \controllers\Ocorrencia($app))->getOcorrenciaData1($data);
});

$app->get('/ocorrencias/Data/:data1/:data2', function($data1,$data2) use ($app){
	(new \controllers\Ocorrencia($app))->getOcorrenciaData($data1,$data2);
});

$app->get('/ocorrencias/Nome/:nome', function($nome) use ($app){
    (new \controllers\Ocorrencia($app))->getOcorrenciaNome($nome);
});

$app->get('/ocorrencias/TipoOcorrencia/:tipo_ocorrencia', function($tipo_ocorrencia) use ($app){
    (new \controllers\Ocorrencia($app))->getOcorrenciaTipoOcorrencia($tipo_ocorrencia);
});

//nova ocorrencia
$app->post('/ocorrencias/', function() use ($app){
	(new \controllers\Ocorrencia($app))->novaOcorrencia();
});
//nova ocorrencia Tema2
$app->post('/ocorrencias2/', function() use ($app){
    (new \controllers\Ocorrencia($app))->novaOcorrencia2();
});

//edita ocorrencia
$app->put('/ocorrencias/:id', function($id) use ($app){
	(new \controllers\Ocorrencia($app))->editarOcorrencia($id);
});

//apaga ocorrencia
$app->delete('/ocorrencias/:id', function($id) use ($app){
	(new \controllers\Ocorrencia($app))->excluirOcorrencia($id);
});

/*
 * Rota para as notificações
 * */

//Notificação para toda a equipe de segurança
$app->get('/notification_team/', function() use ($app) {
    (new \controllers\Notification($app))->send_team_notification();
});

//Notificação para o guarda mais próximo
$app->get('/notification/', function() use ($app) {
    (new \controllers\Notification($app))->send_notification();
});

/*
*Rotas de TipoOcorrencias
*/
//Listando todos os tipos de ocorrencias
$app->get('/tipoocorrencias/', function() use ($app){
    (new \controllers\TipoOcorrencia($app))->listaTiposOcorrencias();
});

//get tipo de ocorrencia
$app->get('/tipoocorrencias/:id', function($id) use ($app){
    (new \controllers\TipoOcorrencia($app))->getTipoOcorrencia($id);
});

//novo tipo de ocorrencia
$app->post('/tipoocorrencias/', function() use ($app){
    (new \controllers\TipoOcorrencia($app))->novoTipoOcorrencia();
});

//edita tipo de ocorrencia
$app->put('/tipoocorrencias/:id', function($id) use ($app){
    (new \controllers\TipoOcorrencia($app))->editarTipoOcorrencia($id);
});

//apaga tipo de ocorrencia
$app->delete('/tipoocorrencias/:id', function($id) use ($app){
    (new \controllers\TipoOcorrencia($app))->excluirTipoOcorrencia($id);
});


/*
*Rotas de Localization
*/

//Listando todas as tipos localizações
$app->get('/localizacao/', function() use ($app){
    (new \controllers\Localization($app))->listaLocalizacao();
});

//Get localização por ID
$app->get('/localizacao/:id', function($id) use ($app){
    (new \controllers\Localization($app))->getLocalizacao($id);
});

//Cadastro de localização
$app->post('/localizacao/', function() use ($app){
    (new \controllers\Localization($app))->novaLocalizacao();
});

//Edita uma localização
$app->put('/localizacao/:id', function($id) use ($app){
    (new \controllers\Localization($app))->editarLocalizacao($id);
});

//Deleta uma localização do banco
$app->delete('/localizacao/:id', function($id) use ($app){
    (new \controllers\Localization($app))->excluirLocalizacao($id);
});


//Rodando aplicação
$app->run();
