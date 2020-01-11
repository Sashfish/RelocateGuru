<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{   protected $table=['followers'];
    protected $guarded = [];

public function user(){
 return $this->belongsToMany('App\model\User');
}    
}
