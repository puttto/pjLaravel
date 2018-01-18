<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = ['id_customer','name_cus','lastname_cus',
  'telephone_cus',
  'mobilephone_cus',
  'address_cus',
  'lineid_cus',
  'id_card_cus',
  'email_cus',];
    //
}
