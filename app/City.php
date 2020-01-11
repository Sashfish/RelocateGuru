<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   protected $table='cities';
   protected $primaryKey='id';
   public function tip(){
    return $this->hasMany('App\Tip');
}
    public function country(){
   return $this->belongsTo('App\Country');
}
}
