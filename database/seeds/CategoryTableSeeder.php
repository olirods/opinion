<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Category;
        $c->name = "European Politics";
        $c->save();

        $c = new Category;
        $c->name = "Big Brother UK";
        $c->save();

        $c = new Category;
        $c->name = "Spanish Football";

        $c = new Category;
        $c->name = "Apple Inc.";
        $c->save();

        $c = new Category;
        $c->name = "Feminism";
        $c->save();

        factory(App\Category::class, 10)->create();
    }
}
