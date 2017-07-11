<?php
  return  [
       'settings'=>[
           'displayErrorDetails'=>false,
           //monolog
           'logger'=>[
               'name'=>'slim-app',
               'path'=>__DIR__.'/../logs/app.log',
               'level'=>\Monolog\Logger::DEBUG,
           ],
           //render view
           'renderer'=>[
               'template_path'=>__DIR__.'/../templates/'
           ],
           //datos para conexion a la base de datos 
           'db'=>[
               'BD_SERVIDOR'=>'127.0.0.1',
               'BD_NOMBRE'=>'nyLista',
               'BD_USUARIO'=>'root',
               'BD_PASSWORD'=>''
           ],
           'token_autenticasion'=>'jf'

       ],
   ];


?>