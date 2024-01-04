<?php
namespace App\Http\Controllers\Repositorio\Departamento;
use App\Models\Departamento;
class ListarDepartamento {


  public static  function listarTodos() {
    try {
        $registros = Departamento::orderBy('id','desc')->get();
        return response()->json(["data"=> $registros,"succes"=>True,"message"=>"Listado de departamentos"],200);
    } catch (\Throwable $th) {
        return response()->json(["succes"=>false,"message"=>$th->getMessage(),"data"=>null],404);
    }
  }

  public static  function obtenerPorId($id) {
   try {
        $registro = Departamento::where('id',$id)->first();
        if($registro){
          return response()->json(["data"=> $registro,"success"=>True,"message"=>"Registro encontrado"],200);
        }
        throw new \Exception('Registro de departamento con el '.$id.' no encontrado');
    } catch (\Throwable $th) {
        return response()->json(["success"=>false,"message"=>$th->getMessage(),"data"=>null],404);
    }
  }

}
