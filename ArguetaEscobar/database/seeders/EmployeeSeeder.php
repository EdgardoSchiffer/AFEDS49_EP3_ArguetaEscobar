<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'employee_name' => 'Nicolas',
                'age' => 26,
                'salary' => 300.20,
                'foto'=> 'upload/image.png',
                'branch_office_id' => 1,
                'user_id' =>1
            ],
            [
                'employee_name' => 'Argueta',
                'age' => 26,
                'salary' => 900.20,
                'foto'=> 'upload/image.png',
                'branch_office_id' => 2,
                'user_id' =>2
            ],
            [
                'employee_name' => 'Bautista',
                'age' => 26,
                'salary' => 800.20,
                'foto'=> 'upload/image.png',
                'branch_office_id' => 3,
                'user_id' =>3
            ],
            [
                'employee_name' => 'Escobar',
                'age' => 26,
                'salary' => 800.20,
                'foto'=> 'upload/image.png',
                'branch_office_id' => 4,
                'user_id' =>4,
            ]

        ];
        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
