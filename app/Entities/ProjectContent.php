<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectContent.
 *
 * @package namespace App\Entities;
 */
class ProjectContent extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'project_contents';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    public function project(){
        return $this->hasOne('App\Entities\Project', 'id');
    }

}
