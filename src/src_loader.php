<?php
   $base=__DIR__.'/../src/';
   $folders=[
     'model',
     'middleware',
     'lib'
   ];
   foreach($folders as $f){
         foreach(glob($base."$f/*.php") as $k=>$filename){
              require $filename;
         }
   }


?>