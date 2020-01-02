<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
   public function model()
   {
       return $this->belongsTo('App\CarModel','carModelId');
   }
   public function user()
   {
       return $this->hasMany('App\User','carId');
   }
   
}
