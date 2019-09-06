<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\UserCreateRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use App\Mails\Auth\MailRegister;
use Mail;
use Hash;

class RegisterController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Register user
     * 
     * @param UserCreateRequest $request
     * @return redirect to send maill verify
     */
    public function register(UserCreateRequest $request){
        try {
            // update request
            $request->request->add([
                'id_level' => 'customer',
                'password' => Hash::make($request->password),    
            ]);

            // validator
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            // create
            $user = $this->repository->create($request->all());

            $response = [
                'message' => 'User created.',
                'data'    => $user->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }
        }
    }

}
