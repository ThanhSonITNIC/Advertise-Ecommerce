<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProjectTypeRepository;
use App\Entities\ProjectType;
use App\Validators\ProjectTypeValidator;

/**
 * Class ProjectTypeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProjectTypeRepositoryEloquent extends BaseRepository implements ProjectTypeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectType::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectTypeValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
