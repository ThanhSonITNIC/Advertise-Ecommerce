<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mails\Auth\MailRegister;
use Mail;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VerifyEmailRequest;
use App\Http\Requests\SendVerifyEmailRequest;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\URL;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * PasswordResetsController constructor.
     *
     * @param UserRepository $repository
     * @param UserValidator $validator
     */
    public function __construct(UserRepository $repository, UserValidator $validator)
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:10,1')->only('verify', 'resend');

        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Send mail to verify
     * 
     * @param SendVerifyEmailRequest $request
     */
    public function resend(SendVerifyEmailRequest $request){
        try {
            // validator
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            // create url
            $url = Url::temporarySignedRoute('verification.verify', now()->addHour(), ['email' => $request->email]);

            // send
            Mail::to($request->email)->send(new MailRegister($url));

            $response = [
                'message' => 'Sent! Please check your mail',
                'email'    => $request->email,
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

    /**
     * Verify email
     * 
     * @param VerifyEmailRequest $request
     */
    public function verify(VerifyEmailRequest $request){
        try {
            // validator
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            
            // verify
            $user = $this->repository->verify($request->email);

            $response = [
                'message' => 'Email Verified',
                'data'    => $user->toArray(),
            ];

            return response()->json($response);

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
