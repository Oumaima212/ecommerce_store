<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collection;

class CollectionSeeder extends Seeder
{
    public function run()
    {
        Collection::create([
            'name' => 'Jackets',
            'slug' => 'jackets',
            'description' => 'Collection de vestes élégantes et confortables.',
            'image' => 'images/jacket.jpeg',
        ]);

        Collection::create([
            'name' => 'Pantalons',
            'slug' => 'pantalons',
            'description' => 'Pantalons robustes, parfaits pour toutes les occasions.',
            'image' => 'images/patalon.avif',
        ]);

        Collection::create([
            'name' => 'Jeans',
            'slug' => 'jeans',
            'description' => 'Jeans tendance pour un style décontracté et moderne.',
            'image' => 'images/jeans.jpg',
        ]);
    }
}
