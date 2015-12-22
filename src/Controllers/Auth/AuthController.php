<?php namespace App\Http\Controllers\Auth;

use Auth;
use Redirect;
use Event;
use App\Site\User\Models\User;
use Illuminate\Http\Request;
use Lembarek\Controllers\Controller;
use Site\User\Repositories\UserRepositoryInterface;
use App\Events\UserWasCreated;
use Site\Validation\RegisterValidator;
use Site\Validation\LoginValidator;

class AuthController extends Controller
{


    private $userRepo;

    protected $registerValidator;

    protected $loginValidator;

    public function __construct(UserRepositoryInterface $userRepo, RegisterValidator $registerValidator, LoginValidator $loginValidator)
    {
        $this->userRepo = $userRepo;
        $this->registerValidator = $registerValidator;
        $this->loginValidator = $loginValidator;
    }


    /**
     * register a new user
     *
     * @return boolean
     */
    public function register()
    {
        return view('auth.register');
    }


    /**
     * create a new user in DB
     *
     * @return Response
     */
    public function postRegister(Request $request)
    {
        $inputs = $request->except('_token');

        $this->registerValidator->validate($inputs);

        $user = $this->userRepo->create($inputs);

        Event::fire(new UserWasCreated($user));

        return Redirect::route('home');
    }


    /**
     * show the login page
     *
     * @return Response
     */
    public function login()
    {
        return view('auth.login');
    }


    /**
     * try to login the user
     *
     * @return Response
     */
    public function postLogin(Request $request)
    {
        $inputs = $request->except('_token');

        $this->loginValidator->validate($inputs);

        Auth::attempt($inputs);

        return Redirect::route('home');

    }
}
