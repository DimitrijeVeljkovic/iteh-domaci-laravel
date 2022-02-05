<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Employee;
use \App\Models\Employer;
use \App\Models\Title;
use \App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();
        Employer::truncate();
        Title::truncate();
        User::truncate();

        $user1 = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('admin'),
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
            'role'=>'Admin'
        ]);

        User::factory(5)->create();

        Title::factory(5)->create();

        $employee1 = Employee::create([
            'name'=>'Marko',
            'email'=>'marko@gmail.com',
            'phoneNumber'=>'066111222',
            'age'=>23,
            'titleId'=>1
        ]);

        $employee2 = Employee::create([
            'name'=>'Darko',
            'email'=>'darko@gmail.com',
            'phoneNumber'=>'066222333',
            'age'=>24,
            'titleId'=>3
        ]);

        $employee3 = Employee::create([
            'name'=>'Mirko',
            'email'=>'mirko@gmail.com',
            'phoneNumber'=>'066333444',
            'age'=>44,
            'titleId'=>4
        ]);

        $emloyer1 = Employer::create([
            'name'=>'Dusan',
            'phoneNumber'=>'066555444',
            'employeeId'=>2
        ]);

        $emloyer2 = Employer::create([
            'name'=>'Stefan',
            'phoneNumber'=>'066444555',
            'employeeId'=>1
        ]);
    }
}
