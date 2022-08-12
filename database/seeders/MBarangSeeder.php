<?php

namespace Database\Seeders;

use App\Models\m_barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create('id_ID');
        $letter='A';
        for ($i=1; $i <=5 ; $i++) { 
            # code...
            $barang = new m_barang;
            $barang->kode = $faker->regexify('[A-Z]{1}').$faker->numberBetween(0,9).$faker->numberBetween(0,9).$faker->numberBetween(0,9);
            $barang->nama = 'Barang '.$letter;
            $barang->harga = $faker->numberBetween(50000,900000);
            $barang->kuantiti = $faker->numberBetween(0,100);
            $barang->save();
            $letter++;
        }
    }
}
