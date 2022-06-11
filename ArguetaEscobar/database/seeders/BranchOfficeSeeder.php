<?php

namespace Database\Seeders;

use App\Models\BranchOffice;
use Illuminate\Database\Seeder;

class BranchOfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branchOficces = [
            [
                'name_branch_office' => 'Ventas',
                'address_branch_office' => 'san salvador',
            ],[
                'name_branch_office' => 'Administracion',
                'address_branch_office' => 'san salvador',
            ],[
                'name_branch_office' => 'Desarrollo',
                'address_branch_office' => 'san salvador',
            ],[
                'name_branch_office' => 'RRHH',
                'address_branch_office' => 'san salvador',
            ]


        ];
        foreach ($branchOficces as $branchOficce) {
            BranchOffice::create($branchOficce);
        }
    }
}
