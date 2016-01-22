<?php namespace Lembarek\Auth\Controllers;

use Auth;
use Redirect;
use Event;
use App\Site\User\Models\User;
use App\Events\UserWasCreated;
use Lembarek\Auth\Requests\RegisterRequest;
use Lembarek\Auth\Requests\LoginRequest;
use Lembarek\Auth\Repositories\UserRepositoryInterface;

class AuthController extends Controller
{


    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    /**
     * register a new user
     *
     * @return boolean
     */
    public function register()
    {
        return view('auth::register');
    }


    /**
     * create a new user in DB
     *
     * @return Response
     */
    public function postRegister(RegisterRequest $request)
    {
        $inputs = $request->except('_token');

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
    public function postLogin(LoginRequest $request)
    {
        $inputs = $request->except('_token');

        Auth::attempt($inputs);

        return Redirect::route('home');

    }
}
