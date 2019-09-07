<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectCommentCreateRequest;
use App\Http\Requests\ProjectCommentUpdateRequest;
use App\Repositories\ProjectCommentRepository;
use App\Validators\ProjectCommentValidator;

/**
 * Class ProjectCommentsController.
 *
 * @package namespace App\Http\Controllers\Customer;
 */
class ProjectCommentsController extends Controller
{
    /**
     * @var ProjectCommentRepository
     */
    protected $repository;

    /**
     * @var ProjectCommentValidator
     */
    protected $validator;

    /**
     * ProjectCommentsController constructor.
     *
     * @param ProjectCommentRepository $repository
     * @param ProjectCommentValidator $validator
     */
    public function __construct(ProjectCommentRepository $repository, ProjectCommentValidator $validator)
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
        $projectComments = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectComments,
            ]);
        }

        return view('projectComments.index', compact('projectComments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectCommentCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProjectCommentCreateRequest $request)
    {
        try {
            // update request
            $request->request->add(['id_creator' => \Auth::id()]);

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $projectComment = $this->repository->create($request->all());

            $response = [
                'message' => 'ProjectComment created.',
                'data'    => $projectComment->toArray(),
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
        $projectComment = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectComment,
            ]);
        }

        return view('projectComments.show', compact('projectComment'));
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
        $projectComment = $this->repository->find($id);

        return view('projectComments.edit', compact('projectComment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectCommentUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProjectCommentUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $projectComment = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProjectComment updated.',
                'data'    => $projectComment->toArray(),
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
                'message' => 'ProjectComment deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProjectComment deleted.');
    }
}
