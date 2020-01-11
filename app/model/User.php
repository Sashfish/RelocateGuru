<?php
namespace App\model;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
{
  use HasApiTokens, Notifiable;
  /**
   * The attributes that are mass assignable.
   *
  *@var array
  */
  protected $fillable = [
    'name', 'email', 'password','provider', 'provider_id', 'avatar',
  ];
  /**
   * The attributes that are mass assignable.
   *
  *@var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];
  /**
   * The attributes that are mass assignable.
   *
  *@var array
  */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  protected $table='users';
  public $timestamps = "false";
  protected $primaryKey='id';
  public function tip(){
    return $this->hasMany('App\Tip');
  }
  public function messages(){
    return $this->hasMany('App\Message');
  }
  public function linkedSocialAccounts(){
    return $this->hasMany(LinkedSocialAccount::class);
  }

  public function followers(){
    return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id')->withTimestamps();
  }
  public function following(){
    return $this->belongsToMany(User::class, 'followers', 'follower_id' , 'user_id')->withTimestamps();
  }
  public function tip_likes(){
    return $this->hasMany('App\Tip_likes');
  }
   public function conversation(){
     return $this->hasMany('App\Conversation');
   }
   public function comment(){
     return $this->hasMany('App\Comment');
   }

   public function likes(){
    return $this->belongsToMany( 'App\Tip', 'tip_likes', 'user_id', 'tip_id');
  }

}

    //
