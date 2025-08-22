<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'ArkNights',
                'email' => 'arknights@testmail.com',
                'password' => Hash::make('password001')
            ],
            [
                'username' => 'ZenlessZoneZero',
                'email' => 'zzz@testmail.com',
                'password' => Hash::make('password002')
            ],
            [
                'username' => 'Genshin',
                'email' => 'genshin@testmail.com',
                'password' => Hash::make('password003')
            ],
            [
                'username' => 'Meichou',
                'email' => 'meichou@testmail.com',
                'password' => Hash::make('password004')
            ],
            [
                'username' => 'illusion carnival',
                'email' => 'carnival@testmail.com',
                'password' => Hash::make('password005')
            ],
            [
                'username' => 'Inferno Cafe',
                'email' => 'cafe@testmail.com',
                'password' => Hash::make('password006')
            ],
            [
                'username' => 'Project COLD',
                'email' => 'cold@testmail.com',
                'password' => Hash::make('password007')
            ],
        ]);
    }
}
