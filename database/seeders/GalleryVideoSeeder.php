<?php

namespace Database\Seeders;

use App\Models\Organisasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class GalleryVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        $organisasi = Organisasi::get()->first();

        for($i=0;$i < 100; $i++) {
            $organisasi->gallery_video()->create([
                'nama_gallery_video' => $faker->name,
                'gambar' => 'video_1681572657.jpg',
                'url' => 'o-hzTmeCqN0',
                'status' => 'aktif',
            ]);
        }
    }
}
