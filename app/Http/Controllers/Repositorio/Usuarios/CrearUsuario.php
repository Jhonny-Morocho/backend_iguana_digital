<?php
namespace App\Http\Controllers\Repositorio\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CrearUsuario {


  public static  function registrarUsuario(Request $request) {

    try {
        //validar que se registre un nueva operacion siempre y cuando todos los sept esten comprelos
        //1.Verificar si los anteriores registros estan completos// revisar si existe tabas2 pendientes
        $validator=RepositorioUsuario::validarUsuario($request);
        if(!($validator->passes())){
            return response()->json(["success"=>false,"message"=>'Los datos ingresados no son correctos',"data"=>$validator->errors()],404);
        }
       /*  $usuario=$request->username;
        if(!RepositorioOperacion::puedeCrearRegistro($usuario)){
            throw new \Exception('EL usuario '.$usuario.' no puede crear un nuevo registro, ya que tiene solicitudades en proceso, solo cuando su estado sea rechazado puede crear');
        }
        $parametroPrefijo= ParametroGeneral::where('codigo_parametro',1)->first();
        if(!$parametroPrefijo){
            throw new \Exception('El prefijo no existe');
        }
        $parametro = ParametroGeneral::where('codigo_parametro', '=', 2)->first();
        if(!$parametro){
            throw new \Exception('El parámetrono prefijo 2 no existe');
        }
        DB::beginTransaction();
        $numeric_id=0;
        $numeric_id = intval(str_replace(' ','',$parametro->valor));
        $numeric_id=$numeric_id+1;
        $parametro->valor = strval($numeric_id);
        $parametro->aplicacion_modifica = 'solicitud_operacion';
        $parametro->usuario_modifica = $request->id;
        $parametro->save();

        $code = $parametroPrefijo->valor.'-'. str_pad(strval($numeric_id), 9, '0', STR_PAD_LEFT);
        ####### PASO LA VALIDACION DEL CLIENTE ###
        $now = Carbon::now();
        $nombreApp='Solicitud operacion';
        #estado en proceso
        $estadoProceso=Udc::where('id_ky',1)
                    ->where('id_sy',15)
                    ->where('RT','001')
                    ->first();
        $createOperacion=Operacion::create([
            '01_NumeroSolicitud'=> $code,
            '01_FechaSolicitud'=> $now->toDateTimeString(),
            '01_TipoIdentificacionOP'=> $request->tipoIdentificacionOP,
            '01_TipoPersona'=> $request->tipoPersona,
            '01_NumeroIdentificacionOP' => $request->numeroIdentificacionOP,
            '01_NombreApellidoOP' => $request->nombreApellidoOP,
            '01_DescripcionEmpresaOP' => $request->descripcionEmpresaOP,
            '01_NumeroIdentificacionSolicitante' => $request->numeroIdentificacionSolicitante,
            '01_NombreSolicitante' => $request->nombreSolicitante,
            '01_CorreoElectronicoSolicitante' => $request->correoElectronicoSolicitante,
            '01_TelefonoSolicitante' => $request->telefonoSolicitante,
            '01_URL' => $request->url,
            '01_Estado' => $estadoProceso->RT,
            '01_TipoIdentificacionRepLegal' => $request->tipoIdentificacionRepLegal,
            '01_NumeroIdentificacionRepLegal'=> $request->numeroIdentificacionRepLegal,
            '01_NombreApellidoRepLegal'=> $request->nombreApellidoRepLegal,
            '01_CorreElectronicoRepLegal'=> $request->correElectronicoRepLegal,
            '01_TelefonoRepLegal'=> $request->telefonoRepLegal,
            '01_EntidadesReguladoras'=> $request->entidadesReguladoras,
            'UsuarioCrea' =>$usuario,
            'AppCrea' =>$nombreApp,
            'FHCrea' => $now->toDateTimeString(),
            'UsuarioModifica' => $usuario,
            'AppModifica' => $nombreApp,
            'FHModifica' =>  $now->toDateTimeString(),
        ]); */
   /*      if(!$createOperacion){
            throw new \Exception("Registro de Operacion no creado");
        }
        $crearVitacora=RepositorioOperacion::crearVitacora($request,$createOperacion,$nombreApp,$estadoProceso->RT);
        if(!$crearVitacora){
            throw new \Exception("Registro de vitacora no creado");
        } */
        $createOperacion=null;
        return response()->json(["data"=> $createOperacion,"success"=>True,"message"=>"Registro exitoso"],201);
    } catch (\Throwable $th) {
        // Revertir la transacción en caso de error
        DB::rollback();
        return response()->json(["succes"=>false,"message"=>$th->getMessage(),"data"=>[]],404);
    }
  }


}



