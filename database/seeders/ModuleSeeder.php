<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryModules = [
            ['moduleID' => 1, 'moduleCode' => 'USER', 'moduleName' => 'Users Module'],
            ['moduleID' => 2, 'moduleCode' => 'ROLES','moduleName' => 'Roles Module'],
            ['moduleID' => 3, 'moduleCode' => 'LEDGERS','moduleName' => 'Ledgers Module'],
            ['moduleID' => 4, 'moduleCode' => 'CUSTOMER','moduleName' => 'Customer Module'],
            ['moduleID' => 5, 'moduleCode' => 'INVOICE','moduleName' => 'Invoice Module'],
            ['moduleID' => 6, 'moduleCode' => 'REVENUE','moduleName' => 'Revenue Module'],
            ['moduleID' => 7, 'moduleCode' => 'ACCOUNTS','moduleName' => 'Accounts Module'],
            ['moduleID' => 8, 'moduleCode' => 'TRANSFER','moduleName' => 'Transfer Module'],
            ['moduleID' => 9, 'moduleCode' => 'EXPENDITURE','moduleName' => 'Expenditure Module'],
            ['moduleID' => 10, 'moduleCode' => 'PAYMENT','moduleName' => 'Payment Module'],
            ['moduleID' => 11, 'moduleCode' => 'STAFF','moduleName' => 'Staff Module'],
            ['moduleID' => 12, 'moduleCode' => 'ATTENDANCE','moduleName' => 'Attendance Module'],
            ['moduleID' => 13, 'moduleCode' => 'LEAVE','moduleName' => 'Leave Module'],
            ['moduleID' => 14, 'moduleCode' => 'TRANSACTION','moduleName' => 'Transaction Module'],
            ['moduleID' => 15, 'moduleCode' => 'STOCK','moduleName' => 'Stock Module']
        ];
        foreach ($aryModules as $module) {
            DB::table('modules')->insert(['moduleCode' => $module['moduleCode'],'moduleName' => $module['moduleName'],'moduleID' => $module['moduleID']]);
        }
    }
}
