<?php
namespace controllers{
    /*
    Classe Ocorrencia
    */
    class Ocorrencia{
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
        Listando ocorrencias
        */
        public function listaOcorrencias(){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM ocorrencia");
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }
        /*
        get
        param $id
        Retorna ocorrencia pelo id
        */
        public function getOcorrencia($id){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM ocorrencia WHERE id = :id");
            $sth ->bindValue(':id',$id);
            $sth->execute();
            $result = $sth->fetch(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        public function getOcorrenciaData1($data){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM ocorrencia WHERE data >= :data");
            $sth ->bindValue(':data',$data);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        public function getOcorrenciaData($data1,$data2){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM ocorrencia WHERE data BETWEEN :data1 AND :data2");
            $sth ->bindValue(':data1',$data1);
            $sth ->bindValue(':data2',$data2);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        public function getOcorrenciaNome($nome){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM ocorrencia WHERE nome like :nome");
            $nome = "%".$nome."%";
            $sth ->bindValue(':nome',$nome);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        public function getOcorrenciaTipoOcorrencia($tipo_ocorrencia){
            global $app;
            $sth = $this->PDO->prepare("SELECT * FROM ocorrencia WHERE tipo_ocorrencia = :tipo_ocorrencia");
            $sth ->bindValue(':tipo_ocorrencia',$tipo_ocorrencia);
            $sth->execute();
            $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
            $app->render('default.php',["data"=>$result],200);
        }

        /*
        Cadastro de Ocorrencia
        */
        public function novaOcorrencia(){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $keys = array_keys($dados); //Pega as chaves do array
            /*
            O uso de prepare e bindValue é importante para se evitar SQL Injection
            */
            $sth = $this->PDO->prepare("INSERT INTO ocorrencia (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
            foreach ($dados as $key => $value) {
                $sth ->bindValue(':'.$key,$value);
            }
            $sth->execute();
            //Retorna o id inserido
            $app->render('post.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
        }

        public function novaOcorrencia2(){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $keys = array_keys($dados); //Pega as chaves do array
            /*
            O uso de prepare e bindValue é importante para se evitar SQL Injection
            */
            $sth = $this->PDO->prepare("INSERT INTO ocorrencia (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
            foreach ($dados as $key => $value) {
                $sth ->bindValue(':'.$key,$value);
            }
            $sth->execute();
            //Retorna o id inserido
            $app->render('post2.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
        }

        /*
        param $id
        Editando Ocorrencia
        */
        public function editarOcorrencia($id){
            global $app;
            $dados = json_decode($app->request->getBody(), true);
            $dados = (sizeof($dados)==0)? $_POST : $dados;
            $sets = [];
            foreach ($dados as $key => $VALUES) {
                $sets[] = $key." = :".$key;
            }

            $sth = $this->PDO->prepare("UPDATE ocorrencia SET ".implode(',', $sets)." WHERE id = :id");
            $sth ->bindValue(':id',$id);
            foreach ($dados as $key => $value) {
                $sth ->bindValue(':'.$key,$value);
            }
            //Retorna status da edição
            $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
        }

        /*
        param $id
        Excluindo Ocorrencia
        */
        public function excluirOcorrencia($id){
            global $app;
            $sth = $this->PDO->prepare("DELETE FROM ocorrencia WHERE id = :id");
            $sth ->bindValue(':id',$id);
            $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
        }
    }
}
