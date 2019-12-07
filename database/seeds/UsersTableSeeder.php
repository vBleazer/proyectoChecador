<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->nombre = "Adrian";
        $user->apellidos = "Terrique";
        $user->matricula = "2016082600";
        $user->fechaNacimiento = "1997-09-08";
        $user->telefono = "612039705";
        $user->email = "Terrike97@hotmail.com";
        $user->password = bcrypt("adrian1997");
        $user->role = 1; 
        $user->save();

        $user = new User();
        $user->nombre = "Erick Sebastian";
        $user->apellidos = "Dias Huerta";
        $user->matricula = "2016082601";
        $user->fechaNacimiento = "1998-06-07";
        $user->telefono = "6121039706";
        $user->email = "ErickDiaz@gmail.com";
        $user->password = bcrypt("12345678");
        $user->role = 2; 
        $user->save();

        $user = new User();
        $user->nombre = "Ana Margarita";
        $user->apellidos = "Rocha Mendoza";
        $user->matricula = "2016082602";
        $user->fechaNacimiento = "1998-03-16";
        $user->telefono = "6121484496";
        $user->email = "AnaM@gmail.com";
        $user->password = bcrypt("12345678");
        $user->role = 2;
        $user->save();
    }
}
