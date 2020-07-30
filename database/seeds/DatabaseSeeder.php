<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserSeeder::class);
        factory(App\Cliente::class, 3)->create();
        factory(App\Turno::class, 5)->create(['cliente_id'=>2]);
        factory(App\Turno::class, 15)->create(['cliente_id'=>1]);
        factory(App\Turno::class, 5)->create(['cliente_id'=>3]);
    }
}
