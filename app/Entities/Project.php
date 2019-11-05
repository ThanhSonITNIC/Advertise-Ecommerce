<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Project.
 *
 * @package namespace App\Entities;
 */
class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'content',
        'image',
        'id_customer', //
        'budget', //
        'highlight',
        'start_at', //
        'finish_at', //
        'finished_at', //
        'id_type',
        'tags',
        'published'
    ];

    public function type(){
        return $this->belongsTo('App\Entities\ProjectType', 'id_type');
    }

    public function customer(){
        return $this->belongsTo('App\Entities\User', 'id_customer');
    }

    public function comments(){
        return $this->hasMany('App\Entities\ProjectComment', 'id_project');
    }

    public function materials(){
        return $this->belongsToManys('App\Entities\Material', 'App\Entities\ProjectMaterial', 'id_project', 'id_material');
    }

    public function image(){
        return json_decode($this->image)->urls->default ?? null;
    }

    public function watermark(){
        return json_decode($this->image)->urls->watermark ?? null;
    }
    
}
