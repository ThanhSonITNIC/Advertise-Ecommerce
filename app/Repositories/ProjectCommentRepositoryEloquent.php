<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProjectCommentRepository;
use App\Entities\ProjectComment;
use App\Validators\ProjectCommentValidator;

/**
 * Class ProjectCommentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProjectCommentRepositoryEloquent extends BaseRepository implements ProjectCommentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectComment::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectCommentValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
