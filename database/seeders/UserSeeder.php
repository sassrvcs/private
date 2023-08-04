<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User([
            'title'             => 'Mr',
            'forename'          => 'Super',
            'surname'           => 'Admin',
            'email'             => 'superadmin@yopmail.com',
            'phone_no'          => fake()->phoneNumber(),
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);

        $admin->save();
        $admin->assignRole('superadmin');
        $permissionNames = [
            'Packages',
            'Add-on Services',
            'Business Banking',
            'Accounting Software',
            'Customer',
            'CMS'
            // Add more permissions as needed
        ];
        $admin->syncPermissions($permissionNames);
    }
}
