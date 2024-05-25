<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAgenda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function agenda()
    {
        return $this->belongsTo(Agenda::class);
    }

    public function getNewNumber($agenda_id)
    {
        $last_number = $this->where('agenda_id', $agenda_id)->orderByDesc('created_at')->first();
        if ($last_number) {
            $number = explode('-', $last_number->nomor_peserta);
            $number = end($number);
            $number = (int) $number + 1;
            return $number;
        }
        return null;
    }

    public function makeNumber($agenda_id, $counter = 0)
    {
        $left = str_pad($agenda_id, 3, '0', STR_PAD_LEFT);
        $number = $this->getNewNumber($agenda_id);
        $right = '0001';
        if ($number) {
            $right = str_pad($number + $counter, 4, '0', STR_PAD_LEFT);
        }
        $is_exist = $this->where('nomor_peserta', $left . '-' . $right)->first();
        if ($is_exist) {
            return $this->makeNumber($agenda_id, $counter + 1);
        }

        return $left . '-' . $right;
    }
}
