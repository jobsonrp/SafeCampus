<?php
namespace controllers{
	/*
	Classe Usuario
	*/
	class Usuario{
		//Atributo para banco de dados
		private $PDO;

		/*
		__construct
		Conectando ao banco de dados
		*/
		function __construct(){
			$this->PDO = new \PDO('mysql:host=localhost;dbname=u582567541_reg', 'u582567541_bsi', 'admin123456'); //Conexão
			$this->PDO->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION ); //habilitando erros do PDO
		}
		/*
		Listando usuarios
		*/
		public function listaUsuarios(){
			global $app;
			$sth = $this->PDO->prepare("SELECT * FROM usuario");
			$sth->execute();
			$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200);
		}
		/*
		get
		param $id
		Retorna usuario pelo id
		*/
		public function getUsuario($id){
			global $app;
			$sth = $this->PDO->prepare("SELECT * FROM usuario WHERE id = :id");
			$sth ->bindValue(':id',$id);
			$sth->execute();
			$result = $sth->fetch(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200);
		}
                //Perfil
		public function getUsuarioSite($id){
			global $app;
			$sth = $this->PDO->prepare("SELECT * FROM usuario WHERE id = :id");
			$sth ->bindValue(':id',$id);
			$sth->execute();
			$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200);
		}

		public function getUsuarioNome($id,$nome){
			global $app;
			$sth = $this->PDO->prepare("SELECT * FROM usuario WHERE id = :id and nome =:nome");
			$sth ->bindValue(':id',$id);
			$sth ->bindValue(':nome',$nome);
			$sth->execute();
			$result = $sth->fetch(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200);
		}
		//Android
		public function getLoginSenha($login,$senha){
			global $app;
			$sth = $this->PDO->prepare("SELECT * FROM usuario WHERE login = :login and senha =:senha");
			$sth ->bindValue(':login',$login);
			$sth ->bindValue(':senha',$senha);
			$sth->execute();
			$result = $sth->fetch(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200);
		}
		//Site
		public function getLoginSite($login,$senha){
			global $app;
			$sth = $this->PDO->prepare("SELECT * FROM usuario WHERE login = :login and senha =:senha");
			$sth ->bindValue(':login',$login);
			$sth ->bindValue(':senha',$senha);
			$sth->execute();
			$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200);
		}
		/*
		Cadastro de Usuario
		*/
		public function novoUsuario(){
			global $app;
			$dados = json_decode($app->request->getBody(), true);
			$dados = (sizeof($dados)==0)? $_POST : $dados;
			$keys = array_keys($dados); //Pega as chaves do array
			/*
			O uso de prepare e bindValue é importante para se evitar SQL Injection
			*/
			$sth = $this->PDO->prepare("INSERT INTO usuario (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
			foreach ($dados as $key => $value) {
				$sth ->bindValue(':'.$key,$value);
			}
			$sth->execute();
			//Retorna o id inserido
			$app->render('postUser.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
		}
		/*
		param $id
		Editando usuario
		*/
		public function editarUsuario($id){
			global $app;
			$dados = json_decode($app->request->getBody(), true);
			$dados = (sizeof($dados)==0)? $_POST : $dados;
			$sets = [];
			foreach ($dados as $key => $VALUES) {
				$sets[] = $key." = :".$key;
			}

			$sth = $this->PDO->prepare("UPDATE usuario SET ".implode(',', $sets)." WHERE id = :id");
			$sth ->bindValue(':id',$id);
			foreach ($dados as $key => $value) {
				$sth ->bindValue(':'.$key,$value);
			}
			//Retorna status da edição
			$app->render('putUser.php',["data"=>['status'=>$sth->execute()==1]],200);
		}

		/*
		param $id
		Excluindo usuario
		*/
		public function excluirUsuario($id){
			global $app;
			$sth = $this->PDO->prepare("DELETE FROM usuario WHERE id = :id");
			$sth ->bindValue(':id',$id);
			$app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
		}
	}
}
