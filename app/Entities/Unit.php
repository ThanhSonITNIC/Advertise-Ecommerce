<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Unit.
 *
 * @package namespace App\Entities;
 */
class Unit extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'units';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];

    public function products(){
        return $this->hasMany('App\Entities\Product', 'id_unit');
    }

}
