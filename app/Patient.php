<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  protected $fillable = ['name_Pat','lastname_Pat',
'nickname_Pat',
  'nationality_Pat',
  'race_Pat',
  'religion_Pat',
  'birthday_Pat',
  'weight_Pat',
  'hight_Pat',
  'id_card_Pat',
  'gender_Pat',
  'interesting_Pat',
  'img_name_Pat'];
}
