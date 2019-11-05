<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ImportMaterial.
 *
 * @package namespace App\Entities;
 */
class ImportMaterial extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'import_materials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_material', 'price', 'quantity', 'description', 'id_user'];

    public function user(){
        return $this->belongsTo('App\Entities\User', 'id_user');
    }

    public function material(){
        return $this->belongsTo('App\Entities\Material', 'id_material');
    }

    public function logs(){
        return $this->hasMany('App\Entities\ImportMaterialLog', 'id_import_material');
    }

}
