<?php

class TestController extends BaseController {

	public function getTemplate()
	{
		return View::make('tests.layout');
	}

    public function getSignup()
    {
        return View::make('tests.signup');
    }

}
