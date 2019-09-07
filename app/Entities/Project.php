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
    protected $fillable = ['id', 'name', 'slug', 'description', 'images', 'customer', 'price', 'highlight', 'start_at', 'finished_at', 'id_type', 'id_customer', 'tags', 'rate'];

    public function type(){
        return $this->belongTo('App\Entities\ProjectType', 'id_type');
    }

    public function customer(){
        return $this->belongTo('App\Entities\User', 'id_customer');
    }
}
