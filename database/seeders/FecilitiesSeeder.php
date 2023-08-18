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
            ['name'          => 'Free Online Company Manager To Maintain Your Companies'],
            ['name'          => 'Registered Office Address'],
            ['name'          => 'Free .Com Or .Co.Uk Domain Name'],
            ['name'          => 'Printed Certificate Of Incorporation'],
            ['name'          => 'Printed & Bound Memorandum & Articles Of Association'],
            ['name'          => 'Printed Share Certificate(S)'],
            ['name'          => '1 Month Free Call Answering + Business Telephone Number'],
            ['name'          => 'VAT Registration'],
            ['name'          => 'Filing Of The First Confirmation Statement'],
            ['name'          => 'GDPR Compliance'],
            ['name'          => 'PAYE Registration'],
            ['name'          => 'Certificate Of Good Standing'],
            ['name'          => 'Corporate Hijack Protection'],
            ['name'          => 'ICO Registration'],
            ['name'          => 'Logo Design'],
            ['name'          => 'Website Design'],
        ];

        DB::table('facilities')->insert($fecilities);

        // Or || Change model name to your model name
        // foreach ($fecilities as $key => $value) {
        //     ModelName::create($value);
        // }
    }
}
