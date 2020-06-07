<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\User;

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

        $filepath = public_path('storage');

        if(!File::exists($filepath)){
            File::makeDirectory($filepath);
        }

        $img = Image::make('public/images/foto1.png');
        $img->save($filepath . '/foto1.png');

        DB::table('users')->insert([
            'name' => 'Marcelo Rodríguez',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminiaw'),
            'username' => 'mrod',
            'avatar' => 'foto1.png'
        ]);
    }
}
