<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Por convención se utiliza un plural inicio para las convenciones
    	//Pero como me equivoqué, está en singular xD
        $this->call(UserTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
    }
}
