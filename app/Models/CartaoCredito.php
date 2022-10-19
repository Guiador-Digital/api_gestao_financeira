<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CartaoCredito extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cartoes_credito';

    protected $fillable = [
        'nome',
        'bandeira',
        'limite',
    ];
}
