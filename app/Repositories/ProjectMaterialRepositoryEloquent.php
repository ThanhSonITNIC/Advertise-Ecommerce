<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProjectMaterialRepository;
use App\Entities\ProjectMaterial;
use App\Validators\ProjectMaterialValidator;

/**
 * Class ProjectMaterialRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProjectMaterialRepositoryEloquent extends BaseRepository implements ProjectMaterialRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMaterial::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectMaterialValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
