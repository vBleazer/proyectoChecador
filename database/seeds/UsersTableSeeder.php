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
        $user = new User;
        $user->name = "Adrian";
        $user->lastname= "Terrique";
        $user->email = "Terrike97@hotmail.com";
        $user->date_of_birth = "1997-09-08";
        $user->phone_number = "6121039705";
        $user->password = bcrypt("Adrian1997");
        $user->role = 1;
        $user->save();
    }
}
