<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagoscliente extends Model
{

    protected $primaryKey = 'pagos_id';

    protected $fillable = ['pago_fecha'];

    public function clientes(){
        
        return $this->belongsTo(clientes::class, 'cliente_id', 'cliente_id');

    }
    
    use HasFactory;
}
