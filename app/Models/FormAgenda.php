<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAgenda extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

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

    public function makeNumber($agenda_id)
    {
        $left = str_pad($agenda_id, 3, '0', STR_PAD_LEFT);
        $number = $this->getNewNumber($agenda_id);
        if ($number) {
            $right = str_pad($number, 4, '0', STR_PAD_LEFT);
            return $left . '-' . $right;
        }
        return $left . '-' . '0001';
    }
}
