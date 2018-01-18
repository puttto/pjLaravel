<?php

use Illuminate\Database\Seeder;

class Aller extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('allergies')->insert([
        [
          'allergy_name' => 'no_aller' ,
        'allergy_description' =>'ไม่มีอาการแพ้' ,
        'created_at' => date('Y-m-d H:i:s'),
        ],
        [
          'allergy_name' => 'aller_milk' ,
        'allergy_description' =>'แพ้นม' ,
        'created_at' => date('Y-m-d H:i:s'),
      ],
      [
        'allergy_name' => 'aller_egg' ,
      'allergy_description' =>'แพ้ไข่' ,
      'created_at' => date('Y-m-d H:i:s'),
    ],
    [
      'allergy_name' => 'aller_peanut' ,
    'allergy_description' =>'แพ้ถั่วลิสง' ,
    'created_at' => date('Y-m-d H:i:s'),
  ],
  [
    'allergy_name' => 'aller_nuts' ,
  'allergy_description' =>'แพ้ถั่วเปลือกแข็ง' ,
  'created_at' => date('Y-m-d H:i:s'),
  ],
  [
    'allergy_name' => 'aller_fish' ,
  'allergy_description' =>'แพ้ปลา' ,
  'created_at' => date('Y-m-d H:i:s'),
  ],
  [
    'allergy_name' => 'aller_seafood' ,
  'allergy_description' =>'แพ้อาหารทะเล' ,
  'created_at' => date('Y-m-d H:i:s'),
  ],
  [
    'allergy_name' => 'aller_soy' ,
  'allergy_description' =>'แพ้ถั่วเหลือง' ,
  'created_at' => date('Y-m-d H:i:s'),
  ],
  [
    'allergy_name' => 'aller_wheat' ,
  'allergy_description' =>'แพ้ข้าวสาลี' ,
  'created_at' => date('Y-m-d H:i:s'),
  ],
    [
      'allergy_name' => 'aller_penicillin' ,
    'allergy_description' =>'แพ้ยาเพนิซิลลิน' ,
    'created_at' => date('Y-m-d H:i:s'),
  ],
  [
    'allergy_name' => 'aller_sulfonamides' ,
  'allergy_description' =>'แพ้ยากลุ่มซัลฟา' ,
  'created_at' => date('Y-m-d H:i:s'),
],
[
  'allergy_name' => 'aller_insulin' ,
'allergy_description' =>'แพ้อินซูลิน' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_iodine' ,
'allergy_description' =>'แพ้ไอโอดีน' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_aspirine' ,
'allergy_description' =>'แพ้แอสไพริน' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_anticonvulsant' ,
'allergy_description' =>'แพ้ยาต้านชัก' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_gout_med' ,
'allergy_description' =>'แพ้ยารักษาโรคเก๊าท์' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_lupus_med' ,
'allergy_description' =>'แพ้ยารักษาโรคแพ้ภูมิตนเอง' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_anti-tuberculosis' ,
'allergy_description' =>'แพ้ยารักษาวัณโรค' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_hiv_aids_med' ,
'allergy_description' =>'แพ้ยาสำหรับรักษาผู้ป่วยโรคติดเชื้อเอชไอวีหรือเอดส์' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_losioncream_corticosteroids' ,
'allergy_description' =>'แพ้ครีมหรือโลชั่นคอร์ติโคเสตียรอยด์' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
'allergy_name' => 'aller_bee_pollen' ,
'allergy_description' =>'แพ้ผลิตภัณฑ์จากเกสรผึ้ง' ,
'created_at' => date('Y-m-d H:i:s'),
],

]);
    }
}
