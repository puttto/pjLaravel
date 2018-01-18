<?php

use Illuminate\Database\Seeder;

class Equipment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipment')->insert([
          [
            'equipment_name' => 'no_equipment' ,
          'equipment_description' =>'ไม่มีอุปกรณ์ติดตัวคนไข้' ,
          'created_at' => date('Y-m-d H:i:s'),
        ],
                  [
                    'equipment_name' => 'foley_cath' ,
                  'equipment_description' =>'สายสวนปัสสาวะ' ,
                  'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                  'equipment_name' => 'ng_tube' ,
                'equipment_description' =>'สายให้อาหาร' ,
                'created_at' => date('Y-m-d H:i:s'),
              ],
              [
                'equipment_name' => 'colostomy' ,
              'equipment_description' =>'ถุงอุจจาระหน้าท้อง' ,
              'created_at' => date('Y-m-d H:i:s'),
            ],
            [
              'equipment_name' => 'PEG' ,
            'equipment_description' =>'สายให้อาหารหน้าท้อง' ,
            'created_at' => date('Y-m-d H:i:s'),
          ],
          [
            'equipment_name' => 'tracheaostmy_tube' ,
          'equipment_description' =>'ท่อเจาะคอ' ,
          'created_at' => date('Y-m-d H:i:s'),
        ],
              ]);
    }
}
