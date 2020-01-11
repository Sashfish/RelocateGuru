<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{ protected $table=['conversations'];
  protected $fillable=['user_one','user_two'];

  public function user(){
    return $this->belongsTo('App\model\User');
  }
  public function message(){
    return $this->hasMany('App\Message');
  }
}
