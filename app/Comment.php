<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\model\User;
use App\Tip;

class Comment extends Model
{
  //protected $guarded = [];

  protected $table='comments';
  protected $fillable=['tip_id','user_id','body'];

  public function tip(){
    return $this->belongsTo('App\Tip');
  }
  public function user(){
    return $this->belongsTo('App\model\User');
  }
}
