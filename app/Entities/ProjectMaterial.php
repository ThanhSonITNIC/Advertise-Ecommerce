<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProjectMaterial.
 *
 * @package namespace App\Entities;
 */
class ProjectMaterial extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'project_materials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_project', 'id_material', 'price', 'quantity', 'description'];

    public function project(){
        return $this->belongsTo('App\Entities\Project', 'id_project');
    }

    public function material(){
        return $this->belongsTo('App\Entities\Material', 'id_material');
    }

}
