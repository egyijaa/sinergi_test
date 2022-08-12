<?php

namespace Database\Seeders;

use App\Models\m_customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MCustomerSeeder extends Seeder
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
            $barang = new m_customer;
            $barang->kode = $faker->regexify('[A-Z]{1}').$faker->numberBetween(0,9).$faker->regexify('[A-Z]{1}').$faker->numberBetween(0,9);
            $barang->nama = 'Egy Ihza Madhani';
            $barang->telp = '0895606068325';
            $barang->save();

            $barang = new m_customer;
            $barang->kode = $faker->regexify('[A-Z]{1}').$faker->numberBetween(0,9).$faker->regexify('[A-Z]{1}').$faker->numberBetween(0,9);
            $barang->nama = 'Mitra Sinergi Teknoindo';
            $barang->telp = '081323139138';
            $barang->save();
    }
}
