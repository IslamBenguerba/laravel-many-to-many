<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categoies = ['Vue-App-page','SimplePage','React-App-Page'];

        foreach($categoies as $categoria){
            Categorie::create([
                'categoria' => $categoria
            ]);
        }
    }
}
