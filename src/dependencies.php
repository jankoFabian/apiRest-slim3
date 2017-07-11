<?php
//$container = new \Slim\Container;
//$app = new \Slim\App($container);
$container = $app->getContainer();
//monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};
//render
$container['vista']=function($c){
     $settings=$c->get('settings')['renderer'];
     return new \Slim\Views\PhpRenderer($settings['template_path']);

};
/*$container['UserController'] = function($c){
	return new \App\Controllers\userController($c);
};*/
//conexion a base de datos
$container['db']=function($c){
    $settings=$c->get('settings')['db'];
    $pdo=new PDO('mysql:hots='.$settings['BD_SERVIDOR'].'; dbname='.$settings['BD_NOMBRE']. ';charset=utf8', $settings['BD_USUARIO'], $settings['BD_PASSWORD']);
   $fpdo=new FluentPDO($pdo);
    return $fpdo;
};

//creando objeto de la clase ModeloUsuario y ModeloAutenticar
$container['model']=function ($c){
    //require __DIR__. '/../src/model/modelo_usuario.php';
   // require __DIR__. '/../src/model/modelo_autenticar.php';
    return (object)[
      'usuario' => new App\Model\ModeloUsuario($c->db),
      'autenticar'=> new App\Model\ModeloAutenticar($c->db)
    ];
};


?>