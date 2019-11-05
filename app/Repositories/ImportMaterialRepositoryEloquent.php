<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ImportMaterialRepository;
use App\Entities\ImportMaterial;
use App\Validators\ImportMaterialValidator;

/**
 * Class ImportMaterialRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ImportMaterialRepositoryEloquent extends BaseRepository implements ImportMaterialRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ImportMaterial::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ImportMaterialValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
