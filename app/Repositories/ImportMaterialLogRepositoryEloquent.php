<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ImportMaterialLogRepository;
use App\Entities\ImportMaterialLog;
use App\Validators\ImportMaterialLogValidator;

/**
 * Class ImportMaterialLogRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ImportMaterialLogRepositoryEloquent extends BaseRepository implements ImportMaterialLogRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ImportMaterialLog::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ImportMaterialLogValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
