<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryModel = app(Brand::class);

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'Ford']
        );

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'Chevrolet']
        );

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'VolksWagen']
        );

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'Bugatti']
        );  

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'lamborghini']   
        );
    }
}
