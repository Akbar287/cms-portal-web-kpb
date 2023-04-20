<?php

namespace Database\Seeders;

use App\Models\Organisasi;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class GalleryFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $organisasi = Organisasi::get()->first();

        for($i=0;$i < 100; $i++) {
            $organisasi->gallery_foto()->create([
                'nama_gallery_foto' => $faker->name,
                'gambar' => '6_1681571765.jpg',
                'url' => 'asd',
                'status' => 'aktif',
            ]);
        }
    }
}
