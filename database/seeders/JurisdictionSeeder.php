<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JurisdictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jurisdictions')->delete();

        $fecilities = [
            ['name' => 'England & Wales', 'value' => 'EW'],
            ['name' => 'Scotland', 'value' => 'SC'],
            ['name' => 'Northern Ireland', 'value' => 'NI'],
            ['name' => 'Wales', 'value' => 'WA'],
        ];

        DB::table('jurisdictions')->insert($fecilities);
    }
}
