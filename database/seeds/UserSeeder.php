<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\User;
use App\Role;
use App\Ability;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $filepath = storage_path('/app/public');

        if(!File::exists($filepath)){
            File::makeDirectory($filepath);
        }

        $img = Image::make('public/images/foto1.png');
        $img->save($filepath . '/foto1.png');

        DB::table('users')->insert([
            'name' => 'Marcelo Rodríguez',
            'email' => 'marcelo.prf9@gmail.com',
            'password' => Hash::make('adminiaw'),
            'username' => 'mrod',
            'avatar' => 'foto1.png'
        ]);

        $user = User::find(1);
        $administrador = Role::firstOrCreate(['nombre'=>'admin']);
        $agregarTurno = Ability::firstOrCreate(['nombre'=>'add_turno']);
        $editarTurno = Ability::firstOrCreate(['nombre'=>'edit_turno']);
        $administrador->allowTo($agregarTurno);
        $administrador->allowTo($editarTurno);
        $user->assignRole($administrador);

        DB::table('users')->insert([
            'name' => 'Patricio Rodríguez',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('editoriaw'),
            'username' => 'prod',
            'avatar' => 'foto1.png'
        ]);
    }
}
