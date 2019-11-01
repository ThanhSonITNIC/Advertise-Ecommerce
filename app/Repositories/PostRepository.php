<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Repositories;
 */
interface PostRepository extends RepositoryInterface
{
    /**
     * Get list post by type
     * 
     * @param $id
     * 
     * @return mixed
     */
    public function type($id);
}
