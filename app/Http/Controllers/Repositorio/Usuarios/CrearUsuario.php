<?php
namespace App\Http\Controllers\Repositorio\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Repositorio\Usuarios\DTO\UserDTO;
use App\Models\User;
class CrearUsuario {
    

  public static  function registrarUsuario(Request $request) {

    try {
        $validator=RepositorioUsuario::validarUsuarioModoCreate($request);
        if(!($validator->passes())){
            return response()->json(["success"=>false,"message"=>'Los datos ingresados no son correctos',"data"=>$validator->errors()],404);
        }
        $userDTO = new UserDTO($request->all());
        $createOperacion= User::create([
            'departamento_id' => $userDTO->departamento_id,
            'nombre' => $userDTO->nombre,
            'apellido' => $userDTO->apellido,
            'usuario' => $userDTO->usuario,
            'email' => $userDTO->email,
            'password' => bcrypt($userDTO->password),
        ]);
        if(!$createOperacion){
            throw new \Exception("Registro de Operacion no creado");
        }
        return response()->json(["data"=> $createOperacion,"success"=>True,"message"=>"Registro exitoso"],201);
    } catch (\Throwable $th) {
  
        return response()->json(["succes"=>false,"message"=>$th->getMessage(),"data"=>null],404);
    }
  }

}



