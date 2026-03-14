<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the default admin/login user.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'caccam@school.edu'],
            [
                'name'     => 'Caccam',
                'password' => Hash::make('caccam123'),
            ]
        );
    }
}
