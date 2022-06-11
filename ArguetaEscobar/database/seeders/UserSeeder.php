<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('admin1'),
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('admin2'),
            ],
            [
                'name' => 'Admin 3',
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('admin3'),
            ],
        ];
        $employees = [
            [
                'name' => 'Employee 1',
                'email' => 'employee1@gmail.com',
                'password' => bcrypt('employee1'),
            ],
            [
                'name' => 'Employee 2',
                'email' => 'employee2@gmail.com',
                'password' => bcrypt('employee2'),
            ],
        ];
        foreach ($admins as $user) {
            $user = \App\Models\User::create($user);
            $user->assignRole('Administrator');
        }
        foreach ($employees as $e) {
           $e = \App\Models\User::create($e);
            $e->assignRole('Employee');
        }
    }
}
