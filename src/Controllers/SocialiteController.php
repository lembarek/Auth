<?php

namespace Lembarek\Auth\Controllers;

use Auth;
use Socialite;
use Lembarek\Auth\Repositories\UserRepository;

class SocialiteController extends Controller
{

    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param string $provider
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param string $provider
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = $this->findOrCreateUser($providerUser);

        auth()->login($user, true);

        return redirect()->intended(route('core::home'));
    }

     /**
     * Return user if exists; create and return if doesn't
     *
     * @param $providerUser
     * @return User
     */
    private function findOrCreateUser($providerUser)
    {
        if ($user = $this->userRepo->findBy('email', $providerUser->getEmail())) {
            return $user;
        }

        return $this->userRepo->create([
            'username' => $providerUser->getNickname(),
            'email' => $providerUser->getEmail(),
        ]);
    }
}
