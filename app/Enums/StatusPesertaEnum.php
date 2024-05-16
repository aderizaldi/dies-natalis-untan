<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusPesertaEnum extends Enum
{
    const MAHASISWA = "Mahasiswa/Pelajar";
    const CIVITAS = "Civitas Akademika";
    const UMUM = "Umum";
    const ALUMNI = "Alumni";
}
