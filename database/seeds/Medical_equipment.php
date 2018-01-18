<?php

use Illuminate\Database\Seeder;

class Medical_equipment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('medical_equipments')->insert([
    [
      'medical_equipment_name' => 'oxygen_mac' ,
    'medical_equipment_description' =>'เครื่องผลิตออกซิเจน' ,
    'created_at' => date('Y-m-d H:i:s'),
  ],
  [
    'medical_equipment_name' => 'suction_mac' ,
  'medical_equipment_description' =>'เครื่องดูดเสมหะ' ,
  'created_at' => date('Y-m-d H:i:s'),
],
[
  'medical_equipment_name' => 'electric_bed' ,
'medical_equipment_description' =>'เตียงไฟฟ้า' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'medical_equipment_name' => 'air_mattress' ,
'medical_equipment_description' =>'เตียงลม' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'medical_equipment_name' => 'pressure_gauge' ,
'medical_equipment_description' =>'เครื่องวัดความดัน' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'medical_equipment_name' => 'SPO2' ,
'medical_equipment_description' =>'เครื่องวัดความอิ่มตัวออกซิเจนในเลือด' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'medical_equipment_name' => 'glucose_meter' ,
'medical_equipment_description' =>'เครื่องวัดระดับน้ำตาล' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'medical_equipment_name' => 'sprayer_mac' ,
'medical_equipment_description' =>'เครื่องพ่นละอองยา' ,
'created_at' => date('Y-m-d H:i:s'),
],
]);
    }
}
