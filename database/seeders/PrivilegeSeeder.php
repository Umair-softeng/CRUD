<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aryPrivileges = [
            ['moduleID' => 1, 'accessLevelID' => 1, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Create'],
            ['moduleID' => 1, 'accessLevelID' => 2, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Read'],
            ['moduleID' => 1, 'accessLevelID' => 3, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Update'],
            ['moduleID' => 1, 'accessLevelID' => 4, 'privilegeCode' => 'USER', 'privilegeName' => 'Users Delete'],

            ['moduleID' => 2, 'accessLevelID' => 1, 'privilegeCode' => 'ROLES', 'privilegeName' => 'Roles Create'],
            ['moduleID' => 2, 'accessLevelID' => 2, 'privilegeCode' => 'ROLES', 'privilegeName' => 'Roles Read'],
            ['moduleID' => 2, 'accessLevelID' => 3, 'privilegeCode' => 'ROLES', 'privilegeName' => 'Roles Update'],
            ['moduleID' => 2, 'accessLevelID' => 4, 'privilegeCode' => 'ROLES', 'privilegeName' => 'Roles Delete'],

            ['moduleID' => 3, 'accessLevelID' => 1, 'privilegeCode' => 'LEDGERS', 'privilegeName' => 'Ledgers Create'],
            ['moduleID' => 3, 'accessLevelID' => 2, 'privilegeCode' => 'LEDGERS', 'privilegeName' => 'Ledgers Read'],
            ['moduleID' => 3, 'accessLevelID' => 3, 'privilegeCode' => 'LEDGERS', 'privilegeName' => 'Ledgers Update'],
            ['moduleID' => 3, 'accessLevelID' => 4, 'privilegeCode' => 'LEDGERS', 'privilegeName' => 'Ledgers Delete'],

            ['moduleID' => 4, 'accessLevelID' => 1, 'privilegeCode' => 'CUSTOMER', 'privilegeName' => 'Customer Create'],
            ['moduleID' => 4, 'accessLevelID' => 2, 'privilegeCode' => 'CUSTOMER', 'privilegeName' => 'Customer Read'],
            ['moduleID' => 4, 'accessLevelID' => 3, 'privilegeCode' => 'CUSTOMER', 'privilegeName' => 'Customer Update'],
            ['moduleID' => 4, 'accessLevelID' => 4, 'privilegeCode' => 'CUSTOMER', 'privilegeName' => 'Customer Delete'],

            ['moduleID' => 5, 'accessLevelID' => 1, 'privilegeCode' => 'INVOICE', 'privilegeName' => 'Invoice Create'],
            ['moduleID' => 5, 'accessLevelID' => 2, 'privilegeCode' => 'INVOICE', 'privilegeName' => 'Invoice Read'],
            ['moduleID' => 5, 'accessLevelID' => 3, 'privilegeCode' => 'INVOICE', 'privilegeName' => 'Invoice Update'],
            ['moduleID' => 5, 'accessLevelID' => 4, 'privilegeCode' => 'INVOICE', 'privilegeName' => 'Invoice Delete'],

            ['moduleID' => 6, 'accessLevelID' => 1, 'privilegeCode' => 'REVENUE', 'privilegeName' => 'Revenue Create'],
            ['moduleID' => 6, 'accessLevelID' => 2, 'privilegeCode' => 'REVENUE', 'privilegeName' => 'Revenue Read'],
            ['moduleID' => 6, 'accessLevelID' => 3, 'privilegeCode' => 'REVENUE', 'privilegeName' => 'Revenue Update'],
            ['moduleID' => 6, 'accessLevelID' => 4, 'privilegeCode' => 'REVENUE', 'privilegeName' => 'Revenue Delete'],

            ['moduleID' => 7, 'accessLevelID' => 1, 'privilegeCode' => 'ACCOUNTS', 'privilegeName' => 'Accounts Create'],
            ['moduleID' => 7, 'accessLevelID' => 2, 'privilegeCode' => 'ACCOUNTS', 'privilegeName' => 'Accounts Read'],
            ['moduleID' => 7, 'accessLevelID' => 3, 'privilegeCode' => 'ACCOUNTS', 'privilegeName' => 'Accounts Update'],
            ['moduleID' => 7, 'accessLevelID' => 4, 'privilegeCode' => 'ACCOUNTS', 'privilegeName' => 'Accounts Delete'],

            ['moduleID' => 8, 'accessLevelID' => 1, 'privilegeCode' => 'TRANSFER', 'privilegeName' => 'Transfer Create'],
            ['moduleID' => 8, 'accessLevelID' => 2, 'privilegeCode' => 'TRANSFER', 'privilegeName' => 'Transfer Read'],
            ['moduleID' => 8, 'accessLevelID' => 3, 'privilegeCode' => 'TRANSFER', 'privilegeName' => 'Transfer Update'],
            ['moduleID' => 8, 'accessLevelID' => 4, 'privilegeCode' => 'TRANSFER', 'privilegeName' => 'Transfer Delete'],

            ['moduleID' => 9, 'accessLevelID' => 1, 'privilegeCode' => 'EXPENDITURE', 'privilegeName' => 'Expenditure Create'],
            ['moduleID' => 9, 'accessLevelID' => 2, 'privilegeCode' => 'EXPENDITURE', 'privilegeName' => 'Expenditure Read'],
            ['moduleID' => 9, 'accessLevelID' => 3, 'privilegeCode' => 'EXPENDITURE', 'privilegeName' => 'Expenditure Update'],
            ['moduleID' => 9, 'accessLevelID' => 4, 'privilegeCode' => 'EXPENDITURE', 'privilegeName' => 'Expenditure Delete'],

            ['moduleID' => 10, 'accessLevelID' => 1, 'privilegeCode' => 'PAYMENT', 'privilegeName' => 'Payment Create'],
            ['moduleID' => 10, 'accessLevelID' => 2, 'privilegeCode' => 'PAYMENT', 'privilegeName' => 'Payment Read'],
            ['moduleID' => 10, 'accessLevelID' => 3, 'privilegeCode' => 'PAYMENT', 'privilegeName' => 'Payment Update'],
            ['moduleID' => 10, 'accessLevelID' => 4, 'privilegeCode' => 'PAYMENT', 'privilegeName' => 'Payment Delete'],

            ['moduleID' => 11, 'accessLevelID' => 1, 'privilegeCode' => 'STAFF', 'privilegeName' => 'Staff Create'],
            ['moduleID' => 11, 'accessLevelID' => 2, 'privilegeCode' => 'STAFF', 'privilegeName' => 'Staff Read'],
            ['moduleID' => 11, 'accessLevelID' => 3, 'privilegeCode' => 'STAFF', 'privilegeName' => 'Staff Update'],
            ['moduleID' => 11, 'accessLevelID' => 4, 'privilegeCode' => 'STAFF', 'privilegeName' => 'Staff Delete'],

            ['moduleID' => 12, 'accessLevelID' => 1, 'privilegeCode' => 'ATTENDANCE', 'privilegeName' => 'Attendance Create'],
            ['moduleID' => 12, 'accessLevelID' => 2, 'privilegeCode' => 'ATTENDANCE', 'privilegeName' => 'Attendance Read'],
            ['moduleID' => 12, 'accessLevelID' => 3, 'privilegeCode' => 'ATTENDANCE', 'privilegeName' => 'Attendance Update'],
            ['moduleID' => 12, 'accessLevelID' => 4, 'privilegeCode' => 'ATTENDANCE', 'privilegeName' => 'Attendance Delete'],

            ['moduleID' => 13, 'accessLevelID' => 1, 'privilegeCode' => 'LEAVE', 'privilegeName' => 'Leave Create'],
            ['moduleID' => 13, 'accessLevelID' => 2, 'privilegeCode' => 'LEAVE', 'privilegeName' => 'Leave Read'],
            ['moduleID' => 13, 'accessLevelID' => 3, 'privilegeCode' => 'LEAVE', 'privilegeName' => 'Leave Update'],
            ['moduleID' => 13, 'accessLevelID' => 4, 'privilegeCode' => 'LEAVE', 'privilegeName' => 'Leave Delete'],

            ['moduleID' => 14, 'accessLevelID' => 1, 'privilegeCode' => 'TRANSACTION', 'privilegeName' => 'Transaction Create'],
            ['moduleID' => 14, 'accessLevelID' => 2, 'privilegeCode' => 'TRANSACTION', 'privilegeName' => 'Transaction Read'],
            ['moduleID' => 14, 'accessLevelID' => 3, 'privilegeCode' => 'TRANSACTION', 'privilegeName' => 'Transaction Update'],
            ['moduleID' => 14, 'accessLevelID' => 4, 'privilegeCode' => 'TRANSACTION', 'privilegeName' => 'Transaction Delete'],

            ['moduleID' => 15, 'accessLevelID' => 1, 'privilegeCode' => 'STOCk', 'privilegeName' => 'Stock Create'],
            ['moduleID' => 15, 'accessLevelID' => 2, 'privilegeCode' => 'STOCk', 'privilegeName' => 'Stock Read'],
            ['moduleID' => 15, 'accessLevelID' => 3, 'privilegeCode' => 'STOCk', 'privilegeName' => 'Stock Update'],
            ['moduleID' => 15, 'accessLevelID' => 4, 'privilegeCode' => 'STOCk', 'privilegeName' => 'Stock Delete'],

        ];
        foreach ($aryPrivileges as $privilege) {
            DB::table('privileges')->insert(
                [
                    'moduleID' => $privilege['moduleID'],
                    'accessLevelID' => $privilege['accessLevelID'],
                    'privilegeCode' => $privilege['privilegeCode'],
                    'privilegeName' => $privilege['privilegeName'],
                ]
            );
        }
    }
}
