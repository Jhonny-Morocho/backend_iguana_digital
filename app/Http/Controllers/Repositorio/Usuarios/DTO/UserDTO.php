<?php

namespace App\Http\Controllers\Repositorio\Usuarios\DTO;
class UserDTO
{
    public $departamento_id;
    public $nombre;
    public $apellido;
    public $usuario;
    public $email;
    public $password;

    public function __construct($data)
    {
        $this->departamento_id = $data['departamento_id'] ?? null;
        $this->nombre = $data['nombre'] ?? null;
        $this->apellido = $data['apellido'] ?? null;
        $this->usuario = $data['usuario'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->password = $data['password'] ?? null;
    }
}