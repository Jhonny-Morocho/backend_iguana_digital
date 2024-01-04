<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Departamento extends Model
{
    use HasFactory;
    public $table = 'departamento';
    public $timestamp=true;
    protected $guarded=[];
    public function users()
    {
        return $this->hasOne(User::class, 'departamento_id');
    }
}
