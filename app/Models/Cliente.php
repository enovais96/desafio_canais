<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model {

    use SoftDeletes;
    protected $table = 'cliente';
    protected $primaryKey = 'id_cliente';
    protected $fillable = [
        'id_cliente',
        'nome_cliente',
        'documento_cliente',
        'data_nascimento_cliente',
        'email_cliente',
        'telefone_cliente'
    ];

}
