<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Repositories\ProjectRepository;
use App\Validators\ProjectValidator;

/**
 * Class ProjectsController.
 *
 * @package namespace App\Http\Controllers\Administrator;
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

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProjectCreateRequest $request)
    {
        try {
            // update request
            $request->request->add(['highlight' => $request->exists('highlight')]);
            $request->request->add(['published' => $request->exists('published')]);

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $project = $this->repository->create($request->all());

            $response = [
                'message' => 'Project created.',
                'data'    => $project->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect(route('admin.projects.show', $project->id))->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $project = $this->repository->with(['materials'])->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $project,
            ]);
        }

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = $this->repository->find($id);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProjectUpdateRequest $request, $id)
    {
        try {
            // update request
            $request->request->add(['highlight' => $request->exists('highlight')]);
            $request->request->add(['published' => $request->exists('published')]);

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $project = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Project updated.',
                'data'    => $project->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Project deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Project deleted.');
    }

    public function create(){
        return view('admin.projects.create');
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

        return view('admin.projects.index', compact('projects'));
    }
}
