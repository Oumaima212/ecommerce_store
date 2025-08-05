<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $product= Product::create([
            'sku' => 'SKU001',
            'name' => 'Veste en Jean',
            'short_description' => 'Veste décontractée en jean classique.',
            'long_description' => 'Veste en jean classique pour un look décontracté, confortable et durable. Parfaite pour toutes les saisons.',
            'image' => 'images/VesteJean.webp',
            'price' => 350.00,
            'old_price' => 450.00,
            'stock'=> 20,
            'variations' => [
                'size' => ['S', 'M', 'L'],
                'color' => ['#FF0000', '#0000FF']
            ],
            'collection_id' => 1,
        ]);
        $product->images()->createMany([
        ['image_path' => 'images/VesteJean.webp'],
        ['image_path' => 'images/VesteJean1.jpg'],
        ['image_path' => 'images/VesteJean2.jpg'],
        ['image_path' => 'images/VesteJean3.jpg'],
        ]);

        $product= Product::create([
            'sku' => 'SKU002',
            'name' => 'T-shirt Coton Bio',
            'short_description' => 'T-shirt confortable en coton bio.',
            'long_description' => 'T-shirt confortable en coton bio, parfait pour l’été, doux et respirant.',
            'image' => 'images/T-shirt.jpg',
            'price' => 120.00,
            'old_price' => 200.00,
            'variations' => [
                'size' => ['S', 'M', 'L'],
                'color' => ['#F5F5DC', '#A1A1A1']
            ],
        ]);
        $product->images()->createMany([
        ['image_path' => 'images/T-shirt.jpg'],
        ['image_path' => 'images/T-shirt1.jpg'],
        ['image_path' => 'images/T-shirt2.jpg'],
        ['image_path' => 'images/T-shirt3.jpg'],
        ]);

        $product= Product::create([
            'sku' => 'SKU003',
            'name' => 'Pantalon Chino',
            'short_description' => 'Pantalon élégant et confortable.',
            'long_description' => 'Pantalon élégant et confortable, idéal pour toutes les occasions, fabriqué dans un tissu de qualité.',
            'image' => 'images/patalonChino.jpg',
            'price' => 220.00,
            'old_price' => 400.00,
            'variations' => [
                'size' => ['S', 'M', 'L'],
                'color' => ['#F5F5DC', '#964B00']
            ],
            'collection_id' => 2,
        ]);
            $product->images()->createMany([
        ['image_path' => 'images/patalonChino.jpg'],
        ['image_path' => 'images/patalonChino1.jpg'],
        ['image_path' => 'images/patalonChino2.jpg'],
        ['image_path' => 'images/patalonChino3.jpg'],
        ]);
        $product= Product::create([
            'sku' => 'SKU004',
            'name' => 'Chemise Classique',
            'short_description' => 'Chemise élégante et confortable.',
            'long_description' => 'Chemise élégante et confortable, idéale pour toutes occasions, avec plusieurs couleurs disponibles.',
            'image' => 'images/chemiseHomme.jpg',
            'price' => 280.00,
            'old_price' => 350.00,
            'stock' => 15,
            'variations' => [
                'size' => ['S', 'M', 'L', 'XL'],
                'color' => ['#FFFFFF', '#000000', '#1E90FF']
            ],
            'collection_id' => 1,
        ]);
        $product->images()->createMany([
        ['image_path' => 'images/chemiseHomme.jpg'],
        ['image_path' => 'images/chemiseHomme1.jpg'],
        ['image_path' => 'images/chemiseHomme2.jpg'],
        ['image_path' => 'images/chemiseHomme3.jpg'],
        ]);
    }
}
