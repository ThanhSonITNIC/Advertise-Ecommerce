<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProjectRepository;
use App\Entities\Project;
use App\Validators\ProjectValidator;

/**
 * Class ProjectRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'budget' => '=',
        'customer.name' => 'like',
        'created_at' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProjectValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get list post by type
     * 
     * @param $id
     * 
     * @return mixed
     */
    public function type($id){
        return $this->scopeQuery(function($scope) use ($id){
            return $scope->where('id_type', $id);
        })->paginate();
    }

    /**
     * Get list highlight project
     * 
     * @return mixed
     */
    public function highlights(){
        $this->popCriteria(app(RequestCriteria::class));

        return $this->scopeQuery(function($scope){
            return $scope->where('highlight', true);
        })->orderBy('created_at', 'desc')->get();
    }
    
}
