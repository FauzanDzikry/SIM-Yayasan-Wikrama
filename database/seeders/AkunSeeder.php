<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
              'npp'=>'admin',
              'name'=>'admin',
              'level'=>'admin',
              'status' => 'admin',
              'jabatan' => 'admin',
              'password'=> bcrypt('123456'),
            ],
            [
               'npp'=>'1',
               'name'=>'farhan',
               'level'=>'user',
               'status' => 'magang',
               'jabatan' => 'Guru',
               'password'=> bcrypt('123456'),
            ],
            [
               'npp'=>'2',
               'name'=>'farhan1',
               'level'=>'user',
               'status' => 'tetap',
              'jabatan' => 'Pembimbing',
               'password'=> bcrypt('123456'),
            ],
            [
               'npp'=>'3',
               'name'=>'Ilham Farhan',
               'level'=>'user',
               'status' => 'tetap',
              'jabatan' => 'Laboran',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
