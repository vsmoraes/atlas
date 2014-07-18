<?php namespace Atlas\Validation;

use Illuminate\Support\MessageBag;

class ValidationException extends \Exception {

    protected $errors;

    public function __construct($message, MessageBag $errors)
    {
        $this->errors = $errors;

        parent::__construct($message);
    }

    public function getErrors()
    {
        return $this->errors;
    }

}