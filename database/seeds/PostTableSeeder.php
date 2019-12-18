<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post;
        $p->title = "Why the far right is growing in Europe.";
        $p->content = "The social base of the militia movement is white, rural and male. It has grown fastest in the past two years in regions and areas, like Idaho and Montana, where an economy of logging, mining and ranching is giving way to low-wage tourism and recreation that caters to out-of-state professionals and elites, and in hard-pressed conservative farm communities in states like Michigan.\n";
        $p->number_of_agrees = 15;
        $p->number_of_disagrees = 4;
        $p->user_id = 1;
        $p->save();
        $p->categories()->attach(1);

        $p = new Post;
        $p->title = "Apple is no longer innovative.";
        $p->content = "Apple has built its success upon a steady consumer appetite for buying every iteration of the company’s latest and greatest products. However, with iPhone sales falling...";
        $p->number_of_agrees = 20;
        $p->number_of_disagrees = 10;
        $p->user_id = 5;
        $p->save();
        $p->categories()->attach(3);

        factory(App\Post::class, 50)->create();

        $categories = App\Category::all();

        App\Post::all()->each(function ($post) use ($categories) { 
            $post->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray()); 
        });
    }
}
