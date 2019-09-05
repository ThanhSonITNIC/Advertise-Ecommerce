<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable implements Transformable
{
    use TransformableTrait;
    use HasApiTokens, Notifiable;

    protected $table = 'users';

    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'email', 'tel', 'address', 'provider', 'id_provider', 'id_level', 'status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id_provider'
    ];

    public function isAdmin(){
        return $this->id_level == 'admin';
    }


    public function level(){
        return $this->belongTo('App\Entities\Level', 'id_level');
    }

    public function projectComments(){
        return $this->hasMany('App\Entities\ProjectComment', 'creator');
    }

    public function projects(){
        return $this->hasMany('App\Entities\Project', 'id_customer');
    }

    public function posts(){
        return $this->hasMany('App\Entities\Post', 'author');
    }

}
