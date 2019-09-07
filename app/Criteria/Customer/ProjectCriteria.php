<?php

namespace App\Criteria\Customer;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ProjectCriteria.
 *
 * @package namespace App\Criteria\Customer;
 */
class ProjectCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model->where('id_customer', \Auth::id());
        return $model;
    }
}
