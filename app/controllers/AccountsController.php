<?php

use Atlas\Services\AccountService;

class AccountsController extends BaseController {

    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index()
    {
        return View::make('accounts.index', [
            'account_list' => $this->accountService->getAll(Auth::user()->id)
        ]);
    }

    public function create()
    {
        return View::make('accounts.create');
    }

    public function edit($id)
    {
        return View::make('accounts.edit', [
            'account' => $this->accountService->get($id)
        ]);
    }

    public function store()
    {
        try {
            $account = $this->accountService->addNew(Auth::user()->id, Input::all());

            return Redirect::route('accounts.index')->with('message', 'Account saved');
        } catch(Atlas\Validation\ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function update($id)
    {
        try {
            $account = $this->accountService->update(Auth::user()->id, $id, Input::all());
            return Redirect::route('accounts.index')->with('message', 'Account saved');
        } catch(Atlas\Validation\ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

}
