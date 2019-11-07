<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyEmail;

/**
 * Class User.
 *
 * @package namespace App\Entities;
 */
class User extends Authenticatable implements Transformable, MustVerifyEmail, CanResetPassword
{
    use TransformableTrait;
    use Notifiable, CanResetPasswordTrait;

    protected $table = 'users';

    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name', 'email', 'tel', 'address', 'provider', 'id_provider', 'id_level', 'id_status', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'id_provider'
    ];

    public function level(){
        return $this->belongsTo('App\Entities\Level', 'id_level');
    }

    public function projects(){
        return $this->hasMany('App\Entities\Project', 'id_customer');
    }

    public function posts(){
        return $this->hasMany('App\Entities\Post', 'author');
    }

    public function status(){
        return $this->belongsTo('App\Entities\UserStatus', 'id_status');
    }

    public function getEmailForVerification(){
        return $this->email;
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

}
