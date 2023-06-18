<?php

namespace Database\Seeders;

use Domain\User\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'phone' => '99365990099',
            'password' => '12345',
        ]);
    }
}
