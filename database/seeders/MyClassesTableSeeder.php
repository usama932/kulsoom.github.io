<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'Hifz A', 'class_type_id' => $ct[1]],
            ['name' => 'Hifz B', 'class_type_id' => $ct[2]],
            ['name' => 'Hifz C', 'class_type_id' => $ct[3]],
            ['name' => 'Nazra A', 'class_type_id' => $ct[4]],
            ['name' => 'Nazra B', 'class_type_id' => $ct[5]],
            ['name' => 'Nazra B', 'class_type_id' => $ct[6]],
            ['name' => 'Tajweed A', 'class_type_id' => $ct[7]],
            ['name' => 'Tajweed B', 'class_type_id' => $ct[7]],
            ];

        DB::table('my_classes')->insert($data);

    }
}
