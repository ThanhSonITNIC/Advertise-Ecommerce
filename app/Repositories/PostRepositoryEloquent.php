<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PostRepository;
use App\Entities\Post;
use App\Validators\PostValidator;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    protected $fieldSearchable = [
        'title' => 'like',
        'author.name' => 'like',
        'published' => '=',
        'created_at' => 'like',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Post::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PostValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        // delete images
        $image = Post::find($id)->image;
        if(!empty($image))
            foreach (json_decode($image, true)['urls'] as $image) {
                !isset($image) ?: \File::delete($image);
            }
        
        // delete storage
        parent::delete($id);
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
        })->orderBy('created_at', 'desc')->paginate();
    }

    /**
     * Get news
     * 
     * @return mixed
     */
    public function news(){
        return $this->scopeQuery(function($scope){
            return $scope->where('id_type', 'news');
        })->paginate();
    }

    /**
     * Get about
     * 
     * @return App\Entities\Post
     */
    public function about(){
        return $this->findByField('id_type', 'about')->first();
    }

    /**
     * Get contact
     * 
     * @return App\Entities\Post
     */
    public function contact(){
        return $this->findByField('id_type', 'contact')->first();
    }

    /**
     * Get policies
     * 
     * @return mixed
     */
    public function policies(){
        return $this->scopeQuery(function($scope){
            return $scope->where('id_type', 'policies');
        })->paginate();
    }
    
}
