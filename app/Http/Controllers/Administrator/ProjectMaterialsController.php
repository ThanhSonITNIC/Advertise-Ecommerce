<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectMaterialCreateRequest;
use App\Http\Requests\ProjectMaterialUpdateRequest;
use App\Repositories\ProjectMaterialRepository;
use App\Validators\ProjectMaterialValidator;

/**
 * Class ProjectMaterialsController.
 *
 * @package namespace App\Http\Controllers\Administrator;
 */
class ProjectMaterialsController extends Controller
{
    /**
     * @var ProjectMaterialRepository
     */
    protected $repository;

    /**
     * @var ProjectMaterialValidator
     */
    protected $validator;

    /**
     * ProjectMaterialsController constructor.
     *
     * @param ProjectMaterialRepository $repository
     * @param ProjectMaterialValidator $validator
     */
    public function __construct(ProjectMaterialRepository $repository, ProjectMaterialValidator $validator)
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
        $projectMaterials = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectMaterials,
            ]);
        }

        return view('projectMaterials.index', compact('projectMaterials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectMaterialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProjectMaterialCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $projectMaterial = $this->repository->create($request->all());

            $response = [
                'message' => 'ProjectMaterial created.',
                'data'    => $projectMaterial->toArray(),
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
        $projectMaterial = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectMaterial,
            ]);
        }

        return view('projectMaterials.show', compact('projectMaterial'));
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
        $projectMaterial = $this->repository->find($id);

        return view('projectMaterials.edit', compact('projectMaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectMaterialUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProjectMaterialUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $projectMaterial = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProjectMaterial updated.',
                'data'    => $projectMaterial->toArray(),
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
                'message' => 'ProjectMaterial deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProjectMaterial deleted.');
    }
}
