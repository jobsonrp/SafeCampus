<?php
    session_start();
    if(isset($_GET["nome"]) == "" ){
      echo"<script language='javascript' type='text/javascript'>alert('Por favor! Faça o Login.');window.location.href='../index.php#Section-1';</script>";
    }
    else{
        $id = $_GET["id"];
        $nome = $_GET["nome"];
        $tipoPerfil = $_GET["tipoPerfil"];
        $_SESSION["status"] = "1";
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['tipoPerfil'] = $tipoPerfil;
        header('location:sistema.php');
    }
    
?>