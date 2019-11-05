<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ImportMaterialCreateRequest;
use App\Http\Requests\ImportMaterialUpdateRequest;
use App\Repositories\ImportMaterialRepository;
use App\Validators\ImportMaterialValidator;

/**
 * Class ImportMaterialsController.
 *
 * @package namespace App\Http\Controllers\Administrator;
 */
class ImportMaterialsController extends Controller
{
    /**
     * @var ImportMaterialRepository
     */
    protected $repository;

    /**
     * @var ImportMaterialValidator
     */
    protected $validator;

    /**
     * ImportMaterialsController constructor.
     *
     * @param ImportMaterialRepository $repository
     * @param ImportMaterialValidator $validator
     */
    public function __construct(ImportMaterialRepository $repository, ImportMaterialValidator $validator)
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
        $importMaterials = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $importMaterials,
            ]);
        }

        return view('importMaterials.index', compact('importMaterials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ImportMaterialCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ImportMaterialCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $importMaterial = $this->repository->create($request->all());

            $response = [
                'message' => 'ImportMaterial created.',
                'data'    => $importMaterial->toArray(),
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
        $importMaterial = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $importMaterial,
            ]);
        }

        return view('importMaterials.show', compact('importMaterial'));
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
        $importMaterial = $this->repository->find($id);

        return view('importMaterials.edit', compact('importMaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ImportMaterialUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ImportMaterialUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $importMaterial = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ImportMaterial updated.',
                'data'    => $importMaterial->toArray(),
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
                'message' => 'ImportMaterial deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ImportMaterial deleted.');
    }
}
