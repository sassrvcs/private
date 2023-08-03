<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create permissions
         // Define permission names
         $permissionNames = [
            'Packages',
            'Add-on Services',
            'Business Banking',
            'Accounting Software',
            // Add more permissions as needed
        ];

        // Create permissions
        foreach ($permissionNames as $name) {
            Permission::create(['name' => $name]);
        }
    }
}
