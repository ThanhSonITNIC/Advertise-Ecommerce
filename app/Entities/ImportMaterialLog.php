<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ImportMaterialLog.
 *
 * @package namespace App\Entities;
 */
class ImportMaterialLog extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'import_material_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_import_material', 'new_content', 'old_content', 'id_user'];

    public function user(){
        return $this->belongsTo('App\Entities\User', 'id_user');
    }

    public function import(){
        return $this->belongsTo('App\Entities\ImportMaterial', 'id_import_material');
    }

}
