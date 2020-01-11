<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityAreas extends Model
{
  protected $table='city_areas';
      protected $primaryKey='id';
       public function tips(){
        return $this->hasMany('App\Tip','tip_id');
        public function cities(){
          return $this->belongsTo('App\City','city_id');
        }
}
