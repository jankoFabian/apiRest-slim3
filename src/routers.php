<?php
use App\Lib\Response;
$app->group("/usuarios", function(){
     $this->get('/', function($request, $response, $args){
    // $type=gettype($request);
     //$class=get_class($request);
     //$metodo=get_class_methods($request);
     // echo json_encode([$type,$class, $metodo]);
     $this->logger->addInfo('In home');
     return $response->write("   bien benido a casa");
   });
 //===================================================================================
   $this->get('/hello/{name}', function ($request, $response, $args) {
    //$name = $request->getAttribute('name');
    //$response->getBody()->write("Hello, $name");
      $response->write("Hola, ".$args['name']);
      return $response;
  });
 //===================================================================================
   $this->get('/home/[{name}]', function($request, $response, $args){
   return $this->vista->render($response, 'index.phtml', $args);
});
  
 //===================================================================================
$this->get('/janko/lista', function($request, $response, $args){
     /*$query=$this->db->from('miembros')->orderBy('nombre DESC')->limit(8);
     //$query->execute();
     $row=$query->fetchAll();
     return json_encode($row, JSON_UNESCAPED_UNICODE);*/
     return $response->withHeader('Content-type', 'aplication/json')
                     -> write(json_encode($this->model->usuario->listar())
                     );
});
//====================================================================================
$this->get('/janko/{id}', function($request, $response,$args){
     $id=$args['id'];
    return $response->withHeader('Content-type', 'aplication/json')
                    ->write(
                        json_encode($this->model->usuario->buscar($id))
                    );    
});
//====================================================================================
$this->post('/insertar', function($request, $response){
     $datosform=$request->getParsedBody();
     return $response->withHeader('Content-type', 'aplication/json')
                     ->write(
                         json_encode($this->model->usuario->insertar($datosform))
                     );

    //echo json_encode($datosform['nombre']);
    
  });
//====================================================================================
  
//=====================================================================================
})->add(new App\Middleware\autenticar_middleware($app));
//metodo para insertar nuevo usuario en la tabla miembros
//$app->get('/test','App\Controllers\UserController:show')->setName('mt');
//$app->get('/users','App\Moddel\UserController:Users')->setName('users');
