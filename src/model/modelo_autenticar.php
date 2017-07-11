<?php
namespace App\Model;
use App\Lib\Auth;
use App\Lib\Response;
class ModeloAutenticar{
    private $conexion;
    private $tabla='miembros';
  // private $result;
   private $response;
    public function __CONSTRUCT($db){
       $this->conexion=$db;
       $this->response=new Response();
   }
public function autenticasion($nombre,$password){
    //echo $nombre;
    //echo $password;
    //echo $this->tabla;
   // var_dump($this->conexion) ;
    $row=$this->conexion->from($this->tabla)
                        ->where('nombre', $nombre)
                        ->where('password',$password)
                        ->fetch();
echo "esto es row";
//$user = (object)$row;

   if($row>0){
         $nomb=explode(' ', $row['nombre']);
         $token=Auth::SignIn([
            'id'     => $row['id'],
            'nombre' => $nomb
            //'nombreCompleto'=>$row->nombre
            //'correo' =>$row->correo

         ]);
        $this->response->result = $token;
	    	return $this->response->setResponse(true);
    }else{
        return $this->response->setResponse(false, "Credenciales no validas");
    }
}



}



?>