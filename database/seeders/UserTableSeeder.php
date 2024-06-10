<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Vtiful\Kernel\Format;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => 'Albin',
            'email' => 'albinmpobo@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'status'=>'1'
            ],

            [
            'name' => 'Yuang',
            'email' => 'yuangboy8@gmail.com',
            'role' => 'user',
            'password' => Hash::make('password'),
            'status'=>'1'
            ],
            [
                'name' => 'Victoire',
                'email' => 'victoireongatse@gmail.com',
                'role' => 'praticien',
                'password' => Hash::make('password'),
                'status'=>'1',
                ]
        ]);
    }

}