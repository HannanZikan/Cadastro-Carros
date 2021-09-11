<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryModel = app(Category::class);

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'hat']
        );

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'sedan']
        );

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'picape']
        );

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'suv']
        );  

        $categoryModel->firstOrCreate(
            // key(nome da coluna) => valor
            ['name' => 'esportivo']
        );
    }
}
