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

    /**
     * Get list highlight project
     * 
     * @return mixed
     */
    public function highlights();

    /**
     * Get news
     * 
     * @return mixed
     */
    public function news();

    /**
     * Get about
     * 
     * @return App\Entities\Post
     */
    public function about();

    /**
     * Get contact
     * 
     * @return App\Entities\Post
     */
    public function contact();

    /**
     * Get policies
     * 
     * @return mixed
     */
    public function policies();

}
