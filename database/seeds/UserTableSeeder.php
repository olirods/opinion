<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $u = new User;
        $u->username = 'olirods';
        $u->full_name = 'Sergio Olivares';
        $u->email = '1915180@swansea.ac.uk';
        $u->email_verified_at = now();
        $u->password = 'k&|X+a45*2[';
        $u->rank_id = 5;
        $u->save();

        $u = new User;
        $u->username = 'jeremycorbyn';
        $u->full_name = 'Jeremy Corbyn';
        $u->email = 'jeremycorbyn@labourparty.co.uk';
        $u->email_verified_at = now();
        $u->password = 'jdUe%6rEt$';
        $u->rank_id = 3;
        $u->save();

        $u = new User;
        $u->username = 'soyambrossi';
        $u->full_name = 'Javier Ambrossi';
        $u->email = 'javierambrossi@sumalatina.com';
        $u->email_verified_at = now();
        $u->password = 'ppOksj/h${';
        $u->rank_id = 1;
        $u->save();
        
        factory(App\User::class, 50)->create();
    }
}


