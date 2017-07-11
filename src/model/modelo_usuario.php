<?php
namespace App\Model;
//use App\Lib\Response;
 class ModeloUsuario{
  private $conexion;
  private $tabla='miembros';
  ///private $response;

   public function __CONSTRUCT($db){
       $this->conexion=$db;
      // $this->response=new Response();
   }
   public function listar(){
   // var_dump($this->conexion) ;
      return $this->conexion->from($this->tabla)->fetchAll();

   }
   public function buscar($id){
         $query=$this->conexion->from($this->tabla, $id)->fetch();
         if ($query)
            return  $query;
         else 
            return  array('query'=>false,'mensaje'=>'No se encuentra en la base de datos.');
   }
   public function insertar($datosform){
       $values = array('nombre' => $datosform['nombre'], 
                        'descripcion' => $datosform['descripcion'],
                        'imagen'=>$datosform['imagen'],
                        'password'=>$datosform['password']
                        );
    // or shortly
    //$query = $fpdo->insertInto('miembros', $values)->execute();
       $query = $this->conexion->insertInto($this->tabla, $values)->execute();
        if ($query)
            return  array('query'=>true,'mensaje'=>'Datos insertados correctamente.');
        else 
            return  array('query'=>false,'mensaje'=>'Error al insertar datos en la tabla.');
   }
}
?>