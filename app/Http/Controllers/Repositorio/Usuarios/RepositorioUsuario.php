<?php
namespace App\Http\Controllers\Repositorio\Usuarios;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
class RepositorioUsuario {

    public static function validarUsuarioModoCreate(Request $data) {
        $validator = Validator::make($data->all(), [
            'departamento_id' => 'required|exists:departamento,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'usuario' => 'required|string|unique:users,usuario',
            'email' => 'required|email|unique:users,email',
            #'password' => 'required|string|min:6',
        ]);

        $validator->setAttributeNames([
            'departamento_id.required' => 'El campo de departamento es obligatorio.',
            'departamento_id.exists' => 'El departamento seleccionado no es válido.',
            'nombre.required' => 'El campo de nombre es obligatorio.',
            'apellido.required' => 'El campo de apellido es obligatorio.',
            'usuario.required' => 'El campo de usuario es obligatorio.',
            'usuario.unique' => 'El usuario ya está en uso.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            #'password.required' => 'El campo de contraseña es obligatorio.',
            #'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);
        $validator->setCustomMessages([
            'departamento_id.required' => 'El campo de departamento es obligatorio.',
            'departamento_id.exists' => 'El departamento seleccionado no es válido.',
            'nombre.required' => 'El campo de nombre es obligatorio.',
            'apellido.required' => 'El campo de apellido es obligatorio.',
            'usuario.required' => 'El campo de usuario es obligatorio.',
            'usuario.unique' => 'El usuario ya está en uso.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            #'password.required' => 'El campo de contraseña es obligatorio.',
            #'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);
        return $validator;
    }
 
    public static function validarUsuarioModoUpdate(Request $data,int $userId) {
        $validator = Validator::make($data->all(), [
            'departamento_id' => 'required|exists:departamento,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'usuario' => 'required|string|unique:users,usuario,' . $userId,
            'email' => 'required|email|unique:users,email,' . $userId
            #'password' => 'required|string|min:6',
        ]);

        $validator->setAttributeNames([
            'departamento_id.required' => 'El campo de departamento es obligatorio.',
            'departamento_id.exists' => 'El departamento seleccionado no es válido.',
            'nombre.required' => 'El campo de nombre es obligatorio.',
            'apellido.required' => 'El campo de apellido es obligatorio.',
            'usuario.required' => 'El campo de usuario es obligatorio.',
            'usuario.unique' => 'El usuario ya está en uso.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            #'password.required' => 'El campo de contraseña es obligatorio.',
            #'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);
        $validator->setCustomMessages([
            'departamento_id.required' => 'El campo de departamento es obligatorio.',
            'departamento_id.exists' => 'El departamento seleccionado no es válido.',
            'nombre.required' => 'El campo de nombre es obligatorio.',
            'apellido.required' => 'El campo de apellido es obligatorio.',
            'usuario.required' => 'El campo de usuario es obligatorio.',
            'usuario.unique' => 'El usuario ya está en uso.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            #'password.required' => 'El campo de contraseña es obligatorio.',
            #'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        ]);
        return $validator;
    }
}
