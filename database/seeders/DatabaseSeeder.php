<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ruangan;
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
        $this->call([
            UserSeeder::class,
        ]);

        Kategori::create([
            'nama_kategori'=>'ATK',
        ]);

        Kategori::create([
            'nama_kategori'=>'Elektronik',
        ]);

        Kategori::create([
            'nama_kategori'=>'Furnitur',
        ]);

        TabelSatuan::create([
            'satuan_brg'=>'Lusin',
        ]);

        TabelSatuan::create([
            'satuan_brg'=>'Unit',
        ]);

        Ruangan::create([
            'nama_ruangan'=>'-',
        ]);

        Ruangan::create([
            'nama_ruangan'=>'Fasop',
        ]);

        Ruangan::create([
            'nama_ruangan'=>'KSA',
        ]);

        Barang::create([
            'id_kategori'=>1,
            'id_satuan'=>1,
            'id_barang'=>'BRG-001',
            'nama_barang'=>'Pulpen',
            'type_barang'=>'Standart-SMA',
            'stok'=>'0',
        ]);

        Barang::create([
            'id_kategori'=>2,
            'id_satuan'=>2,
            'id_barang'=>'BRG-002',
            'nama_barang'=>'Monitor',
            'type_barang'=>'Asus-4K',
            'stok'=>'0',
        ]);

        Barang::create([
            'id_kategori'=>3,
            'id_satuan'=>2,
            'id_barang'=>'BRG-003',
            'nama_barang'=>'Meja',
            'type_barang'=>'180x100 cm',
            'stok'=>'0',
        ]);
    }

}