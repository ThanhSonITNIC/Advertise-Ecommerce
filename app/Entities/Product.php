<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'products';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'price', 'quantity', 'description', 'id_unit', 'id_project'];

    public function unit(){
        return $this->belongTo('App\Entities\Unit', 'id_unit');
    }

    public function project(){
        return $this->belongTo('App\Entities\Project', 'id_project');
    }

}
