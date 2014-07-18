<?php namespace Atlas\Validation\Forms;

use Atlas\Validation\Validator;

class Accounts extends Validator {
    protected $rules = [
        'name'   => 'required',
        'amount' => 'required|numeric'
    ];
}