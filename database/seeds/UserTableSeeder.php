<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Aquí le estamos diciendo que va a crear 12 registros
    	//para el modelo user
        factory(User::class, 12)->create();
    }
}
