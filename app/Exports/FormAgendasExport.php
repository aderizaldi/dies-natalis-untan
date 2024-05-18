<?php

namespace App\Exports;

use App\Models\FormAgenda;
use Maatwebsite\Excel\Concerns\FromQuery;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class FormAgendasExport implements FromQuery, WithHeadings, ShouldAutoSize, WithMapping, WithColumnFormatting
{
    use Exportable;

    protected $agenda_id;

    public function __construct($agenda_id)
    {
        $this->agenda_id = $agenda_id;
    }

    public function query()
    {
        return FormAgenda::query()->where('agenda_id', $this->agenda_id);
    }

    public function map($formAgenda): array
    {
        return [
            $formAgenda->nomor_peserta,
            $formAgenda->status_peserta,
            $formAgenda->nama,
            $formAgenda->jenis_kelamin,
            $formAgenda->umur,
            $formAgenda->no_hp,
            $formAgenda->alamat,
            $formAgenda->saran,
            Date::dateTimeToExcel($formAgenda->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            'Nomor Peserta',
            'Status Peserta',
            'Nama',
            'Jenis Kelamin',
            'Umur',
            'No HP/Whatsapp',
            'Alamat',
            'Saran',
            'Waktu Presensi',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }
}
