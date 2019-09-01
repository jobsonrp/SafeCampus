<?php
header('Content-Type: application/json; charset=utf-8');
echo "$data";
echo json_encode($data);

session_start();
if(isset($_POST['enter']))
    $entrar = $_POST['enter'];

  //echo "<script type='text/javascript'> var result = 'Programador';  </script>";
  //echo "<script src='http://safecampus.pe.hu/rest-api/getLogin.js'></script>";

//include "http://safecampus.pe.hu/rest-api/getLogin.js"; // ou a extensão que for

if(isset($_POST['login']))
    $login = $_POST['login'];
  if(isset($_POST['senha']))
    $senha = $_POST['senha'];

  echo "Olá $data";

    if (isset($entrar)) {

        if ($retorno != "ok"){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='http://safecampus.pe.hu/site/sistema.php'</script>";
          die();
        }else{
           $_SESSION["status"] = "1";
           $_SESSION['login'] = $login;
           header('location:sistema.php');
        }
    }
?>