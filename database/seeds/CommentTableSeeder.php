<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment;
        $c->content = "Those parties are not far right. They fight for the people rights.";
        $c->number_of_agrees = 5;
        $c->number_of_disagrees = 2;
        $c->user_id = 5;
        $c->post_id = 1;
        $c->save();

        $c = new Comment;
        $c->content = "Fascism is reviving. Third World War is coming.";
        $c->number_of_agrees = 3;
        $c->number_of_disagrees = 3;
        $c->user_id = 4;
        $c->post_id = 1;
        $c->save();

        $c = new Comment;
        $c->content = "And what happens with Airpods? Didn't they relaunch the wearables market?";
        $c->number_of_agrees = 1;
        $c->number_of_disagrees = 9;
        $c->user_id = 1;
        $c->post_id = 2;
        $c->save();

        factory(App\Comment::class, 150)->create();
    }
}
