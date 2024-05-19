<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusPesertaEnum extends Enum
{
    const PIMPINAN = "Jajaran Pimpinan Universitas/Fakultas/Lembaga/Unit Kerja";
    const CIVITAS = "Civitas Akademika Untan";
    const KEPALA_DAERAH = "Kepala Daerah/Legislatig/OPD";
    const MITRA = "Mitra Kerja Sama";
    const MAHASISWA = "Mahasiswa";
    const ALUMNI = "Alumni";
    const MASYARAKAT = "Masyarakat";
}
