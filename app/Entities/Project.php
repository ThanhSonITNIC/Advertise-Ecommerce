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
        'image',
        'id_customer',
        'budget',
        'highlight',
        'start_at',
        'finish_at',
        'finished_at',
        'id_type',
        'tags',
        'published',
        'content'
    ];

    public function getContentAttribute(){
        return $this->content()->first()->content;
    }

    public function content(){
        return $this->hasOne('App\Entities\ProjectContent', 'id');
    }

    public function type(){
        return $this->belongsTo('App\Entities\ProjectType', 'id_type');
    }

    public function customer(){
        return $this->belongsTo('App\Entities\User', 'id_customer');
    }

    // public function materials(){
    //     return $this->belongsToMany('App\Entities\Material', 'App\Entities\ProjectMaterial', 'id_project', 'id_material');
    // }
    public function materials(){
        return $this->hasMany('App\Entities\ProjectMaterial', 'id_project');
    }

    public function image(){
        return json_decode($this->image)->urls->default ?? null;
    }

    public function watermark(){
        return json_decode($this->image)->urls->watermark ?? null;
    }
    
}
