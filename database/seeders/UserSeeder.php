<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'nom'=>'Admin',
               'prenom'=>'Admin',
               'adresse'=>'Dakar',
               'email'=>'admin@gmail.com',
               'telephone'=>'774958234',
               'password'=> bcrypt('12345678'),
               'role'=>'admin',
            ],
            [
               'nom'=>'Client',
               'prenom'=>'Client',
               'adresse'=>'Reubeuss',
               'email'=>'client@gmail.com',
               'telephone'=>'784953482',
               'password'=> bcrypt('12345678'),
               'role'=> 'client',
            ],
            [
               'nom'=>'Chauffeur',
               'prenom'=>'Chauffeur',
               'adresse'=>'Rufisque',
               'email'=>'chauffeur@gmail.com',
               'telephone'=>'784973482',
               'password'=> bcrypt('12345678'),
               'role'=>'chauffeur',
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    
    }
}
