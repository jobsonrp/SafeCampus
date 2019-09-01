<?php
namespace controllers{
    /*
    Classe TipoOcorrencia
    */
    class TipoOcorrencia{
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
        Listando tipos de ocorrencias
        */
        public function listaTiposOcorrencias(){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM tipoocorrencia");
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }
        /*
        get
        param $id
        Retorna ocorrencia pelo id
        */
        public function getTipoOcorrencia($id){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM tipoocorrencia WHERE id = :id");
            $sth ->bindValue(':id',$id);
            $sth->execute();
            $result = $sth->fetch(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        /*
        Cadastro de tipo de ocorrencia
        */
        public function novoTipoOcorrencia(){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $keys = array_keys($dados); //Pega as chaves do array
            /*
            O uso de prepare e bindValue é importante para se evitar SQL Injection
            */
            $sth = $this->PDO->prepare("INSERT INTO tipoocorrencia (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
            foreach ($dados as $key => $value) {
                $sth ->bindValue(':'.$key,$value);
            }
            $sth->execute();
            //Retorna o id inserido
            $app->render('default.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
        }

        /*
        param $id
        Editando um tipo de ocorrencia
        */
        public function editarTipoOcorrencia($id){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $sets = [];
            foreach ($dados as $key => $VALUES) {
                $sets[] = $key." = :".$key;
            }

            $sth = $this->PDO->prepare("UPDATE tipoocorrencia SET ".implode(',', $sets)." WHERE id = :id");
            $sth ->bindValue(':id',$id);
            foreach ($dados as $key => $value) {
                $sth ->bindValue(':'.$key,$value);
            }
            //Retorna status da edição
            $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
        }

        /*
        param $id
        Excluindo um tipo de ocorrencia
        */
        public function excluirTipoOcorrencia($id){
            global $app;
            $sth = $this->PDO->prepare("DELETE FROM tipoocorrencia WHERE id = :id");
            $sth ->bindValue(':id',$id);
            $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
        }
    }
}
