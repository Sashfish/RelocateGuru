<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subcategories;

class Keywords extends Model
{
  protected $table='keywords';
  protected $primaryKey='id';
  public function subcategories(){
   return $this->hasMany('App\Subcategories');
}
}
