<?php namespace Atlas\Validation\Forms;

use Atlas\Validation\Validator;

class Transactions extends Validator {
    protected $rules = [
        'description' => 'required',
        'account_id' => 'required|exists:accounts,id',
        'amount' => 'required|numeric'
    ];
}