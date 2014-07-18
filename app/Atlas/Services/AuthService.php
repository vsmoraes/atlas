<?php namespace Atlas\Services;

use Atlas\Validation\Forms\SignUp;
use Atlas\Validation\Forms\SignIn;
use User;
use Hash;
use Auth as LaravelAuth;

class AuthService {

    protected $signUpForm;
    protected $signInForm;
    
    public function __construct(SignUp $signUpForm, SignIn $signInForm)
    {
        $this->signUpForm = $signUpForm;
        $this->signInForm = $signInForm;
    }

    public function signOut()
    {
        LaravelAuth::logout();
        return true;
    }

    public function signIn(array $data)
    {
        $this->signInForm->validate($data);

        if ( ! LaravelAuth::attempt($data, true) ) {
            return false;
        }

        return true;
    }

    public function signUp(array $data)
    {
        $this->signUpForm->validate($data);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return true;
    }

}