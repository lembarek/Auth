<?php

namespace Lembarek\Auth\Controllers;

use Lembarek\Auth\Requests\ResetPasswordRequest;
use Lembarek\Mailer\UserMailer;
use Lembarek\Auth\Repositories\ResetPasswordRepositoryInterface;

class PasswordController extends Controller
{
    protected $resetPasswordRepo;

    public function __construct(ResetPasswordRepositoryInterface $resetPasswordRepo)
    {
        $this->middleware('guest');
        $this->resetPasswordRepo = $resetPasswordRepo;
    }


    /**
     * show the email to send the informatio to reset the password
     *
     * @return Response
     */
    public function showEmail()
    {
        return view('auth::reset.showEmail');
    }


    /**
     * send a message to the email of the user
     *
     * @return Reponse
     */
    public function sendToEmail(ResetPasswordRequest $request, UserMailer $userMailer)
    {
        $request = $request->only('email');
        $request['token'] = str_random(40);
        $this->resetPasswordRepo->create($request);
        $userMailer->sendResetPasswordEmailTo($request['email']);
        return redirect()->route('core:home');
    }
}
