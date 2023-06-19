<?php

namespace Database\Seeders;

use App\Models\WebContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = config('defaults.web_content') ?? [];

        foreach ($items as $key => $item) {
            WebContent::create(array_merge(
                ['key' => $key],
                $item
            ));
        }
    }
}
