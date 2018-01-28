<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Select_care_status extends Model
{
  protected $fillable = ['id_select_care_statuses','id_patients','id_caregivers','status_care'];
    //
}
