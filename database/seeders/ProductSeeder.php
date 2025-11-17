<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Créer 30 produits
        for ($i = 1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Produit ' . $i,
                'description' => 'Description du produit ' . $i,
                'price' => rand(1, 5000), // Prix aléatoire entre 1€ et 5000€
                'stock' => rand(1, 50), // Stock aléatoire entre 1 et 50
            ]);
        }
    }
}
