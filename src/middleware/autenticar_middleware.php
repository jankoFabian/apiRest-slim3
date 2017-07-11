<?php
   namespace App\Middleware;
  use  Exception; 
  use   App\Lib\Auth;
class autenticar_middleware{
       private $app=null;

  public function __CONSTRUCT($app){
      $this->app=$app;

  }


       public function __invoke($request, $response, $next){
           ///recuperando adtos del setings
           $c=$this->app->getContainer();
           $app_token_name=$c->settings['token_autenticasion'];
            
          $tokensito=$request->getHeader($app_token_name);
          //si el token es vacio
              if(isset($tokensito[0])) {
                  //el tokensito toma el valor null
                  $tokensito=$tokensito[0];
              }
              try{
                Auth::Check($tokensito);
              }catch(Exception $e){
                      return $response->withStatus(401)->write("No tienes Autorizacion");
              }

          $response=$next($request, $response);
         // $response->getBody()->write("---");
          return $response;
       }

   }

?>