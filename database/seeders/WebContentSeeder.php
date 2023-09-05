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
        WebContent::updateorcreate([
            'key' => 'about',
        ], [
            'head' => 'Over ons',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In et diam ac lacus sollicitudin iaculis. Curabitur dapibus dignissim nibh et viverra. Nulla augue justo, elementum sed sem non, posuere varius ante. Sed eget erat a risus hendrerit suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ullamcorper sit amet elit nec volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec justo tortor, mollis sed blandit vel, aliquet vel metus. Fusce in faucibus nisl. Integer dignissim eget leo ut tincidunt. Mauris sit amet enim a quam faucibus tempor a vel eros.'
        ]);
    }
}
