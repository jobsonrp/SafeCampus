<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 11/08/17
 * Time: 01:03
 */

namespace controllers;

if(isset($_GET['send_team_notification'])){
    send_team_notification();
}

if(isset($_GET['send_notification'])){
    send_notification();
}

class Notification
{
    public function send_team_notification()
    {
        #Montando a notificação

        global $app;

        $topic = "/topics/alerta";

        $msg = array
        (
            'body' 	=> 'Um usuário apertou o botão do pânico em algum lugar do campus!',
            'title'	=> 'Safe Campus',

        );
        $fields = array
        (
            'to' => $topic,
            'notification'	=> $msg,
        );


        $headers = array
        (
            'Authorization:key=AIzaSyAG9WnGxF_P9tPO7f5xsHpM5VXKFU4aigI',
            'Content-Type:application/json',
        );

        #Enviando a resposta ao servidor Firebase

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        echo $result;
        curl_close( $ch );

        $app->render('default.php',["data"=>$result],200);
    }

    public function send_notification()
    {
        #Montando a notificação

        global $app;

        $token = null;

        $msg = array
        (
            'body' 	=> 'Um usuário apertou o botão do pânico próximo a você!',
            'title'	=> 'Safe Campus',

        );
        $fields = array
        (
            'to' => $token,
            'notification'	=> $msg,
        );


        $headers = array
        (
            'Authorization:key=AIzaSyAG9WnGxF_P9tPO7f5xsHpM5VXKFU4aigI',
            'Content-Type:application/json',
        );

        #Enviando a resposta ao servidor Firebase

        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        echo $result;
        curl_close( $ch );

        $app->render('default.php',["data"=>$result],200);
    }

}