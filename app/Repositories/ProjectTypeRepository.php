<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProjectTypeRepository.
 *
 * @package namespace App\Repositories;
 */
interface ProjectTypeRepository extends RepositoryInterface
{
    /**
     * Get list type with relation projects
     * 
     * @return mixed
     */
    public function allWithProjects();
}
