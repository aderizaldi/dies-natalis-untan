<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'datetime:Y-m-d H:i:s',
    ];

    public function formAgendas()
    {
        return $this->hasMany(FormAgenda::class);
    }

}
