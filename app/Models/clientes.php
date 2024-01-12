<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{

    protected $primaryKey = 'cliente_id';

    protected $fillable = ['cliente_nombre', 'cliente_direccion', 'cliente_tel', 'cliente_valor'];

    public function pagos(){
      return  $this->hasMany(pagoscliente::class, 'cliente_id', 'cliente_id');
        
    }

    use HasFactory;
}
