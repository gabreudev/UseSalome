<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    protected $fillable =[
            'nome',
            'descricao',
            'preco',
            'slug',
            'image',
            'quantidade'
    ];
    function categoria(){
            return $this->belongsTo(User::class,'id_categoria');
    
    }
}
