<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorasCumpridas extends Model
{
    protected $table = 'horas_cumpridas';

    protected $fillable = [
        'aluno_id',
        'documento_id',
        'horas',
        'status',
        'comentario',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class, 'documento_id');
    }
}
