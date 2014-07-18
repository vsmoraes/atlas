<?php namespace Atlas\Validation\Forms;

use Atlas\Validation\Validator;

class SignUp extends Validator {
    protected $rules = [
        'email'    => 'required|email|unique:users',
        'name'     => 'required',
        'password' => 'required|confirmed'
    ];
}