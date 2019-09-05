<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConfigureRepository;
use App\Entities\Configure;
use App\Validators\ConfigureValidator;

/**
 * Class ConfigureRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConfigureRepositoryEloquent extends BaseRepository implements ConfigureRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Configure::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ConfigureValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
