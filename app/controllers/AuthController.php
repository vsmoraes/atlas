<?php

use Atlas\Services\AuthService;

class AuthController extends BaseController {

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function signUp()
    {
        return View::make('auth.signup');
    }

    public function register()
    {
        try {
            $this->authService->signUp(Input::all());

            return Redirect::to('/login')->withMessage('signUp', Lang::get('pages.auth.signup.signup-success'));
        } catch(Atlas\Validation\ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function signIn()
    {
        return View::make('auth.signin');
    }

    public function login()
    {
        try {

            if ( $this->authService->signIn(Input::only('email', 'password')) ) {
                return Redirect::intended('/');
            } else {
                return Redirect::back()->withInput()->with('auth_failed', true);
            }

        } catch(Atlas\Validation\ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function signOut()
    {
        $this->authService->signOut();

        return Redirect::home();
    }

}