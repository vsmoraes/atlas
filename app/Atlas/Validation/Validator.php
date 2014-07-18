<?php namespace Atlas\Validation;

use Illuminate\Validation\Factory;

abstract class Validator {

    protected $validator;
    protected $validation;

    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    public function validate(array $data)
    {
        $this->validation = $this->validator->make($data, $this->getRules());

        if ( $this->validation->fails() ) {
            throw new ValidationException('Validation failed', $this->getErrors());
        }

        return true;
    }

    protected function getRules()
    {
        return $this->rules;
    }

    protected function getErrors()
    {
        return $this->validation->errors();
    }

}