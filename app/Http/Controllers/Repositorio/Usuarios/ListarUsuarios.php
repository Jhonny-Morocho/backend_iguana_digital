<?php
namespace App\Http\Controllers\Repositorio\Usuarios;
use App\Models\User;
class ListarUsuarios {


  public static  function listarTodos() {
    try {
        $registros = User::with('departamento')->orderBy('id','desc')->get();
        return response()->json(["data"=> $registros,"succes"=>True,"message"=>"Listado de usuarios"],200);
    } catch (\Throwable $th) {
        return response()->json(["succes"=>false,"message"=>$th->getMessage(),"data"=>null],404);
    }
  }

  public static  function obtenerUsuarioPorId($id) {
   try {
        $registro = User::where('id',$id)->first();
        if($registro){
          return response()->json(["data"=> $registro,"success"=>True,"message"=>"Registro encontrado"],200);
        }
        throw new \Exception('Registro de usuario con el '.$id.' no encontrado');
    } catch (\Throwable $th) {
        return response()->json(["success"=>false,"message"=>$th->getMessage(),"data"=>null],404);
    }
  }

}
