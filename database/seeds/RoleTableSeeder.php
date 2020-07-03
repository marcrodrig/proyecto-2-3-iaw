<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Ability;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modificacionPerfil = Ability::firstOrCreate(['nombre'=>'modificacionPerfil']);
        $altaCliente = Ability::firstOrCreate(['nombre'=>'altaCliente']);
        $bajaCliente = Ability::firstOrCreate(['nombre'=>'bajaCliente']);
        $modificacionCliente = Ability::firstOrCreate(['nombre'=>'modificacionCliente']);
        $altaTurno = Ability::firstOrCreate(['nombre'=>'altaTurno']);
        $bajaTurno = Ability::firstOrCreate(['nombre'=>'bajaTurno']);
        $modificacionTurno = Ability::firstOrCreate(['nombre'=>'modificacionTurno']);

        $administrador = Role::firstOrCreate(['nombre'=>'admin']);
        $administrador->allowTo($modificacionPerfil); 
        $administrador->allowTo($altaCliente);
        $administrador->allowTo($bajaCliente);
        $administrador->allowTo($modificacionCliente);  
        $administrador->allowTo($altaTurno);
        $administrador->allowTo($bajaTurno);
        $administrador->allowTo($modificacionTurno);

        $editor = Role::firstOrCreate(['nombre'=>'editor']);
        $editor->allowTo($modificacionPerfil); 
        $editor->allowTo($modificacionTurno);
    }
}
