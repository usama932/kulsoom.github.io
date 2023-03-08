<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Hifz A', 'code' => 'HA'],
            ['name' => 'Hifz B', 'code' => 'HB'],
            ['name' => 'Hifz C', 'code' => 'HC'],
            ['name' => 'Nazra A', 'code' => 'NA'],
            ['name' => 'Nazra B', 'code' => 'NB'],
            ['name' => 'Nazra C', 'code' => 'NC'],
            ['name' => 'Tajweed A', 'code' => 'TA'],
            ['name' => 'Tajweed B', 'code' => 'TB'],
        ];

        DB::table('class_types')->insert($data);

    }
}
