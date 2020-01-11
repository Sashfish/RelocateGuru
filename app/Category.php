<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Subcategories;
use App\Http\Requests\CategoryFormRequest;
use App\Tip;

class Category extends Model
{
     protected $table='categories';
     protected $primaryKey='id';
     protected $fillable=['name','slug'];
     public function tip(){
      return $this->hasMany('App\Tip')->paginate(30);
}

public function getRouteKeyName()
{
      return 'slug';
}
public function subcategory(){
      return $this->hasMany('App\Subcategories','sub_category_id');
}
}
