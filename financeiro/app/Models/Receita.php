<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model{
    use HasFactory;

    protected $table = 'receitas';
    public $timestamps = true;

    protected $fillable = [
        'descricao',
        'data',
        'valor',
        'observacao',
        'arquivo'
    ];
}
