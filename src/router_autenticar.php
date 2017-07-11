<?php
  $app->group('/autenticasion', function(){
     
     $this->post('/autenticando', function($request, $response, $args){
         $parametros=$request->getParsedBody();
         //echo $parametros['nombre'];

         return $response->withHeader('Content-type', 'aplication/json')
            ->write(
            json_encode($this->model->autenticar->autenticasion($parametros['nombre'], $parametros['password']))
            );
      });

  });

?>