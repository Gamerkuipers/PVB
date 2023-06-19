<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = config('defaults.contact') ?? [];

        foreach ($items as $key => $value) {
            Contact::create([
                'name' => $key,
                'body' => $value
            ]);
        }
    }
}
