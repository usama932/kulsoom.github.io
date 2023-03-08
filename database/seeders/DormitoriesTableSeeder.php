<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DormitoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dormitories')->delete();
        $data = [
            ['name' => '20HC Hostel'],
            ['name' => 'New_City Hostel'],
            ['name' => 'Officer Colony Hostel'],
        ];
        DB::table('dormitories')->insert($data);
    }
}
