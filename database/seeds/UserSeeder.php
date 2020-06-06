<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Provider\Image as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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

        DB::table('users')->insert([
            'name' => 'Marcelo Rodríguez',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminiaw'),
            'username' => 'mrod',
           'avatar' => Faker::image('public/storage',400,300, null, false) 
        ]);
    }
}
