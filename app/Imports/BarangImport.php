<?php

namespace App\Imports;

use App\Models\Barang;
use Maatwebsite\Excel\Concerns\ToModel;

class BarangImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            'id_kategori'   => $row[0],
            'id_satuan'     => $row[1],
            'id_barang'     => $row[2],
            'nama_barang'   => $row[3],
            'type_barang' => $row[4],
            'stok'          => $row[5],
        ]);
    }
}
