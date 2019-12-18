<?php

use Illuminate\Database\Seeder;
use App\Rank;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new Rank;
        $u->name = 'Stone';
        $u->level = 1;
        $u->save();

        $u = new Rank;
        $u->name = 'Copper';
        $u->level = 2;
        $u->save();

        $u = new Rank;
        $u->name = 'Silver';
        $u->level = 3;
        $u->save();

        $u = new Rank;
        $u->name = 'Gold';
        $u->level = 4;
        $u->save();

        $u = new Rank;
        $u->name = 'Platinum';
        $u->level = 5;
        $u->save();
    }
}
