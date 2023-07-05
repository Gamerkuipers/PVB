<?php

namespace Database\Seeders;

use App\Models\Advertisement;
use App\Models\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdvertisementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ads = Advertisement::factory(rand(25, 30))->create();

        // @dump($ads->first()->files()->save());
        $ads->each(fn($ad, $key) => File::create([
            'thumbnail' => true,
            'advertisement_id' => $ad->id,
            'location' => '../images/img.png',
        ]));
    }
}
