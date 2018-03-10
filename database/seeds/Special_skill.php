<?php

use Illuminate\Database\Seeder;

class Special_skill extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('special__skills')->insert([
    [
      'special_skill_name' => 'ss_paralysis' ,
    'special_skill_descption' =>'เคยดูแลผู้ป่วยอัมพาต' ,
    'created_at' => date('Y-m-d H:i:s'),
  ],
  [
    'special_skill_name' => 'ss_post_surgery_recovery' ,
  'special_skill_descption' =>'เคยดูแลผู้ป่วยหลังผ่าตัด' ,
  'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_cancer' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยมะเร็ง' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_kidney' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยไต' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_dementia' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยสมองเสื่อม' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_parkinson' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยพาร์กินสัน' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_alz' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยอัลไซเมอร์' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_als' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยกล้ามเนื้ออ่อนแรง' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_bedridden' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยติดเตียง' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_suction' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยเจาะคอดูดเสมหะ' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_NG_tube' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยที่ต้องให้อาหารทางสาย' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_PEG' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยให้อาหารผ่านหน้าท้อง' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_rehab' ,
'special_skill_descption' =>'ทำกายภาพบำบัดเบื้องต้นได้' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_insulin' ,
'special_skill_descption' =>'ดูแลการฉีดอินซูลิน' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_CAPD' ,
'special_skill_descption' =>'ช่วยเหลือการฟอกไตหน้าท้อง' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_bedsores' ,
'special_skill_descption' =>'ดูแลผู้ป่วยแผลกดทับ แผลขนาดใหญ่' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_catheter' ,
'special_skill_descption' =>'ดูแลสายสวนปัสสาวะ' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_colostomy' ,
'special_skill_descption' =>'ดูแลถุงอุจจาระหน้าท้อง' ,
'created_at' => date('Y-m-d H:i:s'),
],
[
  'special_skill_name' => 'ss_phychictric' ,
'special_skill_descption' =>'เคยดูแลผู้ป่วยจิตเวช' ,
'created_at' => date('Y-m-d H:i:s'),
],
]);
    }
}
