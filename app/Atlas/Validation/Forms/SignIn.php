<?php namespace Atlas\Validation\Forms;

use Atlas\Validation\Validator;

class SignIn extends Validator {
    protected $rules = [
        'email'    => 'required|email',
        'password' => 'required'
    ];
}