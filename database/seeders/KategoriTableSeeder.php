<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Topi'],
            ['nama_kategori' => 'Kemeja'],
            ['nama_kategori' => 'Celana'],
            ['nama_kategori' => 'Sepatu'],
            ['nama_kategori' => 'Dress'],
            ['nama_kategori' => 'Kaos'],
            ['nama_kategori' => 'Rok'],
        ];

        foreach ($data as $item) {
            Kategori::create($item);
        }
    }
}
