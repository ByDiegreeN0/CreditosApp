<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{

    protected $primaryKey = 'cliente_id';

    public function pagos(){
        // tengo que hacer la relacion 1 a * con el modelo de "pagos"
        
    }

    use HasFactory;
}
