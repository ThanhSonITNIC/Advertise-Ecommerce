<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProjectContentRepository;
use App\Entities\ProjectContent;
use App\Validators\ProjectContentValidator;

/**
 * Class ProjectContentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProjectContentRepositoryEloquent extends BaseRepository implements ProjectContentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectContent::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectContentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
