<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CategoryFormRequest;
use App\Category;

class Subcategories extends Model
{
  protected $table='sub_categories';
  protected $fillable=['name'];
  protected $primaryKey='id';
  public function categories(){
   return $this->belongsTo('App\Category');
}
public function tips(){
  return $this->hasMany('App\Tip');
}
}
