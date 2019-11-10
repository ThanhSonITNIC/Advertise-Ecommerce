<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\PostRepository;
use App\Validators\PostValidator;
use View;
use App\Criteria\PostCriteria;

class NewsController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var PostValidator
     */
    protected $validator;

    /**
     * PostsController constructor.
     *
     * @param PostRepository $repository
     * @param PostValidator $validator
     */
    public function __construct(PostRepository $repository, PostValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;

        $this->repository->pushCriteria(PostCriteria::class);
        View::share('highlightPosts', $this->repository->highlights());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $posts = $this->repository->news();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('front.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $post,
            ]);
        }

        return view('front.posts.show', compact('post'));
    }

    public function about(){
        $post = $this->repository->about();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $post,
            ]);
        }

        if($post != null)
            return view('front.posts.show', compact('post'));
        return redirect(route('guest.home'));
    }

    public function contact(){
        $post = $this->repository->contact();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $post,
            ]);
        }

        if($post != null)
            return view('front.posts.show', compact('post'));
        return redirect(route('guest.home'));
    }

    /**
     * Display a listing by policies of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function policies()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $posts = $this->repository->policies();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('front.posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource by type.
     *
     * @param $id type
     * @return \Illuminate\Http\Response
     */
    public function type($id)
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));

        $posts = $this->repository->type($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('front.posts.index', compact('posts'));
    }

}
