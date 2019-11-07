<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserStatusRepository;
use App\Entities\UserStatus;
use App\Validators\UserStatusValidator;

/**
 * Class UserStatusRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserStatusRepositoryEloquent extends BaseRepository implements UserStatusRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserStatus::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserStatusValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
