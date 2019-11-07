<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserStatusCreateRequest;
use App\Http\Requests\UserStatusUpdateRequest;
use App\Repositories\UserStatusRepository;
use App\Validators\UserStatusValidator;

/**
 * Class UserStatusesController.
 *
 * @package namespace App\Http\Controllers\Administrator;
 */
class UserStatusesController extends Controller
{
    /**
     * @var UserStatusRepository
     */
    protected $repository;

    /**
     * @var UserStatusValidator
     */
    protected $validator;

    /**
     * UserStatusesController constructor.
     *
     * @param UserStatusRepository $repository
     * @param UserStatusValidator $validator
     */
    public function __construct(UserStatusRepository $repository, UserStatusValidator $validator)
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
        $userStatuses = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userStatuses,
            ]);
        }

        return view('userStatuses.index', compact('userStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserStatusCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(UserStatusCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $userStatus = $this->repository->create($request->all());

            $response = [
                'message' => 'UserStatus created.',
                'data'    => $userStatus->toArray(),
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
        $userStatus = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $userStatus,
            ]);
        }

        return view('userStatuses.show', compact('userStatus'));
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
        $userStatus = $this->repository->find($id);

        return view('userStatuses.edit', compact('userStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserStatusUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(UserStatusUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $userStatus = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'UserStatus updated.',
                'data'    => $userStatus->toArray(),
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
                'message' => 'UserStatus deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UserStatus deleted.');
    }
}
