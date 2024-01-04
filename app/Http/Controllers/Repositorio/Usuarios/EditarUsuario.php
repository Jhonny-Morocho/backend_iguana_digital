<?php
namespace App\Http\Controllers\Repositorio\Usuarios;
use Illuminate\Http\Request;
use App\Http\Controllers\Repositorio\Usuarios\DTO\UserDTO;
use App\Models\User;
class EditarUsuario {
    

  public static  function editarUsuario(Request $request,$id) {

    try {
        $usuarioEncontrado = User::find($id);
        if(!$usuarioEncontrado){
            throw new \Exception("El usuario con el id ".$id." no existe");
        }

        $validator=RepositorioUsuario::validarUsuarioModoUpdate($request,$id);
        if(!($validator->passes())){
            return response()->json(["success"=>false,"message"=>'Los datos ingresados no son correctos',"data"=>$validator->errors()],404);
        }
        $userDTO = new UserDTO($request->all());
        $usuarioEncontrado->update((array) $userDTO);
        if(!$usuarioEncontrado->wasChanged()){
            throw new \Exception("No se puede actualizar el usuario");
        }
        return response()->json(["data"=> $usuarioEncontrado,"success"=>True,"message"=>"Registro actualizado"],200);
    } catch (\Throwable $th) {
  
        return response()->json(["succes"=>false,"message"=>$th->getMessage(),"data"=>null],404);
    }
  }

}



