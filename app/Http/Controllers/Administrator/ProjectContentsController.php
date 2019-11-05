<?php

namespace App\Http\Controllers\Administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ProjectContentCreateRequest;
use App\Http\Requests\ProjectContentUpdateRequest;
use App\Repositories\ProjectContentRepository;
use App\Validators\ProjectContentValidator;

/**
 * Class ProjectContentsController.
 *
 * @package namespace App\Http\Controllers\Administrator;
 */
class ProjectContentsController extends Controller
{
    /**
     * @var ProjectContentRepository
     */
    protected $repository;

    /**
     * @var ProjectContentValidator
     */
    protected $validator;

    /**
     * ProjectContentsController constructor.
     *
     * @param ProjectContentRepository $repository
     * @param ProjectContentValidator $validator
     */
    public function __construct(ProjectContentRepository $repository, ProjectContentValidator $validator)
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
        $projectContents = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectContents,
            ]);
        }

        return view('projectContents.index', compact('projectContents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProjectContentCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ProjectContentCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $projectContent = $this->repository->create($request->all());

            $response = [
                'message' => 'ProjectContent created.',
                'data'    => $projectContent->toArray(),
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
        $projectContent = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectContent,
            ]);
        }

        return view('projectContents.show', compact('projectContent'));
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
        $projectContent = $this->repository->find($id);

        return view('projectContents.edit', compact('projectContent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProjectContentUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ProjectContentUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $projectContent = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ProjectContent updated.',
                'data'    => $projectContent->toArray(),
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
                'message' => 'ProjectContent deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProjectContent deleted.');
    }
}
