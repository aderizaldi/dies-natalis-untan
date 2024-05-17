<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class JenisGaleriEnum extends Enum
{
    const KEGIATAN = "Kegiatan";
    const SELAMAT_DATANG = "Selamat Datang";
}
