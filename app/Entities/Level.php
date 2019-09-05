<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Level.
 *
 * @package namespace App\Entities;
 */
class Level extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'levels';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];

    public function users(){
        $this->hasMany('App\Entities\User', 'id_level');
    }

}
