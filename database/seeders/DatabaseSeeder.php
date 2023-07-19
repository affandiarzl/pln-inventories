<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\TabelSatuan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Kategori::create([
            'nama_kategori'=>'ATK',
        ]);
        Kategori::create([
            'nama_kategori'=>'Furnitur',
        ]);

        TabelSatuan::create([
            'satuan_brg'=>'Lusin',
        ]);

        Barang::create([
            'id_kategori'=>1,
            'id_satuan'=>1,
            'id_barang'=>'BRG-001',
            'nama_barang'=>'Pulpen',
            'type_barang'=>'Standart-SMA',
            'stok'=>'0',
        ]);
    }

}