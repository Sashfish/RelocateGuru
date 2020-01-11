<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class AppTip extends Model
{
    protected $table='tips';
    protected $primaryKey='id';
    protected $fillable=['title','description','category_id'];
    public function city(){
      return $this->belongsTo('App\City');
}
   public function category(){
    return $this->belongsTo('App\Category');
}
   public function user(){
    return $this->belongsTo('App\model\User');
  }
}
