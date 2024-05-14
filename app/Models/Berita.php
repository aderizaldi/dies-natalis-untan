<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal' => 'datetime:Y-m-d H:i:s',
    ];

    public function beritaTags()
    {
        return $this->hasMany(BeritaTag::class);
    }
}
