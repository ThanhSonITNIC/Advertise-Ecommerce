<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectType.
 *
 * @package namespace App\Entities;
 */
class ProjectType extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'project_types';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'name'];

    public function projects(){
        return $this->hasMany('App\Entities\Project', 'id_type');
    }

}
