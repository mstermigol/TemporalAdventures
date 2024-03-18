<?php

/*
    Author: David Fonseca
*/

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert([
            [
                'id'           => 1,
                'name'         => 'Fonsek',
                'email'        => 'dfonsecalara27@gmail.com',
                'password'     => Hash::make('123456789'),
                'is_staff'     => 1,
                'phone_number' => '3182498681',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => 2,
                'name'         => 'Miguel',
                'email'        => 'migue@gmail.com',
                'password'     => Hash::make('123456789'),
                'is_staff'     => 1,
                'phone_number' => '3104387682',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => 3,
                'name'         => 'Sergio',
                'email'        => 'sergio@gmail.com',
                'password'     => Hash::make('123456789'),
                'is_staff'     => 1,
                'phone_number' => '3194809538',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => 4,
                'name'         => 'Kristen',
                'email'        => 'kristen@yahoo.com',
                'password'     => Hash::make('123456789'),
                'is_staff'     => 0,
                'phone_number' => '2370776578',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => 5,
                'name'         => 'Rachel',
                'email'        => 'rachel@yahoo.com',
                'password'     => Hash::make('123456789'),
                'is_staff'     => 0,
                'phone_number' => '6580145228',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'id'           => 6,
                'name'         => 'Richard',
                'email'        => 'richard@yahoo.com',
                'password'     => Hash::make('123456789'),
                'is_staff'     => 0,
                'phone_number' => '782668-3228',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}
