<?php

use Atlas\Services\TransactionService;
use Atlas\Services\AccountService;

class TransactionsController extends BaseController {

    protected $transactionService;
    protected $accountService;

    public function __construct(TransactionService $transactionService, AccountService $accountService)
    {
        $this->transactionService = $transactionService;
        $this->accountService = $accountService;
    }

    public function index()
    {
        return View::make('transactions.index', [
            'transaction_list' => $this->transactionService->getAll(Auth::user()->id)
        ]);
    }

    public function show($account_id)
    {
        return View::make('transactions.index', [
            'transaction_list' => $this->transactionService->getAll(Auth::user()->id, $account_id)
        ]);
    }

    public function create()
    {
        return View::make('transactions.create', [
            'account_list' => $this->accountService->getAll(Auth::user()->id)->lists('name', 'id')
        ]);
    }

    public function store()
    {
        try {
            $this->transactionService->add(Auth::user()->id, Input::all());

            return Redirect::route('transactions.index')->with('transaction_message', 'Transaction Saved!'); // @Fix
        } catch(Atlas\Validation\ValidationException $e) {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        }
    }

}