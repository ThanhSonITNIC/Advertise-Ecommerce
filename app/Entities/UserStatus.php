<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserStatus.
 *
 * @package namespace App\Entities;
 */
class UserStatus extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'user_statuses';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function users(){
        return $this->hasMany('App\Entities\User', 'id_status');
    }

    public function alive(){
        return $this->id == 1;
    }

    public function blocked(){
        return $this->id == 2;
    }
}
