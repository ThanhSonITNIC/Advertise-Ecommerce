<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProjectRepository.
 *
 * @package namespace App\Repositories;
 */
interface ProjectRepository extends RepositoryInterface
{
    /**
     * Get list project by type
     * 
     * @param $id
     * 
     * @return mixed
     */
    public function type($id);
}
