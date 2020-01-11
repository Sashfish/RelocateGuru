<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zttp\Zttp;
use App\model\User;
use App\Tip;

class Tip_likes extends Model
{   protected $table='tip_likes';
protected $fillable=['tip_id','user_id'];


 public function user(){
  return $this->belongsTo('App\model\User');
}
public function tip(){
 return $this->belongsTo('App\Tip');
}

}
