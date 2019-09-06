<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Configure.
 *
 * @package namespace App\Entities;
 */
class Configure extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'configures';

    protected $primaryKey = 'key';

    public $incrementing = false;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'value'];

}
