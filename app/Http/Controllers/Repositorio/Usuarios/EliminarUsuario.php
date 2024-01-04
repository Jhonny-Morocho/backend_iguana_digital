<?php
namespace App\Http\Controllers\Repositorio\Usuarios;
use App\Models\User;
class EliminarUsuario {


  public static  function eliminarPorId($id) {
   try {
        $registro = User::where('id',$id)->first();
        if(!$registro){
          throw new \Exception('Registro de usuario con el '.$id.' no encontrado');
        }
        $registro->delete();
        return response()->json(["data"=> $registro,"success"=>True,"message"=>"Registro con el id ".$id." eliminado"],200);
    } catch (\Throwable $th) {
        return response()->json(["success"=>false,"message"=>$th->getMessage(),"data"=>null],404);
    }
  }

}
