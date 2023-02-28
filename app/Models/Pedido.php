<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';

    protected $fillable = [
        'id_pedido',
        'id_cliente',
        'id_disco',
        'quantidade_disco'
    ];

}
