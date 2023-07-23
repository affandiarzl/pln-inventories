<?php

namespace App\Exports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class BarangExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Barang::select('id_barang', 'nama_barang', 'type_barang', 'stok')->get();
    }

    public function headings(): array
    {
        return [
            'ID Barang',
            'Nama Barang',
            'Tipe Barang',
            'Total Stok',
        ];
    }

    public function columnWidths(): array
    {
        // Mengatur lebar kolom (optional)
        return [
            'A' => 15, // Kolom 1
            'B' => 15, // Kolom 2
            'C' => 15, // Kolom 3
            'D' => 15, // Kolom 4
        ];
    }

    public function styles( Worksheet $sheet)
    {
        return [
            1=>['font'=>['bold'=>true]]
        ];
    }
}
