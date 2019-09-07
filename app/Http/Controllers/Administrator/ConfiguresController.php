<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ConfigureCreateRequest;
use App\Http\Requests\ConfigureUpdateRequest;
use App\Repositories\ConfigureRepository;
use App\Validators\ConfigureValidator;

/**
 * Class ConfiguresController.
 *
 * @package namespace App\Http\Controllers\Administrator;
 */
class ConfiguresController extends Controller
{
    /**
     * @var ConfigureRepository
     */
    protected $repository;

    /**
     * @var ConfigureValidator
     */
    protected $validator;

    /**
     * ConfiguresController constructor.
     *
     * @param ConfigureRepository $repository
     * @param ConfigureValidator $validator
     */
    public function __construct(ConfigureRepository $repository, ConfigureValidator $validator)
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
        $configures = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configures,
            ]);
        }

        return view('configures.index', compact('configures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ConfigureCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ConfigureCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $configure = $this->repository->create($request->all());

            $response = [
                'message' => 'Configure created.',
                'data'    => $configure->toArray(),
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
        $configure = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $configure,
            ]);
        }

        return view('configures.show', compact('configure'));
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
        $configure = $this->repository->find($id);

        return view('configures.edit', compact('configure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ConfigureUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ConfigureUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $configure = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Configure updated.',
                'data'    => $configure->toArray(),
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
                'message' => 'Configure deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Configure deleted.');
    }
}
