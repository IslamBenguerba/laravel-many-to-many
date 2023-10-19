<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $lagnuage = ['PHP', 'HTML','Javascript','Python','Vue'];
        // Technology::insert($lagnuage);
        for ($i = 0; $i < count($lagnuage); $i++) {
            Technology::create([
                'tecnologia'=>$lagnuage[$i]
            ]);
    }
}
}
