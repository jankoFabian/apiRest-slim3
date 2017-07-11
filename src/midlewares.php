<?php
   $a=function($request, $response, $next){
      $response->getBody()->write("Antes");
      $response=$next($request, $response);
      $response->getBody()->write("Despues");
     return $response;
   };
/*$b=function($request, $response, $next){
      $response->getBody()->write("---");
      $response=$next($request, $response);
      $response->getBody()->write("---");
     return $response;
};*/


   $app->add($a);




?>