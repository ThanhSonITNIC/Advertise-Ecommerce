<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectTypeCreateRequest;
use App\Http\Requests\ProjectTypeUpdateRequest;
use App\Repositories\ProjectTypeRepository;
use App\Validators\ProjectTypeValidator;

/**
 * Class ProjectTypesController.
 *
 * @package namespace App\Http\Controllers\Administrator;
 */
class ProjectTypesController extends Controller
{
    /**
     * @var ProjectTypeRepository
     */
    protected $repository;

    /**
     * @var ProjectTypeValidator
     */
    protected $validator;

    /**
     * ProjectTypesController constructor.
     *
     * @param ProjectTypeRepository $repository
     * @param ProjectTypeValidator $validator
     */
    public function __construct(ProjectTypeRepository $repository, ProjectTypeValidator $validator)
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
        $projectTypes = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectTypes,
            ]);
        }

        return view('admin.setups.project-types', compact('projectTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectTypeCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProjectTypeCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $projectType = $this->repository->create($request->all());

            $response = [
                'message' => 'ProjectType created.',
                'data'    => $projectType->toArray(),
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
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectType = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectType,
            ]);
        }

        return view('projectTypes.show', compact('projectType'));
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
        $projectType = $this->repository->find($id);

        return view('projectTypes.edit', compact('projectType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectTypeUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProjectTypeUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $projectType = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProjectType updated.',
                'data'    => $projectType->toArray(),
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
                'message' => 'ProjectType deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProjectType deleted.');
    }
}
