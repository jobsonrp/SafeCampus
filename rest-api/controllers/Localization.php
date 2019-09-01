<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/08/17
 * Time: 02:39
 */

namespace controllers;

/*
 * Classe para trabalhar com a localização por latitude/longitude
 * */


class Localization
{

    //Atributo para banco de dados
    private $PDO;

    /*
    __construct
    Conectando ao banco de dados
    */
    function __construct(){
        $this->PDO = new \PDO('mysql:host=localhost;dbname=u871927708_bsidb', 'u871927708_bsius', '@Admn642531'); //Conexão
        $this->PDO->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION ); //habilitando erros do PDO
    }
    /*
    Listando localizações
    */
    public function listaLocalizacao(){
        global $app;
        $sth = $this->PDO->prepare("SELECT * FROM localizacao");
        $sth->execute();
        $result = $sth->fetchAll(\PDO::FETCH_ASSOC);
        $app->render('default.php',["data"=>$result],200);
    }
    /*
    get
    param $id
    Retorna localização pelo id
    */
    public function getLocalizacao($id){
        global $app;
        $sth = $this->PDO->prepare("SELECT * FROM localizacao WHERE id = :id");
        $sth ->bindValue(':id',$id);
        $sth->execute();
        $result = $sth->fetch(\PDO::FETCH_ASSOC);
        $app->render('default.php',["data"=>$result],200);
    }

    /*
    Cadastro de localização
    */
    public function novaLocalizacao(){
        global $app;
        $dados = json_decode($app->request->getBody(), true);
        $dados = (sizeof($dados)==0)? $_POST : $dados;
        $keys = array_keys($dados); //Pega as chaves do array
        /*
        O uso de prepare e bindValue é importante para se evitar SQL Injection
        */
        $sth = $this->PDO->prepare("INSERT INTO localizacao (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")");
        foreach ($dados as $key => $value) {
            $sth ->bindValue(':'.$key,$value);
        }
        $sth->execute();
        //Retorna o id inserido
        $app->render('post.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
    }

    /*
    param $id
    Editando localização
    */
    public function editarLocalizacao($id){
        global $app;
        $dados = json_decode($app->request->getBody(), true);
        $dados = (sizeof($dados)==0)? $_POST : $dados;
        $sets = [];
        foreach ($dados as $key => $VALUES) {
            $sets[] = $key." = :".$key;
        }

        $sth = $this->PDO->prepare("UPDATE localizacao SET ".implode(',', $sets)." WHERE id = :id");
        $sth ->bindValue(':id',$id);
        foreach ($dados as $key => $value) {
            $sth ->bindValue(':'.$key,$value);
        }
        //Retorna status da edição
        $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
    }

    /*
    param $id
    Excluindo Localizacao
    */
    public function excluirLocalizacao($id){
        global $app;
        $sth = $this->PDO->prepare("DELETE FROM localizacao WHERE id = :id");
        $sth ->bindValue(':id',$id);
        $app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200);
    }
}