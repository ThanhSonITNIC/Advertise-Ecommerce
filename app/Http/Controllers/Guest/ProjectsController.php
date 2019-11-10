<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Repositories\ProjectRepository;
use App\Validators\ProjectValidator;
use View;
use App\Criteria\ProjectCriteria;

/**
 * Class ProjectsController.
 *
 * @package namespace App\Http\Controllers\Guest;
 */
class ProjectsController extends Controller
{
    /**
     * @var ProjectRepository
     */
    protected $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;

    protected $highlightProjects;

    /**
     * ProjectsController constructor.
     *
     * @param ProjectRepository $repository
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;

        $this->repository->pushCriteria(ProjectCriteria::class);
        View::share('highlightProjects', $this->repository->highlights());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $projects = $this->repository->paginate();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projects,
            ]);
        }

        return view('front.projects.index', compact('projects'));
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
        $project = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $project,
            ]);
        }

        return view('front.projects.show', compact('project'));
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

        $projects = $this->repository->type($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projects,
            ]);
        }

        return view('front.projects.index', compact('projects'));
    }
}
