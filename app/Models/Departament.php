<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
class Departament extends Model
{
    use HasFactory;
    public $table = 'departamento';
    public $timestamp=true;
    protected $guarded=[];
    public function departamentoHasOne(){
        return $this->hasOne(User::class,'id_departamento');
    }
}
