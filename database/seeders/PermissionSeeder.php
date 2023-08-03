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
        $permissions = Permission::create([
            ['name' => 'Packages'],
            ['name' => 'Add-on Services'],
            ['name' => 'Business Banking'],
            ['name' => 'Accounting Software'],

            // Add more permissions as needed
        ]);
    }
}
