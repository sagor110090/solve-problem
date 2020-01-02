<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public function car()
    {
        return $this->hasMany('App\Car','carModelId');
    }
}
