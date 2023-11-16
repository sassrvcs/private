<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SicDetails;

class TwoColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code_id' => '56302', 'code_name' => 'Public houses and bars'],
            ['code_id' => '56301', 'code_name' => 'Licenced clubs'],
            ['code_id' => '563290', 'code_name' => 'Other food services'],
            ['code_id' => '56210', 'code_name' => 'Event catering activities'],
            ['code_id' => '56103', 'code_name' => 'Take-away food shops and mobile food stands'],
            ['code_id' => '56102', 'code_name' => 'Unlicenced restaurants and cafes'],
            ['code_id' => '56101', 'code_name' => 'Licenced restaurants'],
            ['code_id' => '55900', 'code_name' => 'Other accommodation'],
            ['code_id' => '55300', 'code_name' => 'Recreational vehicle parks, trailer parks and camping grounds'],
            ['code_id' => '55209', 'code_name' => 'Other holiday and other collective accommodation'],
            ['code_id' => '55202', 'code_name' => 'Youth hostels'],
            ['code_id' => '55201', 'code_name' => 'Holiday centres and villages'],
            ['code_id' => '55100', 'code_name' => 'Hotels and similar accommodation'],
            ['code_id' => '99999', 'code_name' => 'Dormant Company'],
            ['code_id' => '99000', 'code_name' => 'Activities of extraterritorial organisations and bodies'],
            ['code_id' => '98200', 'code_name' => 'Undifferentiated service-producing activities of private households for own use'],
            ['code_id' => '98100', 'code_name' => 'Undifferentiated goods-producing activities of private households for own use'],
            ['code_id' => '98000', 'code_name' => 'Residents property management'],
            ['code_id' => '97000', 'code_name' => 'Activities of households as employers of domestic personnel'],
            ['code_id' => '82990', 'code_name' => 'Other business support service activities n.e.c.'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],
            ['code_id' => '56302', 'code_name' => 'Value 2'],

            // Add more rows as needed...
        ];

        SicDetails::insert($data);
    }
}
