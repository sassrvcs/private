<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FecilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->delete();

        $fecilities = [
            ['name'          => 'Email Copy Of Certificate Of Incorporation'],
            ['name'          => 'Email Copy Of Memorandum & Articles Of Association'],
            ['name'          => 'Email Copy Of Share Certificate(S)'],
            ['name'          => 'Compnay Registration'],
            ['name'          => 'Free Online Company Manager To Maintain Your Companies'],
            ['name'          => 'Companies House Filing Fee Paid By Us'],
            ['name'          => 'Free High Street Business Bank Account'],
            ['name'          => 'Registered Office Address'],
            ['name'          => 'Free .Com Or .Co.Uk Domain Name']
        ];

        DB::table('facilities')->insert($fecilities);

        // Or || Change model name to your model name
        // foreach ($fecilities as $key => $value) {
        //     ModelName::create($value);
        // }
    }
}
