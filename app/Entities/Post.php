<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Post.
 *
 * @package namespace App\Entities;
 */
class Post extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'title', 'slug', 'description', 'content', 'image', 'id_author', 'id_type', 'highlight', 'published', 'tags'];

    public function type(){
        return $this->belongsTo('App\Entities\PostType', 'id_type');
    }

    public function author(){
        return $this->belongsTo('App\Entities\User', 'id_author');
    }

    public function image(){
        return json_decode($this->image)->urls->default ?? null;
    }

    public function watermark(){
        return json_decode($this->image)->urls->watermark ?? null;
    }
}
