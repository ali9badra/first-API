<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++)
         { 
            $libelle = "Libelle $i";
            Product::create([
                'libelle' => $libelle,
                'slug' => Str::slug($libelle),
            ]);
         }
    }
}
