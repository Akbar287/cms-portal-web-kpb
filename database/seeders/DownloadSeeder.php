<?php

namespace Database\Seeders;

use App\Models\Organisasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $organisasi = Organisasi::get()->first();

        for($i=0;$i < 100; $i++) {
            $organisasi->download()->create([
                'kategori_id' => 1,
                'judul' => $faker->name,
                'konten' => $faker->name,
                'nama_file' => '2_Duta-kpb_opd-dinas-kptph_2022-suhar-moko 4_1681556225.png',
                'status' => 'aktif',
            ]);
        }
        
    }
}
