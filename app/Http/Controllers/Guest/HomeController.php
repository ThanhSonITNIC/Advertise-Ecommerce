<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\PostRepository;
use App\Repositories\ProjectTypeRepository;
use View;
use App\Criteria\PostCriteria;

class HomeController extends Controller
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var ProjectTypeRepository
     */
    protected $projectTypeRepository;

    /**
     * PostsController constructor.
     *
     * @param PostRepository $repository
     * @param ProjectTypeRepository $projectTypeRepository
     */
    public function __construct(PostRepository $repository, ProjectTypeRepository $projectTypeRepository)
    {
        $this->repository = $repository;
        $this->projectTypeRepository  = $projectTypeRepository;

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
        $highlightPosts = $this->repository->highlights();
        $projectTypes = $this->projectTypeRepository->allWithProjects();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('front.home.index', compact('highlightPosts', 'projectTypes'));
    }

}
