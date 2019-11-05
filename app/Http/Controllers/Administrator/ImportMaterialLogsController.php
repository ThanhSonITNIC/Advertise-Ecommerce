<?php

namespace App\Http\Controller\Administrator;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ImportMaterialLogCreateRequest;
use App\Http\Requests\ImportMaterialLogUpdateRequest;
use App\Repositories\ImportMaterialLogRepository;
use App\Validators\ImportMaterialLogValidator;

/**
 * Class ImportMaterialLogsController.
 *
 * @package namespace App\Http\Controller\Administrator;
 */
class ImportMaterialLogsController extends Controller
{
    /**
     * @var ImportMaterialLogRepository
     */
    protected $repository;

    /**
     * @var ImportMaterialLogValidator
     */
    protected $validator;

    /**
     * ImportMaterialLogsController constructor.
     *
     * @param ImportMaterialLogRepository $repository
     * @param ImportMaterialLogValidator $validator
     */
    public function __construct(ImportMaterialLogRepository $repository, ImportMaterialLogValidator $validator)
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
        $importMaterialLogs = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $importMaterialLogs,
            ]);
        }

        return view('importMaterialLogs.index', compact('importMaterialLogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ImportMaterialLogCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ImportMaterialLogCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $importMaterialLog = $this->repository->create($request->all());

            $response = [
                'message' => 'ImportMaterialLog created.',
                'data'    => $importMaterialLog->toArray(),
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
        $importMaterialLog = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $importMaterialLog,
            ]);
        }

        return view('importMaterialLogs.show', compact('importMaterialLog'));
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
        $importMaterialLog = $this->repository->find($id);

        return view('importMaterialLogs.edit', compact('importMaterialLog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ImportMaterialLogUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ImportMaterialLogUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $importMaterialLog = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ImportMaterialLog updated.',
                'data'    => $importMaterialLog->toArray(),
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
                'message' => 'ImportMaterialLog deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ImportMaterialLog deleted.');
    }
}
