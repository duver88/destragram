<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model

{
    protected $fillable = [
        'user_id',
        'post_id',
        'comentario'
    ];

    public function nombreDelComentario(){
        return  $this->belongsTo(User::class, 'user_id');
    }
}
