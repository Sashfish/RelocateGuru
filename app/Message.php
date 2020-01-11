<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{protected $table='messages';

protected $primaryKey='id';
protected $fillable=['message'];

public function user()
{
  return $this->belongsTo('App\model\User');
}

public function conversation(){
  return $this->belongsTo('App\Conversation');
}
}
