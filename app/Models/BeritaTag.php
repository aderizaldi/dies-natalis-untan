<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaTag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function berita()
    {
        return $this->belongsTo(Berita::class);
    }
}
