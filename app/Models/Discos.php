<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discos extends Model {

    protected $table = 'discos';
    protected $primaryKey = 'id_disco';
    protected $fillable = [
        'id_disco',
        'nome_disco',
        'artista_disco',
        'ano_lancamento_disco',
        'estilo_disco',
        'quantidade_disco'
    ];

}
