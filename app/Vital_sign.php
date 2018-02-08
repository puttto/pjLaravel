<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vital_sign extends Model
{
      protected $fillable = ['id_vital_signs','sys','dia','heart_rate'
      ,'temp','comment','date_time','id_caregivers','id_patients'];
}
