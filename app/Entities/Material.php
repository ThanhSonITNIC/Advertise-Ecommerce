<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Material.
 *
 * @package namespace App\Entities;
 */
class Material extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'materials';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'price', 'quantity', 'description', 'id_unit', 'id_project'];

    public function unit(){
        return $this->belongsTo('App\Entities\Unit', 'id_unit');
    }

    public function projects(){
        return $this->belongsToManys('App\Entities\Project', 'App\Entities\ProjectMaterial', 'id_material', 'id_project');
    }
}
