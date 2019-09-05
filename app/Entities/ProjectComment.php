<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectComment.
 *
 * @package namespace App\Entities;
 */
class ProjectComment extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'project_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_project', 'content', 'id_creator'];

    public function creator(){
        return $this->belongTo('App\Entities\User', 'id_creator');
    }

    public function project(){
        return $this->belongTo('App\Entities\Project', 'id_project');
    }

}
