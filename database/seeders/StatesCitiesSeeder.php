<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = [
            ['name' => 'Andhra Pradesh'],
            ['name' => 'Arunachal Pradesh'],
            ['name' => 'Assam'],
            ['name' => 'Bihar'],
            ['name' => 'Chhattisgarh'],
            ['name' => 'Goa'],
            ['name' => 'Gujarat'],
            ['name' => 'Haryana'],
            ['name' => 'Himachal Pradesh'],
            ['name' => 'Jharkhand'],
            ['name' => 'Karnataka'],
            ['name' => 'Kerala'],
            ['name' => 'Madhya Pradesh'],
            ['name' => 'Maharashtra'],
            ['name' => 'Manipur'],
            ['name' => 'Meghalaya'],
            ['name' => 'Mizoram'],
            ['name' => 'Nagaland'],
            ['name' => 'Odisha'],
            ['name' => 'Punjab'],
            ['name' => 'Rajasthan'],
            ['name' => 'Sikkim'],
            ['name' => 'Tamil Nadu'],
            ['name' => 'Telangana'],
            ['name' => 'Tripura'],
            ['name' => 'Uttar Pradesh'],
            ['name' => 'Uttarakhand'],
            ['name' => 'West Bengal'],
        ];

        DB::table('states')->insert($states);

        $cities = [
            ['name' => 'Mumbai', 'state_id' => 14],
            ['name' => 'Delhi', 'state_id' => 26],
            ['name' => 'Bangalore', 'state_id' => 11],
            ['name' => 'Hyderabad', 'state_id' => 24],
            ['name' => 'Ahmedabad', 'state_id' => 7],
            ['name' => 'Chennai', 'state_id' => 23],
            ['name' => 'Kolkata', 'state_id' => 28],
            ['name' => 'Surat', 'state_id' => 7],
            ['name' => 'Pune', 'state_id' => 14],
            ['name' => 'Jaipur', 'state_id' => 21],
            ['name' => 'Lucknow', 'state_id' => 26],
            ['name' => 'Kanpur', 'state_id' => 26],
            ['name' => 'Nagpur', 'state_id' => 14],
            ['name' => 'Indore', 'state_id' => 13],
            ['name' => 'Thane', 'state_id' => 14],
            ['name' => 'Bhopal', 'state_id' => 13],
            ['name' => 'Visakhapatnam', 'state_id' => 1],
            ['name' => 'Patna', 'state_id' => 4],
            ['name' => 'Vadodara', 'state_id' => 7],
            ['name' => 'Ghaziabad', 'state_id' => 26],
            ['name' => 'Ludhiana', 'state_id' => 20],
            ['name' => 'Agra', 'state_id' => 26],
            ['name' => 'Nashik', 'state_id' => 14],
            ['name' => 'Faridabad', 'state_id' => 8],
            ['name' => 'Meerut', 'state_id' => 26],
            ['name' => 'Rajkot', 'state_id' => 7],
            ['name' => 'Kalyan', 'state_id' => 14],
            ['name' => 'Vasai-Virar', 'state_id' => 14],
            ['name' => 'Varanasi', 'state_id' => 26],
            ['name' => 'Srinagar', 'state_id' => 27],
            ['name' => 'Aurangabad', 'state_id' => 14],
            ['name' => 'Dhanbad', 'state_id' => 10],
            ['name' => 'Amritsar', 'state_id' => 20],
            ['name' => 'Navi Mumbai', 'state_id' => 14],
            ['name' => 'Allahabad', 'state_id' => 26],
            ['name' => 'Howrah', 'state_id' => 28],
            ['name' => 'Ranchi', 'state_id' => 10],
            ['name' => 'Gwalior', 'state_id' => 13],
            ['name' => 'Jabalpur', 'state_id' => 13],
            ['name' => 'Coimbatore', 'state_id' => 23],
            ['name' => 'Vijayawada', 'state_id' => 1],
            ['name' => 'Madurai', 'state_id' => 23],
            ['name' => 'Raipur', 'state_id' => 5],
            ['name' => 'Kota', 'state_id' => 21],
            ['name' => 'Guwahati', 'state_id' => 3],
            ['name' => 'Chandigarh', 'state_id' => 20],
            ['name' => 'Solapur', 'state_id' => 14],
            ['name' => 'Hubli–Dharwad', 'state_id' => 11],
            ['name' => 'Bareilly', 'state_id' => 26],
            ['name' => 'Moradabad', 'state_id' => 26],
        ];

        DB::table('cities')->insert($cities);
    }
}
