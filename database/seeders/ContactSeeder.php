<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    protected $items = [
        '' => 'Groningen 9421 HG',
        'Telefoon' => '06123456789',
        'Email' => 'support@npauto.nl',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        foreach ($this->items as $key => $value) {
            Contact::create([
                'name' => $key,
                'body' => $value
            ]);
        }
    }
}
