<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model{
    use HasFactory;

    protected $table = 'contas';
    public $timestamps = true;

    protected $fillable = [
        'banco',
        'agencia',
        'conta',
        'tipo'
    ];
}
